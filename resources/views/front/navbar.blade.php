 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
     <div class="container px-4 px-lg-5">
         <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
             aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
             Menu
             <i class="fas fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
             <ul class="navbar-nav ms-auto py-4 py-lg-0">
                 <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/') }}">Home</a></li>
                 <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.html">About</a></li>
                 <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.html">Sample Post</a></li>
                 <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.html">Contact</a></li>

                 @if (Route::has('login'))
                     @auth
                         <li class="nav-item">
                             <a href="{{ route('dashboard') }}" class="nav-link px-lg-3 py-3 py-lg-4">Dashboard</a>
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link px-lg-3 py-3 py-lg-4">Create Post</a>
                         </li>

                         <li class="nav-item dropdown">
                             <a class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" id="navbarDropdown" href="#"
                                 role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="fas fa-user fa-fw"></i> {{ Auth::user()->name }}
                             </a>
                             <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                 <li class="nav-item">
                                     <x-responsive-nav-link :href="route('profile.edit')">
                                         {{ __('Profile') }}
                                     </x-responsive-nav-link>
                                 </li>
                                 <li class="nav-item">
                                     <hr class="dropdown-divider" />
                                 </li>
                                 <li class="nav-item">
                                     <form method="POST" action="{{ route('logout') }}" id="form-logout">
                                         @csrf
                                     </form>

                                     <a href="#" class="nav-link px-lg-3 py-3 py-lg-4"
                                         onclick="event.preventDefault();document.getElementById('form-logout').submit()">Logout</a>
                                 </li>
                             </ul>
                         </li>
                     @else
                         <li class="nav-item">
                             <a href="{{ route('login') }}" class="nav-link px-lg-3 py-3 py-lg-4">Login</a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('register') }}" class="nav-link px-lg-3 py-3 py-lg-4">Register</a>
                         </li>
                     @endauth
                 @endif
             </ul>
         </div>
     </div>
 </nav>
