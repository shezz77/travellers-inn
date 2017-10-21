
<li class="dropdown dropdown-submenu">
    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">{{ $childs[0]->parent->title }} <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
    @foreach($childs as $child)
        @if(count($child->getImmediateDescendants()))
            <ul class="dropdown-menu">
                @include('travellers-inn.includes.frontend._submenu', ['childs' => $child->getImmediateDescendants()])
            </ul>
        @endif
    @endforeach
</li>
{{--<li class="dropdown dropdown-submenu">--}}
{{--<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Blog List View <i class="fa fa-chevron-right" aria-hidden="true"></i></a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="{{ route('blog-list') }}">Blog List Right Sidebar</a></li>--}}
{{--<li><a href="{{ route('blog-list-left') }}">blog-list-left-sidebar.html</a></li>--}}
{{--<li><a href="{{ route('blog-list-right') }}">Blog List Fullwidth</a></li>--}}
{{--@foreach($categories = App\Utils\Globals\AppGlobal::getCategories() as $categories)--}}
{{--{!! App\Utils\Globals\AppGlobal::renderNode($categories) !!}--}}
{{--@endforeach--}}
{{--</ul>--}}
{{--</li>--}}
{{--<li class="dropdown dropdown-submenu">--}}
{{--<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Single Blog Post <i class="fa fa-chevron-right" aria-hidden="true"></i></a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="{{ route('blog-single-right') }}">Right Sidebar</a></li>--}}
{{--<li><a href="{{ route('blog-single-right') }}">Right Sidebar</a></li>--}}

{{--</ul>--}}
{{--</li>--}}