<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Feed\FeedItem;

/**
 * @property array|string post_title
 * @property array|string post_description
 * @property array|string is_featured
 * @property array|string is_rejected
 * @property mixed id
 */
class Post extends Model implements FeedItem
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at','created_at','updated_at','starting_time','ending_time'];
    protected $fillable = [
        'post_title', 'post_description', 'ebook_title', 'ebook_link', 'country_id', 'state_id', 'diary_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function hashTags()
    {
        return $this->belongsToMany('App\Models\HashTag', 'hash_tag_post', 'post_id', 'hash_tag_id')->withTimestamps();
    }

    public function getRelatedHashTagsAttributes()
    {
        return $this->tags->pluck('id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_post', 'post_id', 'category_id')->withTimestamps();
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Category', 'state_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Category', 'country_id', 'id');
    }

    public function sliders()
    {
        return $this->belongsToMany('App\Models\Slider', 'slider_post', 'post_id', 'slider_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function postUploadedDatas()
    {
        return $this->hasMany('App\Models\PostUploadedData');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function hasAction($user)
    {
        if ($this->likes()->where('user_id', $user)->first())
        {
            return true;
        }
        return false;
    }

    public function diaries()
    {
        return $this->belongsToMany('App\Models\Post', 'diary_post', 'post_id', 'diary_id');
    }

    public function getFeedItemId()
    {
        return $this->id;
    }

    public function getFeedItemTitle()
    {
        return $this->post_title;
    }

    public function getFeedItemSummary()
    {
        return $this->post_description;
    }

    public function getFeedItemUpdated()
    {
        return $this->updated_at;
    }
    public function getFeedItemAuthor() : string
    {
        return "";
    }

    public function getFeedItemLink()
    {
        return action('TravellersInn\PostController@getFeedItems', [$this->url]);
    }
//    public function getFeedItems()
//    {
////        $post = Post::all();
////        dd($post);
//        return Post::all();
//    }
    public function getTipsFeed()
    {
        return Post::where('contant_id','LIKE','%'.'3'.'%')->get();
    }
    public function getImagesFeed()
    {
        return Post::where('contant_id','LIKE','%'.'2'.'%')->get();
    }
    public function getVideosFeed()
    {
        return Post::where('contant_id','LIKE','%'.'4'.'%')->get();
    }
        public function getEbooksFeed()
    {
        return Post::where('contant_id','LIKE','%'.'6'.'%')->get();
    }



}
