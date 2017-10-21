<div class="row">
    <div class="col-lg-12 portlets">
        <div class="widget">
            <div class="widget-header">
                <h2><i class="icon-chart-pie-1"></i> <strong>Most Viewed</strong> Posts</h2>
                <div class="additional-btn">
                    <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                    <a class="hidden" id="dropdownMenu1" data-toggle="dropdown">
                        <i class="fa fa-cogs"></i>
                    </a>
                    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                    <a href="#" class="widget-popout hidden tt" title="Pop Out/In"><i class="icon-publish"></i></a>
                    <a href="#" class="widget-maximize hidden"><i class="icon-resize-full-1"></i></a>
                    <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                    <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                </div>
            </div>
            <div id="" class="">
                <div class="table-responsive">
                    <table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th >ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th >Status</th>

                            <th>Country</th>
                            <th >Views</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mostViewedPosts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="{{ route('posts.show', $post->id) }}">{{ substr($post->post_title, 0, 20) }}{{ strlen($post->post_title) > 20 ? "......" : "" }} <span class="glyphicon glyphicon-new-window"></span></a></td>
                                <td><a href="{{ route('admin.user.show', $post->user->id) }}">{{ $post->user->user_name }}</a></td>
                                <td><span class="label label-danger">{{ $post->is_featured ? 'Featured' : '' }}</span></td>

                                <td>{{ $post->country->title }}</td>
                                <td><strong class="text-danger">{{ $post->views }}</strong></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>