<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 9/27/2017
 * Time: 12:19 PM
 */

namespace App\Http\Controllers\Api;


use App\Repositories\Contracts\IPostRepo;
use App\Repositories\Contracts\IPostUploadDataRepo;
use App\Utils\JsonResult;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Contracts\ICategoryRepo;
use App\Repositories\Contracts\ISliderRepo;

class PostController
{

    private $_postRepo;
    private $_postUploadDataRepo;
    private $_categoryRepo;
    private $_sliderRepo;

    /**
     * PostController constructor.
     * @param IPostRepo $_postRepo
     * @param IPostUploadDataRepo $_postUploadDataRepo
     */
    public function __construct(IPostRepo $_postRepo, IPostUploadDataRepo $_postUploadDataRepo, ICategoryRepo $_categoryRepo, ISliderRepo $_sliderRepo)
    {
        $this->_postRepo = $_postRepo;
        $this->_postUploadDataRepo = $_postUploadDataRepo;
        $this->_categoryRepo = $_categoryRepo;
        $this->_sliderRepo = $_sliderRepo;
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $posts = $this->_postRepo->all();
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {
        $post = $this->_postRepo->fetchPost([$id]);
        if ($post) {
            $postUploadDatas = $this->_postUploadDataRepo->fetchPostUploadData([$id]);

            foreach ($postUploadDatas as $postUploadData) {
                if ($post->contant_id != 4) {
                    $imageUrl = asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload);
                } else {
                    $imageUrl = $postUploadData->post_upload;
                }
                $videoUrl = $postUploadData->url;
            }
            $postArray = $post->toArray();
            $postArray['imageUrl'] =  $imageUrl;
            $postArray['videoUrl'] =  $videoUrl;
            return JsonResult::JSONSuccessResult('Post fetch successfully', $postArray);
        }
        return JsonResult::JSONErrorResult('Something went wrong', null);
    }

    public function contantPost($id)
    {
        $posts = $this->_categoryRepo->fetchPostsByCategoryId(['id' => $id]);
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
                $array[] = ['post' => $post, 'imageUrl' => $imageUrl, 'videoLink' => $link];
            }
            return JsonResult::JSONSuccessResult('Post contant/country vice fetch successfully', $array);
        }
        return JsonResult::JSONErrorResult('Post not found', null);
    }
    public function getSlider($id)
    {
        $sliderPosts = $this->_sliderRepo->fetchSliderById(['id' => $id]);
        if($sliderPosts){
            return JsonResult::JSONSuccessResult('Slider Post fetch successfully', $sliderPosts);
        }

        return JsonResult::JSONErrorResult('Slider Post Not Found');

    }

}