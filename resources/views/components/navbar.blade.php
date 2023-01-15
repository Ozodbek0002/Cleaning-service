<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <a href="" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-primary">Klean</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->routeIs('/') ? 'active' : '' }}">Asosiy</a>
            <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Biz haqimizda</a>
            <a href="{{ route('services') }}" class="nav-item nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Servislar</a>
            <a href="{{route('projects')}}" class="nav-item nav-link {{ request()->routeIs('projects') ? 'active' : '' }}">Loyihalar</a>
            <a href="{{route('posts.index')}}" class="nav-item nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}">Bloglar</a>
            <a href="{{route('contact')}}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Aloqa</a>
        </div>
        @auth()

            <div>
                {{ Auth::user()->name }}
            </div>

            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger d-none d-lg-block">Chiqish</button>
            </form>

            <a href="{{route('posts.create')}}" class="btn btn-primary mr-3 d-none d-lg-block">Po`st yaratish</a>
        @else
            <a href="{{route('login')}}" class="btn btn-primary mr-3 d-none d-lg-block"> Kirish </a>
        @endauth
    </div>
</nav>
