<?php

namespace App\Http\Controllers\TravellersInn;


use App\Models\Category;
use App\Models\HashTag;
use App\Models\Visitor;
use App\Models\User;
use App\Repositories\Contracts\ISliderRepo;
use App\Utils\Globals\AppGlobal;
use App\Models\Post;
use App\Repositories\Contracts\ICategoryRepo;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    private $_categoryRepo;
    private $_sliderRepo;

    /**
     * HomeController constructor.
     * @param $_categoryRepo
     */
    public function __construct(ICategoryRepo $_categoryRepo, ISliderRepo $_sliderRepo)
    {
        $this->_categoryRepo = $_categoryRepo;
        $this->_sliderRepo = $_sliderRepo;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
        $visitor = new Visitor;

        if (Auth::check()) {
            $visitor = new Visitor;
            $guest = User::where('user_name', 'guest')->first();
            $visitor->user_id = $guest->id;
        } else {
            $guest = User::where('user_name', 'guest')->first();
            $visitor->user_id = $guest->id;
            $visitor->ip_address = $request->ip();
            $visitor->save();
        }

        $continentPost = ['title' => AppGlobal::CONTINENT_ASIA];
        $asiaPost_temp = $this->_categoryRepo->fetchPostsByCategoryTitle($continentPost);
        $asiaPost = collect($asiaPost_temp)->sortBy('created_at')->reverse();

        $continentPost = ['title' => AppGlobal::CONTINENT_EUROPE];
        $europePost_temp = $this->_categoryRepo->fetchPostsByCategoryTitle($continentPost);
        $europePost = collect($europePost_temp)->sortBy('created_at')->reverse();

        $continentPost = ['title' => AppGlobal::CONTINENT_NORTH_AMERICA];
        $NorthAmericaPost_temp = $this->_categoryRepo->fetchPostsByCategoryTitle($continentPost);
        $northAmericaPost = collect($NorthAmericaPost_temp)->sortBy('created_at')->reverse();

        $continentPost = ['title' => AppGlobal::CONTINENT_SOUTH_AMERICA];
        $southAmericaPost_temp = $this->_categoryRepo->fetchPostsByCategoryTitle($continentPost);
        $southAmericaPost = collect($southAmericaPost_temp)->sortBy('created_at')->reverse();

        $continentPost = ['title' => AppGlobal::CONTINENT_OCEANIA];
        $oceaniaPost_temp = $this->_categoryRepo->fetchPostsByCategoryTitle($continentPost);
        $oceaniaPost = collect($oceaniaPost_temp)->sortBy('created_at')->reverse();

        $continentPost = ['title' => AppGlobal::CONTINENT_AFRICA];
        $africaPost_temp = $this->_categoryRepo->fetchPostsByCategoryTitle($continentPost);
        $africaPost = collect($africaPost_temp)->sortBy('created_at')->reverse();

        $homeslider = ['id' => '1'];

        $sliders = $this->_sliderRepo->fetchSliderById($homeslider);
        $posts = \App\Utils\PostWrapper::posts();
        return view('travellers-inn.home.index', compact('posts', 'sliders', 'asiaPost', 'europePost', 'northAmericaPost', 'southAmericaPost', 'oceaniaPost', 'africaPost'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSearch()
    {
        return view('travellers-inn.getSearch');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Search(Request $request)
    {
        $q = $request->input('search');

        $posts = Post::where('post_title', 'LIKE', '%' . $q . '%')->orWhere('post_description', 'LIKE', '%' . $q . '%')->get();
        $searchPosts = $this->postsToArray($posts);

        $posts = $this->paginate($searchPosts, AppGlobal::POST_DEFAULT_LIMIT);

        if (count($posts) > 0) {
            return view('travellers-inn.search', compact('hashTagPosts', 'posts', 'q'))->withDetail($q);;
        }
        return view('travellers-inn.search', compact('hashTagPosts', 'posts', 'q'))->withMessage('No Details found. Try to search again !');

    }

    /**
     * @param $posts
     * @return array
     */
    public function postsToArray($posts){
        $postsArray = [];
        foreach ($posts as $post){
            $postsArray[] = $post;
        }

        return $postsArray;
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function AdvanceSearch(Request $request)
    {

        $q = $request->input('AdvanceSearch');
        $tips = $request->input('tip');
        $images = $request->input('image');
        $videos = $request->input('video');
        $diary = $request->input('diary');
        $ebook = $request->input('ebook');

        $types = [];
        if ($tips != null)
            $types[] = Post::where('contant_id', 'LIKE', '%' . $tips . '%')->get();
        if ($images != null)
            $types[] = Post::where('contant_id', 'LIKE', '%' . $images . '%')->get();
        if ($videos != null)
            $types[] = Post::where('contant_id', 'LIKE', '%' . $videos . '%')->get();
        if ($diary != null)
            $types[] = Post::where('contant_id', 'LIKE', '%' . $diary . '%')->get();
        if ($ebook != null)
            $types[] = Post::where('contant_id', 'LIKE', '%' . $ebook . '%')->get();

        $typePosts = [];
        foreach ($types as $type) {
            foreach ($type as $post) {
                $typePosts[] = $post;
            }
        }

        $posts = [];
        for ($i = 0; $i < count($typePosts); $i++) {

            $post = Post::where('id', $typePosts[$i]->id)->where('post_title', 'LIKE', '%' . $q . '%')->where('post_description', 'LIKE', '%' . $q . '%')->first();
            if ($post) {
                $posts [] = $post;
            }
        }
        $searchPosts = $this->postsToArray($posts);

        $posts = $this->paginate($searchPosts, AppGlobal::POST_DEFAULT_LIMIT);

        if (count($posts) > 0) {
            return view('travellers-inn.search', compact('posts', 'q'))->withDetail($q);
        }
        return view('travellers-inn.search', compact('posts', 'q'))->withMessage('No Details found. Try to search again !');

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
     * @param $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function error($code)
    {
        switch ($code) {
            case 401:
                return view('travellers-inn.admin.error-pages.401');
                break;
            case 402:
                return view('travellers-inn.admin.error-pages.402');
                break;
            case 403:
                return view('travellers-inn.admin.error-pages.403');
                break;
            default:
                return view('travellers-inn.admin.error-pages.500');
                break;
        }

    }

}
