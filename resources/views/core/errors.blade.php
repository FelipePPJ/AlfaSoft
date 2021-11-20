<div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
    <span><b>Error:</b> {{$error}}</span><br>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>