@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif
@if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>

@endif
@if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>

@endif

@if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>

@endif

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
