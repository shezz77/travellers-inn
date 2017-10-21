<?php

namespace App\Http\Controllers\TravellersInn;

use App\Models\Country;
use App\Models\Slider;
use App\Repositories\Contracts\IPostRepo;
use App\Repositories\Contracts\ISliderRepo;
use App\Repositories\Contracts\IUserRepo;
use App\Utils\AuthWrapper;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ICategoryRepo;
use App\Models\Post;
use App\Utils\Globals\AppGlobal;
use Mail;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class PagesController extends Controller
{
    use ValidatesRequests;
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    private $_categoryRepo;
    private $_userRepo;
    private $_sliderRepo;
    private $_postRepo;

    public function __construct(ICategoryRepo $_categoryRepo, IUserRepo $_userRepo, ISliderRepo $_sliderRepo, IPostRepo $_postRepo)
    {
        $this->_categoryRepo = $_categoryRepo;
        $this->_userRepo = $_userRepo;
        $this->_sliderRepo = $_sliderRepo;
        $this->_postRepo = $_postRepo;
    }
    public function getAboutUs()
    {
        return view('travellers-inn.home.pages.about-us');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContactUs()
    {
        return view('travellers-inn.home.pages.contact-us');
    }

    public function postContactUs(Request $request){
        $this->validate($request, [
            'contact_email'=> 'required|email',
            'contact_subject' => 'min:3',
            'contact_message' => 'min:3',
           ]);
  $data = array(
            'contact_email'  =>$request->contact_email,
            'contact_subject' => $request->contact_subject,
            'contact_message' => $request->contact_message,

  );
//        dd($data);
        Mail::send('travellers-inn.auth.email.contact', $data, function($message) use ($data) {
            $message->to('travellersinn2017@gmail.com');
            $message->subject($data['contact_subject']);


        });
        Session::flash('success', 'Your mail was successfully sent!');
        return redirect()->route('contact-us');


    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDestination($id)
    {
        $recentPosts = Post::latest()->limit(AppGlobal::RECENT_POST_LIMIT)->get();

        $destinationId = ['id' => $id];

        $categoryPosts = $this->_categoryRepo->fetchPostsByCategoryId($destinationId);


        $posts = $this->paginate($categoryPosts, AppGlobal::POST_DEFAULT_LIMIT);

        $sliders = $this->_sliderRepo->fetchSliders($destinationId);

        return view('travellers-inn.landing-pages.show', compact('recentPosts', 'posts', 'sliders'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContentPosts($id)
    {
            $posts = Post::where('contant_id', 'LIKE', '%' . $id . '%')->paginate(9);
        return view('travellers-inn.content-post.show',compact('posts'));
    }

    /**
     * @param $items
     * @param $perPage
     * @return LengthAwarePaginator
     */
    function paginate($items, $perPage)
    {
        $pageStart           = request('page', 1);
        $offSet              = ($pageStart * $perPage) - $perPage;
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, TRUE);

        return new LengthAwarePaginator(
            $itemsForCurrentPage, count($items), $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
        );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSetting()
    {
        $countries = Country::all();
//        $selected = $this->
        $user = AuthWrapper::loggedInUser();
        return view('travellers-inn.user.setting-page', compact('user', 'countries'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get404Error()
    {
        return view('travellers-inn.home.pages.404-error');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getComingSoon()
    {
        return view('travellers-inn.home.pages.coming-soon');
    }

    public function getAdminPanel()
    {
        return view('travellers-inn.admin.index');
    }
}
