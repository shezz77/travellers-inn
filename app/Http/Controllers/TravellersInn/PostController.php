<?php

namespace App\Http\Controllers\TravellersInn;

use App\Http\Requests\CreatePostRequest;
use App\Utils\AuthWrapper;
use Embed\Embed;
use App\Events\ViewPostEvent;
use App\Events\CreatePostEvent;
use App\Repositories\Contracts\ICategoryRepo;
use App\Repositories\Contracts\IHashTagRepo;
use App\Repositories\Contracts\IPostRepo;
use App\Repositories\Contracts\IDiaryRepo;
use App\Repositories\Contracts\IUserRepo;
use App\Utils\Globals\AppGlobal;
use Illuminate\Support\Facades\File;
use App\Models\Country;
use App\Models\HashTag;
use App\Models\Like;
use App\Models\LikesOnComment;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\PostUploadedData;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Notification;

class PostController extends Controller
{
    use ValidatesRequests;

    private $post;
    private $_categoryRepo;
    private $_postRepo;
    private $_hashTagRepo;
    private $_diaryRepo;
    private $_userRepo;

    /**
     * PostController constructor.
     * @param Post $post
     * @param ICategoryRepo $_categoryRepo
     * @param IPostRepo $_postRepo
     * @param IHashTagRepo $_hashTagRepo
     * @param IDiaryRepo $_diaryRepo
     * @param IUserRepo $_userRepo
     */

    public function __construct(Post $post, ICategoryRepo $_categoryRepo, IPostRepo $_postRepo, IHashTagRepo $_hashTagRepo, IDiaryRepo $_diaryRepo, IUserRepo $_userRepo)
    {
        $this->post = $post;
        $this->_categoryRepo = $_categoryRepo;
        $this->_postRepo = $_postRepo;
        $this->_hashTagRepo = $_hashTagRepo;
        $this->_diaryRepo = $_diaryRepo;
        $this->_userRepo = $_userRepo;
    }

    /**
     * Display a listing of the post.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->_postRepo->fetchPosts();

        return view('travellers-inn.admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Continents = $this->_categoryRepo->fetchCategoryWithImmediateChildByTitle(['title' => AppGlobal::DESTINATION_PARENT]);

        $CountriesArray = array();
        foreach ($Continents as $Continent) {
            $CountriesInContinent = $Continent->getImmediateDescendants();
            foreach ($CountriesInContinent as $country) {
                $CountriesArray[$country->id] = $country->title;
            }
        }

        $userID = ['id' => Auth::user()->id];
        $diaries = $this->_userRepo->fetchDiariesByUserId($userID);

        $diariesArray = array();
        foreach ($diaries as $diary) {
            $diariesArray[$diary->id] = $diary->name;
        }

        $hashTags = $this->_hashTagRepo->all();

        return view('travellers-inn.post.create', compact('hashTags', "CountriesArray", 'diariesArray'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatesList(Request $request)
    {
        $id = $request->country_id;
        $category = Category::select('title')->where('id' , $id)->first();
        $Countries = $this->_categoryRepo->fetchCategoryWithImmediateChildByTitle(['title' => $category->title]);

        return response()->json($Countries);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param CreatePostRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // store data in database

        $category = Category::where('title', $request->title)->first();
        $post = new Post;
        $post->post_title = $request->input('post_title');
        $post->post_description = $request->input('post_description');
        $post->ebook_title = $request->input('ebook_title');
        $post->ebook_link = $request->input('ebook_link');
        $post->contant_id = $category->id;
        $post->country_id =$request->get('country_id');
        $post->state_id =$request->get('state_id');
        $post->user_id = Auth::user()->id;


        foreach(AuthWrapper::loggedInUser()->roles as $role)
        {
            if ($role->id == AppGlobal::SUPER_ADMIN){
                $post->status = 1;
                $post->save();
                foreach ($post->user->followers as $follower){

                    $notification = new Notification();
                    $notification->user_id = $post->user->id;
                    $notification->follow_id = $follower->id;
                    $notification->post_id = $post->id;
                    $notification->status = 1;
                    $notification->save();
                }
            } else{
                $post->save();
            }
        }


        $country = $post->country_id;
        $diary = $request->get('diary_id');
        $hashTags = $this->_hashTagRepo->createNewTags($request->tags);
        $post->hashTags()->sync($hashTags, false);


        $post->categories()->attach($country);
        $post->categories()->attach($category);
        if($diary){
            $post->diaries()->attach($diary);
        }
        if ($request->hasFile('post_upload')) {
            $path = '/images/users/' .Auth::user()->id.'/posts/'. $post->id;

            if(!file_exists($path)){
                File::makeDirectory(public_path().'/images/users/'.Auth::user()->id.'/posts/'. $post->id , 0755, true);
            }

            foreach ($request->post_upload as $post_upload){

                $postUploadedData = new PostUploadedData;
                $filename = $post_upload->getClientOriginalName();
                $location = public_path('images/users/' . Auth::user()->id .'/posts/'. $post->id .'/'. $filename);

                image::make($post_upload)->resize('1920','1080')->save($location);
                $postUploadedData->post_upload = $filename;
                $postUploadedData->post_id = $post->id;

                $postUploadedData->save();
            }
        } else if ($request->input('post_upload') !== null) {
            $video = Embed::create($request->input('post_upload'));
            $postUploadedData = new PostUploadedData;
            $postUploadedData->post_upload = $video->image;
            $postUploadedData->link = $video->code;
            $postUploadedData->url = $video->url;
            $postUploadedData->post_id = $post->id;
            $postUploadedData->save();
        }

        //back to view
        Session::flash('success', 'Post Successfully Created');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified post.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Post $post
     */

    public function notification($id)
    {
        $post_noticication = Notification::where('post_id',$id)->first();
        $post_noticication->status = 0;
        $post_noticication->update();

        return redirect()->route('posts.show',$id);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        $post = $this->post->find($id);

        $recentPosts = $this->post->latest()->limit(AppGlobal::RECENT_POST_LIMIT)->get();
        \Event::fire(new ViewPostEvent($post));
        return view('travellers-inn.post.show', compact('post', 'recentPosts'));
    }


    /**
     * Show the form for editing the specified role.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param $post_id
     * @internal param Post $post
     */
    public function edit(Request $request, $id)
    {
        $post = $this->post->find($id);

        $Continents = $this->_categoryRepo->fetchCategoryWithImmediateChildByTitle(['title' => AppGlobal::DESTINATION_PARENT]);

        $CountriesArray = array();
        foreach ($Continents as $Continent) {
            $CountriesInContinent = $Continent->getImmediateDescendants();
            foreach ($CountriesInContinent as $country) {
                $CountriesArray[$country->id] = $country->title;
            }
        }

        $countryName = $this->_categoryRepo->fetchCategoryNameById($post->country_id);
        $stateName = $this->_categoryRepo->fetchCategoryNameById($post->state_id);
        $diaryName = $this->_diaryRepo->fetchDiaryNameById($post->diary_id);

        $url = array();
        foreach ($post->postUploadedDatas as $postUploadedData){
            $url[] = $postUploadedData->url;
            $urlLink = $url[0];
        }



        $postHashTags = $post->hashTags;

        $userID = ['id' => Auth::user()->id];
        $diaries = $this->_userRepo->fetchDiariesByUserId($userID);

        $diariesArray = array();
        foreach ($diaries as $diary) {
            $diariesArray[$diary->id] = $diary->name;
        }


        $hashTags = $this->_hashTagRepo->all();
        return view('travellers-inn.post.edit', compact('hashTags','postHashTags', "post", "CountriesArray",'diariesArray','diaryName','countryName', 'stateName','urlLink'));
    }

    /**
     * Update the specified role in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Post $post
     */
    public function update(Request $request, $id)
    {
//        validate data
        $this->validate($request, array(
            'post_title' => 'required|max:100',
            'post_description' => 'required'
        ));

        // store data in database


        $post = $this->post->find($id);
        $post->status = 0;
        $this->_postRepo->update($request->all(), ['id' => $id]);
        if (($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6) && $request->post_upload) {
            foreach ($request->post_upload as $post_upload){
                $postUploadedDatas = $post->postUploadedDatas;
                foreach ($postUploadedDatas as $postUploadedData){
                    $filename = $post_upload->getClientOriginalName();
                    $location = public_path('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $filename);

                    image::make($post_upload)->resize('1920','1080')->save($location);
                    $postUploadedData->post_upload = $filename;
                    $postUploadedData->post_id = $post->id;
                    $postUploadedData->save();
                }
            }
        } else if ($post->contant_id == 4 && $request->post_upload) {
            $video = Embed::create($request->input('post_upload'));
            $postUploadedDatas = $post->postUploadedDatas;
            foreach ($postUploadedDatas as $postUploadedData) {
                $postUploadedData->post_upload = $video->image;
                $postUploadedData->link = $video->code;
                $postUploadedData->url = $video->url;
                $postUploadedData->post_id = $post->id;
                $postUploadedData->save();
            }
        }


        foreach(AuthWrapper::loggedInUser()->roles as $role)
        {
            if ($role->id == AppGlobal::SUPER_ADMIN){
                $post->status = 1;
            };
        }


        $hashTags = $this->_hashTagRepo->createNewTags($request->tags);
        $post->hashTags()->sync($hashTags, false);


        $post->save();

        Session::flash('success', 'Post Update Successfully');

        //back to view
        return redirect()->route('posts.show', $id);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Post $post
     */
    public function destroy($id)
    {

        $post = $this->post->find($id);
        $post->comments()->delete();
        $post->likes()->delete();
        $post->delete();
        $post->hashTags()->detach();
        Session::flash('success', 'Post successfully deleted');
        return redirect()->route('traveller-inn-home');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function storeLike(Request $request)
    {
        $post_id = $request->postId;
        $post = $this->post->find($post_id);

        $like = new Like;
        $like->post_id = $post->id;
        $like->user_id = Auth::user()->id;
        $countOflikes = $this->checkPostIfexistThenDelete($like->user_id, $post_id);
        $status = "You already Like it";
        if ($countOflikes <= 0) {
            $like->save();
            $status = "Liked";
        } else {
            $liked = Like::Where(["user_id" => $like->user_id, "post_id" => $post_id])->first();
//            dd($liked);
            $liked->delete();
        }
        return json_encode(array("status" => $status));
    }

    /**
     * @param $user_id
     * @param $post_id
     * @return mixed
     */
    public function checkPostIfexistThenDelete($user_id, $post_id)
    {
        return $PostLikesCount = Like::Where(["user_id" => $user_id, "post_id" => $post_id])->get()->count();
    }


    /**
     * @param Request $request
     * @param $post_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeComment(Request $request, $post_id)
    {
        $post_id = Input::get('post_id');
        $comment = new Comment();
        $comment->comment = Input::get('comment');
        $comment->post_id = $post_id;
        $comment->user_id = Auth::user()->id;

        $comment->save();
        $date = $comment->created_at->diffForHumans();

        $dataArray = ['user_image' =>$comment->user->image,
                        'user_name'=>  $comment->user->first_name,
                        'comment_date'=>  $date];

        Session::flash('success', 'Comment successfully created');
//        return redirect()->route('posts.show', $post_id);
        return response()->json(['success'=> false, 'error'=>true, 'data'=> ['comment' => $comment, 'dataArray'=> $dataArray]] );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateComment(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'Comment updated');
        return redirect()->route('posts.show', $comment->post->id);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->commentLikes()->delete();
        $comment->delete();

        Session::flash('success', 'The Comment was successfully deleted.');
        return redirect()->route('posts.show', $comment->post->id);
    }


    /**
     * @param Request $request
     * @return string
     */
    public function storeCommentLike(Request $request)
    {
        $comment_id = $request->commentId;
        $comment = Comment::find($comment_id);

        $commentLike = new LikesOnComment();
        $commentLike->comment_id = $comment->id;
        $commentLike->user_id = Auth::user()->id;
        $countOflikes = $this->checkCommentIfexistThenDelete($commentLike->user_id, $comment_id);
        $status = "You already Like it";

        if ($countOflikes <= 0) {
            $commentLike->save();
            $status = "Liked";
        } else {
            $commentLike = LikesOnComment::Where(["user_id" => $commentLike->user_id, "comment_id" => $comment_id])->first();
            $commentLike->delete();
        }


//        Session::flash('success', 'Like successfully created');
        return json_encode(array("status" => $status));

    }

    /**
     * @param $user_id
     * @param $comment_id
     * @return mixed
     */
    public function checkCommentIfexistThenDelete($user_id, $comment_id)
    {
        return $CommentLikesCount = LikesOnComment::Where(["user_id" => $user_id, "comment_id" => $comment_id])->get()->count();
    }


//    public function getFeedItems()
//    {
////        dd("i am here");
//        return Post::all();
//    }
}
