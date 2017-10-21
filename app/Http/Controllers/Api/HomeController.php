<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 9/27/2017
 * Time: 12:19 PM
 */

namespace App\Http\Controllers\Api;

use App\Models\Visitor;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Repositories\Contracts\IPostRepo;
use App\Repositories\Contracts\IPostUploadDataRepo;
use App\Repositories\Contracts\ISliderRepo;
use App\Repositories\Contracts\ICategoryRepo;
use App\Utils\Globals\AppGlobal;
use Illuminate\Support\Facades\Auth;
use App\Utils\JsonResult;

class HomeController
{
    private $_postRepo;
    private $_categoryRepo;
    private $_postUploadDataRepo;
    private $_sliderRepo;

    /**
     * PostController constructor.
     * @param ICategoryRepo $_categoryRepo
     * @param IPostRepo $_postRepo
     * @param IPostUploadDataRepo $_postUploadDataRepo
     * @param ISliderRepo $_sliderRepo
     */
    public function __construct(ICategoryRepo $_categoryRepo, IPostRepo $_postRepo, IPostUploadDataRepo $_postUploadDataRepo, ISliderRepo $_sliderRepo)
    {
        $this->_categoryRepo = $_categoryRepo;
        $this->_postRepo = $_postRepo;
        $this->_postUploadDataRepo = $_postUploadDataRepo;
        $this->_sliderRepo = $_sliderRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     * @internal param $id
     */
    public function index(Request $request)
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

        $dataArray = ['sliders' => $sliders, 'africaPost' => $africaPost, 'oceaniaPost' => $oceaniaPost, 'southAmericaPost' => $southAmericaPost, 'northAmericaPost' => $northAmericaPost, 'europePost' => $europePost, 'asiaPost' => $asiaPost];

        return JsonResult::JSONSuccessResult('Post fetch successfully', $dataArray);

    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function Search(Request $request)
    {
        $q = $request->input('search');

        $posts = Post::where('post_title', 'LIKE', '%' . $q . '%')->orWhere('post_description', 'LIKE', '%' . $q . '%')->get();

        if ($posts) {
            foreach ($posts as $post){
                $postUploadDatas = $this->_postUploadDataRepo->fetchPostUploadData([$post->id]);

                foreach ($postUploadDatas as $postUploadData) {
                    if ($post->contant_id != 4) {
                        $imageUrl = asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload);
                    } else {
                        $imageUrl = $postUploadData->post_upload;
                    }
                    $link = $postUploadData->url;
                }
                $dataArray[] = ['post' => $post, 'imageUrl' => $imageUrl, 'videoLink' => $link];
            }
            return JsonResult::JSONSuccessResult('Post fetch successfully', $dataArray);
        }
        return JsonResult::JSONErrorResult('Something went wrong', null);
    }

}