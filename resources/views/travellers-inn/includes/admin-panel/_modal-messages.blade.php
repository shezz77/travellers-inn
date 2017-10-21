

@if (Session::has('success'))
    <script>autohidenotify('error')</script>
    {{--<a class="btn btn-danger autohidebut" href="javascript:;" onclick="autohidenotify('error')">Autohide in 3 seconds</a>--}}
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{ Session::get('success') }}
    </div>

@endif

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <strong>Errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif