<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
        <img src="{{ asset ('img/brand/logo_tugu.png')}}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a class="navbar-brand pt-0" href="./index.html">
                <img src="{{ asset ('img/brand/logo_tugu.png')}}" class="navbar-brand-img" alt="...">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/user">
              <i class="ni ni-single-02 text-primary"></i> User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/position">
              <i class="ni ni-planet text-blue"></i> Position
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/item">
              <i class="ni ni-bullet-list-67 text-primary"></i>Item
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="/list">
              <i class="ni ni-align-center text-primary"></i>Stock Item
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="/card">
              <i class="ni ni-basket text-primary"></i> Card
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
      </div>
    </div>
  </nav>