<nav class="navbar navbar-expand-lg  nav-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}"><img src="{{ asset('favicon.gif') }}" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts_index') }}">All Posts</a>
                </li>
                <li class="nav-item dropdown">
                    @auth
                        <a class="nav-link dropdown-toggle custom-dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu custom-dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('profiles.show') }}">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('post_create') }}">Create Post</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item" href="">Logout</button>
                                </form>
                            </li>

                        </ul>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        </ul>
                    @endauth


                </li>

            </ul>

        </div>
    </div>
</nav>
