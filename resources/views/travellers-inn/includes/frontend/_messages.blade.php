@if (Session::has('success'))
    <div class="container">
        <div class="alert alert-success" role="alert" id="alert">
            <i class="fa fa-check" style="margin-right: 10px;"></i>{{ Session::get('success') }}
        </div>
    </div>

@endif
@if (count($errors) > 0)
    <div class="container">
        <div class="alert alert-danger" role="alert" id="alert-error">
            <i class="fa fa-exclamation" style="margin-right: 10px;"></i><strong>Errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@section('script')
    <script src="{{ asset('js/post/post.js') }}"></script>
@endsection