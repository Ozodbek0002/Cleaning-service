<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <a href="{{route('main')}}" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-primary">Klean</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->routeIs('/') ? 'active' : '' }}">{{ __('Bosh sahifa') }}</a>
            <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Biz
                haqimizda</a>
            <a href="{{ route('services') }}"
               class="nav-item nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Servislar</a>
            <a href="{{route('projects')}}"
               class="nav-item nav-link {{ request()->routeIs('projects') ? 'active' : '' }}">Loyihalar</a>
            <a href="{{route('posts.index')}}"
               class="nav-item nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}">Bloglar</a>
            <a href="{{route('contact')}}"
               class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Aloqa</a>

        </div>

        @foreach( $all_locale as $locale)
            <a href="{{route('language.change',['locale'=>$locale])}}" class="btn btn-primary mr-3 d-none d-lg-block">
                {{  $locale  }}
            </a>
        @endforeach
        @auth()

            <div>
                @if( auth()->user()->unreadNotifications()->count()!=0)

                    <a href="{{ route('notifications.index') }}" class=" btn btn-primary mr-3">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5"/>
                        </svg>

                        <span class="badge badge-light"> {{ auth()->user()->unreadNotifications()->count() }} </span>

                    </a>
                @endif
            </div>

            <div style="width: 10px;">

            </div>

            <div>
                {{ Auth::user()->name }}
            </div>

            <form action="{{route('logout')}}" method="GET">
                @csrf
                <button type="submit" class="btn btn-danger d-none d-lg-block">Chiqish</button>
            </form>

            <a href="{{route('posts.create')}}" class="btn btn-primary mr-3 d-none d-lg-block">Po`st yaratish</a>
        @else
            <a href="{{route('login')}}" class="btn btn-primary mr-3 d-none d-lg-block"> Kirish </a>
        @endauth
    </div>
</nav>
