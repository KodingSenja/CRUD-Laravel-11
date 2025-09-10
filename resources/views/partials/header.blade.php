<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">My-APP</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/category">Category</a></li>
          <li><a href="/post">Postingan</a></li>
          @auth
            <li><a href="/profile">Profile</a></li>
          @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

            {{-- user belum login --}}
      @guest
           <div>
              <a href="/login" class="btn btn-primary mr-3">Login</a>
              <a href="/register" class="btn btn-info">Register</a>
            </div>
      @endguest
      
            {{-- user sudah login --}}
      @auth
          <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger">Log out</button>
          </form>
      @endauth

    </div>
  </header>