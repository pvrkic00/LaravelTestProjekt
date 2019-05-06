<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="navbar-brand">CMS</div>
    <button class="navbar-toggler ml-auto hidden-sm-up float-xs-right" type="button" data-toggle="collapse"
            data-target="#navbarNav" aria-controls="navbarToggleExternalContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">



        @auth()
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{asset(route('content'))}}">Home <span class="icon-home ml-1 "></span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{asset(route('addSite'))}}">Add Site<span class="icon-plus ml-1"></span></a>
                </li>

            </ul>
        @endauth

        <ul class="nav navbar-nav ml-auto pull-right" id="loginNav">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><span class="icon-login"></span>{{ __('Login') }}
                    </a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif


            @else
                <li class="nav-item dropdown bg-primary">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="icon-user"></span>
                        {{ Auth::user()->name." ".Auth::user()->last_name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right bg-primary" id="myMenu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item bg-transparent" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="icon-logout"></span> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

        </ul>

    </div>


</nav>
