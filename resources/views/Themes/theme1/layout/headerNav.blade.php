 <!-- header -->
 <header class="header-default">
     <nav class="navbar navbar-expand-lg">
         <div class="container-xl">
             <!-- site logo -->
             <a class="navbar-brand" href="{{ route('home') }}"><img style="width: 120px"
                     src="{{ asset($config ? $config->logo : '') }}" alt="logo" /></a>

             <div class="collapse navbar-collapse">
                 <!-- menus -->
                 <ul class="navbar-nav mr-auto" style="font-family: 'Anek Bangla';font-weight: 800">
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="">ব্লগ</a>
                         <ul class="dropdown-menu">
                             @foreach ($categories as $category)
                                 <li><a class="dropdown-item"
                                         href="{{ route('category.view', $category->slug) }}">{{ $category->name }}</a>
                                 </li>
                             @endforeach
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Share Story</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                     </li>
                 </ul>
             </div>

             <!-- header right section -->
             <div class="header-right">
                 <!-- social icons -->
                 <ul class="social-icons list-unstyled list-inline mb-0">
                     <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                     <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                 </ul>
                 <!-- header buttons -->
                 <div class="header-buttons">
                     <button type="button" class="search icon-button" aria-label="Search">
                         <i class="icon-magnifier"></i>
                     </button>
                     <button type="button" class="burger-menu icon-button" aria-label="Menu">
                         <span class="burger-icon"></span>
                     </button>
                 </div>
             </div>
         </div>
     </nav>
 </header>
