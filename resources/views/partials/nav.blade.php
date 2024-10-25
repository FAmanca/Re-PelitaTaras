<header class="nav-down responsive-nav d-lg-none d-md-none">
    <button type="button" id="nav-toggle" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#main-nav">
        <span class="visually-hidden">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <div id="main-nav" class="collapse navbar-collapse">
        <nav>
            <ul class="nav">
                <li><a href="/home">Home</a></li>
                <li><a href="#">Postingan</a></li>
                <li><a href="#">Chat BK</a></li>
                <li><a href="#">Yume AI</a></li>
                <li><a href="#">SRQ 29</a></li>
                <li><a href="/about">About Us</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="sidebar-navigation d-none d-sm-block">
    <div class="logo">
        <a href="#"><b>Re:</b>Pelita<em>Taras</em></a>
    </div>
    <nav>
        <ul>
            <li >
                <a style="font-size: 20px" href="/home" class="{{ Request::is('home') ? 'active-section' : '' }}">
                    <span class="rect"></span>
                    <span class="circle"></span>
                    Home
                </a>
            </li>
            <li>
                <a style="font-size: 20px" href="/posts" class="{{ Request::is('posts') ? 'active-section' : '' }}" >
                    <span class="rect"></span>
                    <span class="circle"></span>
                    Postingan
                </a>
            </li>
            <li>
                <a style="font-size: 20px" href="/chatify">
                    <span class="rect"></span>
                    <span class="circle"></span>
                    Chat BK
                </a>
            </li>
            <li>
                <a style="font-size: 20px" href="/ai" class="{{ Request::is('ai') ? 'active-section' : '' }}">
                    <span class="rect"></span>
                    <span class="circle"></span>
                    Yume AI
                </a>
            </li>
            <li>
                <a style="font-size: 20px" href="/srq29" class="{{ Request::is('srq29') ? 'active-section' : '' }}">
                    <span class="rect"></span>
                    <span class="circle"></span>
                    SRQ-29
                </a>
            </li>
            <li>
                <a style="font-size: 20px" href="{{ route('about') }}" class="{{ Request::is('about') ? 'active-section' : '' }}">
                    <span class="rect"></span>
                    <span class="circle"></span>
                    About Us
                </a>
            </li>
            <li>
                <span class="rect"></span>
                <span class="circle"></span>
                <a style="font-size: 20px" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name logot">{{ __('Log Out') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <ul class="social-icons">
        <li style="color: white"> <h5>Selamat Datang, {{ Auth::user()->name }}</h4</li>
    </ul>
</div>
