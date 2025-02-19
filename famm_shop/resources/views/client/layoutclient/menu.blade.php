<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->

<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                           
                         
                            
                      
                        </div>
                        <div class="header__top__hover">
                            @if(Auth::user()!==null)
                            <span>{{ Auth::user()->name }}</span>
                            @else
                            <span style="color: aliceblue">User</span>
                            @endif


                            <ul>
                            @if(Auth::user()!==null)
                            <li>   
                                 <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        </li>
                  

                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <li> 
                          <x-dropdown-link :href="route('logout')"
                                  onclick="event.preventDefault();
                                              this.closest('form').submit();">
                              {{ __('Log Out') }}
                          </x-dropdown-link>
                        </li>
                      </form>
                      @else
                      <li> 
                      <x-dropdown-link :href="route('login')">
                        {{ __('Login') }}
                    </x-dropdown-link>
                </li>
                <li> 
                    <x-dropdown-link :href="route('register')">
                      {{ __('Register') }}
                  </x-dropdown-link>
                </li>
                      @endif
                          
                               
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./about.html">About Us</a></li>
                                <li><a href="./contact.html">Contacts</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="{{ route('order.history') }}">Order</a></li>
                    </ul>
                </nav>
              
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                    <a href="#"><img src="img/icon/heart.png" alt=""></a>
                    <a href="{{ route('cart.index') }}"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                    <div class="price">$0.00</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>