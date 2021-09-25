@if ($errors->all())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>

    @endforeach
@endif
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissable fade show">
        <strong>{{ session()->get('success') }}</strong>
        <button type="button" class="close">
            <span>&times;</span>
        </button>
    </div>
@endif
@if (session()->has('warning'))
    <div class="alert alert-warning alert-dismissable fade show">
        <strong>{{ session()->get('warning') }}</strong>
        <button type="button" class="close">
            <span>&times;</span>
        </button>
    </div>
@endif
@if (session()->has('errorlink'))
    <div class="alert alert-danger alert-dismissable fade show">
        <strong>{!! session()->get('errorlink') !!}</strong>
        <button type="button" class="close">
            <span>&times;</span>
        </button>
    </div>
@endif
@if (session()->has('info'))
    <div class="alert alert-info alert-dismissable fade show">
        <strong>{{ session()->get('info') }}</strong>
        <button type="button" class="close">
            <span>&times;</span>
        </button>
    </div>
@endif
