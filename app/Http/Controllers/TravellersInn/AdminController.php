<?php

namespace App\Http\Controllers\TravellersInn;

use App\Notifications\PostCreated;
use Carbon\Carbon;
use App\Models\Country;
use App\Models\Post;
use App\Models\Resource;
use App\Utils\AuthWrapper;
use Analytics;
//use Illuminate\Support\Facades\Notification;
use Spatie\Analytics\Period;
use App\Models\Role;
use App\Models\Notification;
use App\Models\User;
use App\Repositories\Contracts\ICountryRepo;
use App\Repositories\Contracts\IPostRepo;
use App\Repositories\Contracts\IResourceRepo;
use App\Repositories\Contracts\IRoleRepo;
use App\Repositories\Contracts\IUserRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $post;
    private $_userRepo;
    private $_countryRepo;
    private $_roleRepo;
    private $_resourceRepo;
    private $_postRepo;

    /**
     * AdminController constructor.
     * @param IUserRepo $_userRepo
     * @param ICountryRepo $_countryRepo
     * @param IRoleRepo $_roleRepo
     * @param IResourceRepo $_resourceRepo
     * @param IPostRepo $_postRepo
     */
    public function __construct(Post $post,IUserRepo $_userRepo, ICountryRepo $_countryRepo, IRoleRepo $_roleRepo, IResourceRepo $_resourceRepo, IPostRepo $_postRepo)
    {
        $this->post = $post;
        $this->_userRepo = $_userRepo;
        $this->_countryRepo = $_countryRepo;
        $this->_roleRepo = $_roleRepo;
        $this->_resourceRepo = $_resourceRepo;
        $this->_postRepo = $_postRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mostViewedPosts = $this->_postRepo->fetchMostViewedFirst();
        $featuredPosts = $this->_postRepo->fetchFeaturedPosts();

        $analyticsData = Analytics::fetchMostVisitedPages(Period::days(60));
//        dd($analyticsData);
        $i = 0;
        foreach ($analyticsData as $analytics) {
            $i += $analytics['pageViews'];
        }
        $uniquePages = Analytics::performQuery(Period::days(60), 'ga:uniquePageViews', ['dimensions' =>
            'ga:pagePath,ga:country'

        ]);
        $a = 0;
        foreach ($uniquePages as $unique) {
            $a += $unique[2];
        }
        return view('travellers-inn.admin.index', compact('mostViewedPosts', 'featuredPosts', 'i', 'a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->post->find($id);
        $post->delete();
        Session::flash('success', 'Post successfully deleted');
        return redirect()->route('posts.index');
    }

    /**
     * @param $country_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function countryShow($country_id)
    {
        $country = $this->_countryRepo->find($country_id);
        $userCount = 0;
        $users = array();

        foreach ($country->states as $state) {
            $userCount += $state->users->count();
            foreach ($state->users as $user) {
                $users[] = $user;
            }
        }

        return view('travellers-inn.admin.country.show', compact('country', 'users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCountries()
    {
        return view('');
    }

    public function userIndex(Request $request)
    {
        $inputRequest = $request->all();
        $users = $this->_userRepo->fetchUsers($inputRequest);

        return view('travellers-inn.admin.user.index', compact('users'));
    }

    public function userShow($id)
    {
        $user = $this->_userRepo->find($id);
        return view('travellers-inn.admin.user.show', compact('user'));
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function roleAttach(Request $request, $user_id)
    {
        $inputRequest = $request->all();
        unset($inputRequest['_token']);
        unset($inputRequest['datatables-1_length']);
        $keys = array_keys($inputRequest);
        $size = count($keys);
        $user = $this->_userRepo->find($user_id);

        $user->roles()->detach();

        for ($i = 0; $i < $size; $i++) {
            $roles = $this->_roleRepo->findBy($keys[$i], 'name');
            $role = $roles->first();
            $user->assignRole($role);
        }

        Session::flash('success', $user->user_name . ' Roles updated Successfully');
        return redirect()->route('admin.user.show', $user_id);
    }

    /**
     * @param Request $request
     * @param $role_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resourceAttach(Request $request, $role_id)
    {
        $inputRequest = $request->all();
        unset($inputRequest['_token']);
        unset($inputRequest['datatables-1_length']);
        $keys = array_keys($inputRequest);
        $size = count($keys);

        $role = $this->_roleRepo->find($role_id);
        $role->resources()->detach();

        $resources = Resource::all();

        for ($i = 0; $i < $size; $i++) {
            $resources = $this->_resourceRepo->findBy($keys[$i], 'name');
            $resource = $resources->first();
            $role->assignResource($resource);
        }

        Session::flash('success', $role->name . ' Resources updated Successfully');
        return redirect()->route('role.show', $role_id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postIndex(Request $request)
    {
        $inputRequest = $request->all();
        $posts = $this->_postRepo->fetchPosts($inputRequest);

        return view('travellers-inn.admin.post.index', compact('posts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postsShow(Request $request)
    {
        $inputRequest = $request->all();
        $posts = $this->_postRepo->fetchPosts($inputRequest);

        return view('travellers-inn.admin.post.pending-posts', compact('posts'));
    }

    public function featuredPost($id)
    {
        $current = Carbon::now();
        $expires = $current->addDays(7);
        $post = $this->_postRepo->find($id);
        $post->is_featured = 1;
        $post->starting_time = time();
        $post->ending_time = $expires;
        $post->save();
        return redirect()->back();
    }

    public function removeFeaturedPost($id)
    {
        $post = $this->_postRepo->find($id);
        $post->is_featured = 0;
        $post->save();
        return redirect()->back();
    }

    public function featuredPostShow(Request $request)
    {
        $inputRequest = $request->all();
        $posts = $this->_postRepo->fetchPosts($inputRequest);

        return view('travellers-inn.admin.post.featured-posts', compact('posts'));
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approvePost($id)
    {
        $post = $this->_postRepo->find($id);
        $post->status = 1;
        $post->is_rejected = 0;

        $post->save();

        foreach ($post->user->followers as $follower){
//        dd($post->user->followers);
//        \Event::fire(new CreatePostEvent($post));

            $notification = new Notification();
            $notification->user_id = $post->user->id;
            $notification->follow_id = $follower->id;
            $notification->post_id = $post->id;
            $notification->status = 1;
            $notification->save();
        }
        Session::flash('success', 'Post Approve Successfully');
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rejectPost($id)
    {
        $post = $this->_postRepo->find($id);
        $post->is_rejected = 1;
        $post->status = 0;
        $post->save();

        Session::flash('success', 'Post Reject Successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRejectPost(Request $request)
    {
        $inputRequest = $request->all();
        $posts = $this->_postRepo->fetchPosts($inputRequest);

        return view('travellers-inn.admin.post.rejected-posts', compact('posts'));

    }

    public function getSetting(Request $request)
    {
        $countries = Country::all();
        $user = AuthWrapper::loggedInUser();
        return view('travellers-inn.admin.admin-setting.setting', compact('user', 'countries'));

    }

}
