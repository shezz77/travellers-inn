<?php

use App\Models\Resource;
use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
{
    private $model;

    /**
     * ResourceTableSeeder constructor.
     * @param $model
     */
    public function __construct(Resource $model)
    {
        $this->model = $model;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->model->truncate();

        $this->model->create(array(
            'for' => 'admin',
            'name' => 'admin-index',
            'route' => 'admin.index',
            'display_name' => 'Admin Dashboard',
            'description' => 'Rights To Access Admin Dashboard ',
        ));
        $this->model->create(array(
            'for' => 'role',
            'name' => 'role-index',
            'route' => 'role.index',
            'display_name' => ' Role',
            'description' => 'Access To All Role',
        ));
        $this->model->create(array(
            'for' => 'role',
            'name' => 'role-management',
            'route' => 'role.management',
            'display_name' => 'Role Management',
            'description' => 'Access To All Management Of Role',
        ));
        $this->model->create(array(
            'for' => 'role',
            'name' => 'role-attach',
            'route' => 'role.attach',
            'display_name' => 'View Role Assign User ',
            'description' => 'Access To All Role Assign User',
        ));
        $this->model->create(array(
            'for' => 'resource',
            'name' => 'resource-attach',
            'route' => 'resource.attach',
            'display_name' => 'View Resource Assign User ',
            'description' => 'Access To All Resource Assign User',
        ));
        $this->model->create(array(
            'for' => 'resource',
            'name' => 'resource-management',
            'route' => 'resource.management',
            'display_name' => 'Resource Management',
            'description' => 'Access To All Management Of Resource',
        ));
        $this->model->create(array(
            'for' => 'role',
            'name' => 'role-show',
            'route' => 'role.show',
            'display_name' => 'Role Show',
            'description' => 'Access To All Show Role',
        ));
        $this->model->create(array(
            'for' => 'role',
            'name' => 'update-role',
            'route' => 'role.update',
            'display_name' => 'Role Update',
            'description' => 'Access To All User Update Role',
        ));
        $this->model->create(array(
            'for' => 'role',
            'name' => 'role-store',
            'route' => 'role.store',
            'display_name' => 'Role Store',
            'description' => 'Access To All User Against Role',
        ));
        $this->model->create(array(
            'for' => 'role',
            'name' => 'role-delete',
            'route' => 'role.delete',
            'display_name' => 'Role Delete',
            'description' => 'Role Delete Form Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'resource',
            'name' => 'resource-index',
            'route' => 'resource.index',
            'display_name' => ' Resources',
            'description' => 'Access To All Resources',
        ));
        $this->model->create(array(
            'for' => 'resource',
            'name' => 'resource-show',
            'route' => 'resource.show',
            'display_name' => 'Resource Show',
            'description' => 'Show To All Resource',
        ));
        $this->model->create(array(
            'for' => 'user',
            'name' => 'user-list',
            'route' => 'user.list',
            'display_name' => 'All User List',
            'description' => 'Access To All User List Of Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'user',
            'name' => 'admin-user-show',
            'route' => 'admin.user.show',
            'display_name' => 'All User Detail',
            'description' => 'Access To All User Detail Of Travellers Inn ',
        ));
        $this->model->create(array(
            'for' => 'user',
            'name' => 'user-profile',
            'route' => 'user.profile',
            'display_name' => 'User Profile',
            'description' => 'Access User Profile',
        ));
        $this->model->create(array(
            'for' => 'user',
            'name' => 'state-list',
            'route' => 'state.list',
            'display_name' => 'All User States',
            'description' => 'Access To All User States',
        ));
        $this->model->create(array(
            'for' => 'user',
            'name' => 'user-country',
            'route' => 'user.country',
            'display_name' => 'All User Country',
            'description' => 'Access To All User Country',
        ));
        $this->model->create(array(
            'for' => 'user',
            'name' => 'user-countries',
            'route' => 'user.countries',
            'display_name' => 'All User Countries',
            'description' => 'Access To All User Countries',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'post-index',
            'route' => 'posts.index',
            'display_name' => 'All User Post',
            'description' => 'Access To All User New Post',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'posts-edit',
            'route' => 'posts.edit',
            'display_name' => 'Post Edit',
            'description' => 'Post Edit In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'posts-show',
            'route' => 'posts.show',
            'display_name' => 'Post Show',
            'description' => 'Post Show In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'posts-delete',
            'route' => 'posts.delete',
            'display_name' => 'Post delete',
            'description' => 'Post delete In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'post-pending',
            'route' => 'post.pending',
            'display_name' => 'Pending Post',
            'description' => 'Post Status Is Pending',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'post-approve',
            'route' => 'post.approve',
            'display_name' => 'Update Post',
            'description' => 'Right to Approve Post In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'post-reject',
            'route' => 'post.reject',
            'display_name' => 'Reject Post',
            'description' => 'Rights To Reject Post In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'post-feature',
            'route' => 'post.feature',
            'display_name' => 'Featured Post',
            'description' => 'Post Add In Feature List',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'post-feature-remove',
            'route' => 'remove.feature',
            'display_name' => 'Remove Featured Post',
            'description' => 'Post Remove In Feature List',
        ));
        $this->model->create(array(
            'for' => 'slider',
            'name' => 'slider-index',
            'route' => 'slider.index',
            'display_name' => 'Slider',
            'description' => 'Access to all slider',
        ));
        $this->model->create(array(
            'for' => 'slider',
            'name' => 'slider-create',
            'route' => 'slider.create',
            'display_name' => 'New Slider Create',
            'description' => 'New Slider Create In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'slider',
            'name' => 'slider-update',
            'route' => 'slider.update',
            'display_name' => 'Update Slider',
            'description' => 'Update Slider In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'slider',
            'name' => 'slider-view',
            'route' => 'slider.view',
            'display_name' => 'View Slider',
            'description' => 'All Slider View In Travellers Inn ',
        ));
        $this->model->create(array(
            'for' => 'slider',
            'name' => 'slider-delete',
            'route' => 'slider.delete',
            'display_name' => 'Delete Slider',
            'description' => 'Slider Delete In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'slider',
            'name' => 'slider-post-attach',
            'route' => 'slider.post.attach',
            'display_name' => 'Post Attach To Slider ',
            'description' => 'Post Attach To Slider In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'slider',
            'name' => 'slider-post-detach',
            'route' => 'slider.post.detach',
            'display_name' => 'Post Detach To Slider ',
            'description' => 'Post Detach To Slider In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'hashtags',
            'name' => 'hash-tags-index',
            'route' => 'hash-tags.index',
            'display_name' => 'Hash Tags Show',
            'description' => 'Access To All Hash Tags',
        ));
        $this->model->create(array(
            'for' => 'hashtags',
            'name' => 'hash-tags-edit',
            'route' => 'hash-tags.edit',
            'display_name' => 'Hash Tags Edit',
            'description' => 'Hash Tags Edit In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'hashtags',
            'name' => 'hash-tags-create',
            'route' => 'hash-tags.create',
            'display_name' => 'Hash Tags Create',
            'description' => 'New Hash Tags Created In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'hashtags',
            'name' => 'hash-tags-update',
            'route' => 'hash-tags.update',
            'display_name' => 'Hash Tags Update',
            'description' => 'New Hash Tags Updated In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'hashtags',
            'name' => 'hash-tags-delete',
            'route' => 'hash-tags.delete',
            'display_name' => 'Hash Tags delete',
            'description' => 'Hash Tags delete In Travellers Inn',
        ));
        $this->model->create(array(
            'for' => 'admin',
            'name' => 'visitor-show',
            'route' => 'visitor.show',
            'display_name' => 'New Visitor',
            'description' => 'Access To All New Visitor',
        ));
        $this->model->create(array(
            'for' => 'category',
            'name' => 'category-index',
            'route' => 'category.index',
            'display_name' => 'Category',
            'description' => 'Access To All Category ',
        ));
        $this->model->create(array(
            'for' => 'category',
            'name' => 'category-show',
            'route' => 'category.show',
            'display_name' => 'New Category Show',
            'description' => 'New Created Category Show ',
        ));
        $this->model->create(array(
            'for' => 'category',
            'name' => 'category-create',
            'route' => 'category.create',
            'display_name' => 'New Category Create',
            'description' => 'Access To All New Created Category ',
        ));
        $this->model->create(array(
            'for' => 'category',
            'name' => 'category-store',
            'route' => 'category.store',
            'display_name' => 'New Category Store',
            'description' => 'Access To All New Store Category',
        ));
        $this->model->create(array(
            'for' => 'category',
            'name' => 'fetch-category',
            'route' => 'fetch.category',
            'display_name' => 'New Category Fetch',
            'description' => 'Access To All New Fetch Category',
        ));
        $this->model->create(array(
            'for' => 'post',
            'name' => 'reject-list',
            'route' => 'reject.list',
            'display_name' => 'Reject List',
            'description' => 'Rights To Reject list In Travellers Inn',
        ));
    }
}
