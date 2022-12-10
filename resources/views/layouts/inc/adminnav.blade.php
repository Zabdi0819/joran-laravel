<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('assets/images/JORAN.png') }}" style="width: 100px" alt="LOGO">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{  Request::is('dashboard') ? 'active':'';}} text-center" href="{{ url('dashboard') }}">
              Inicio <br> <i class="material-icons">dashboard</i>
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link {{  Request::is('categories') ? 'active':'';}} text-center" href="{{ url('categories') }}">
            Categorías <br><i class="material-icons">category</i>
          </a>        
        </li>
        <li class="nav-item">
          <a class="nav-link {{  Request::is('add-category') ? 'active':'';}} text-center" href="{{ url('add-category') }}">
            Agregar Categoría <br><i class="material-icons">add</i>
          </a>        
        </li>
        <li class="nav-item">
          <a class="nav-link {{  Request::is('products') ? 'active':'';}} text-center" href="{{ url('products') }}">
            Productos <br><i class="material-icons">inventory</i>
          </a>        </li>
        <li class="nav-item">
          <a class="nav-link {{  Request::is('add-products') ? 'active':'';}} text-center" href="{{ url('add-products') }}">
            Agregar Productos <br><i class="material-icons">add</i>
          </a>        
        </li>
        <li class="nav-item">
          <a class="nav-link {{  Request::is('orders') ? 'active':'';}} text-center" href="{{ url('orders') }}">
            Órdenes <br><i class="material-icons">reorder</i>
          </a>        
        </li>
        <li class="nav-item">
          <a class="nav-link {{  Request::is('users') ? 'active':'';}} text-center" href="{{ url('users') }}">
            Usuarios <br> <i class="material-icons">person</i>
          </a>        
        </li>

        <!-- Authentication Links -->
          @guest
              @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @endif

              @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li>
                          <a class="dropdown-item text-center" href="{{ url('profile') }}">
                              Mi perfil
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item text-center" href="{{ route('logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </li>
                  </ul>
              </li>
          @endguest
      </ul>
    </div>
  </div>
</nav>

