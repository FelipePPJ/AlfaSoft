<div class="row mt-4 mb-5">
    <div class="col-md-6">
        <h2>My Contact List
        <small class="ml-3">
        @if (Route::has('login'))
            @auth
            <a href="{{route('new')}}" class="badge badge-secondary"><i class="fas fa-user-plus"></i> Add contact</a>
            @endauth
        @endif
        </small>
        </h2>
    </div>
    <div class="col-md-6 text-right">
        @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-dark" href="{{route('logout')}}">Logout</button>
        </form>
        @else
            <a href="{{route('login')}}" class="btn btn-outline-dark">Login</a>
        @endauth
    </div>
</div>