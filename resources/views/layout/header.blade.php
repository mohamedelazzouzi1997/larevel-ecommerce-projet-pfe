<header>
   
           
        

    <div style="background-color: #000810 !important; height: 63px;" class="fixed-top navbar navbar-dark  box-shadow">
        <div class=" container d-flex justify-content-between">
            <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                <strong class="hovercolor">E_commerce_Laravel</strong>
            </a>
            <ul class=" navbar-nav">
                <li class= "  nav-item">
                    <a class=" text-white nav-link" href="{{route('index')}}"><i class=" fas fa-shopping-bag"></i> Shop</a>
                </li>
            </ul>
          

            {{-- user profile --}}
            @if (auth()->check())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class=" text-white nav-link" href="{{route('cart_index')}}"><i class="fa fa-shopping-cart"></i> Panier @if ($contents->count() > 0)
                        <span class="text-white badge badge-primary badge-pill">{{$contents->count()}}</span>
                    @endif</a>
                    
                </li>
            </ul>
           
            <div class="dropdown show">
                
                <a class="btn text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" width="32" height="32" src="{{ asset('storage').'/'.auth()->user()->profile_photo_path}}">
                    {{auth()->user()->name}}
                </a>
   
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    
                  <a class="dropdown-item" href="{{route('profile.show')}}">Profile</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">Log Out</a>
                  <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
                
              </div>
            @else
            <ul class=" navbar-nav">
                <li class= "  nav-item">
                    <a class=" text-white nav-link" href="{{route('login')}}">
                        <i class="fas fa-sign-in-alt"></i>
                       Login
                    </a>
                </li>
            </ul>
            <ul class=" navbar-nav">
                <li class= "  nav-item">
                    <a class=" text-white nav-link" href="{{url('register')}}">
                       Register
                    </a>
                </li>
            </ul>
            @endif
           
        </div>

    </div>

    <nav style="margin-top: 63px" class="navbar navbar-expand-lg navbar-light bg-info ">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                
                @foreach ($Categorys as $Category)
                
                    <li class="nav-item">
                        <a style="font-size: larger" class=" nav-link font-weight-bolder" href="{{ route('category',['id'=>$Category->id]) }}">{{$Category->nom}}</a>
                    </li>
                @endforeach
                
            </ul>
        </div>
    </nav>
</header>
