<?php
namespace App\Models;
use Baum\Node;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
* Category
*/
class Category extends Node {
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

  /**
   * Table name.
   *
   * @var string
   */
  protected $table = 'categories';

  //////////////////////////////////////////////////////////////////////////////

  //
  // Below come the default values for Baum's own Nested Set implementation
  // column names.
  //
  // You may uncomment and modify the following fields at your own will, provided
  // they match *exactly* those provided in the migration.
  //
  // If you don't plan on modifying any of these you can safely remove them.
  //

   /**
    * Column name which stores reference to parent's node.
    *
    * @var string
    */
   protected $parentColumn = 'parent_id';

   /**
    * Column name for the left index.
    *
    * @var string
    */
   protected $leftColumn = 'lft';

   /**
    * Column name for the right index.
    *
    * @var string
    */
   protected $rightColumn = 'rgt';

   /**
    * Column name for the depth field.
    *
    * @var string
    */
   protected $depthColumn = 'depth';

   /**
    * Column to perform the default sorting
    *
    * @var string
    */
   protected $orderColumn = null;

   /**
   * With Baum, all NestedSet-related fields are guarded from mass-assignment
   * by default.
   *
   * @var array
   */
    protected $title = 'title';
    protected $genre = 'genre';
    protected $detail = 'detail';
    protected $url = 'url';

    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth', 'title','genre','detail','url');
    protected $fillable = array('id', 'parent_id', 'lft', 'rgt', 'depth','title','genre','detail','url');


//   This is to support "scoping" which may allow to have multiple nested
//   set trees in the same database table.
//
//   You should provide here the column names which should restrict Nested
//   Set queries. f.ex: company_id, etc.


//   /**
//    * Columns which restrict what we consider our Nested Set list
//    *
//    * @var array
//    */
//   protected $scoped = array();

  //////////////////////////////////////////////////////////////////////////////

  //
  // Baum makes available two model events to application developers:
  //
  // 1. `moving`: fired *before* the a node movement operation is performed.
  //
  // 2. `moved`: fired *after* a node movement operation has been performed.
  //
  // In the same way as Eloquent's model events, returning false from the
  // `moving` event handler will halt the operation.
  //
  // Please refer the Laravel documentation for further instructions on how
  // to hook your own callbacks/observers into this events:
  // http://laravel.com/docs/5.0/eloquent#model-events

    public function feeds()
    {
        return $this->hasOne('App\Models\Feed');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'category_post', 'category_id', 'post_id')->withTimestamps();
    }

    public function slider()
    {
        return $this->hasOne('App\Models\Slider');
    }

    public function countryPosts()
    {
        $resultPosts = [];
        $childs = $this->getDescendants();
        foreach ($childs as $child)
        {
            $posts = $child->posts();
                dd($posts);
            foreach ($posts as $post)
            {
                dd("check");
                if ($post)
                {
                    $resultPosts[] = $post;
                }
            }
        }
        return $resultPosts;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//    public function childs()
//    {
//        return $this->hasManyThrough(
//            'App\Models\Category', 'App\Models\Category',
//            'parent_id', 'catergory_id', 'id'
//        );
//    }

    public function childs()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

}
