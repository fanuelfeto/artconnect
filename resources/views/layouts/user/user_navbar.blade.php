<!-- Navigation 18 -->

<nav class="navigation_18 bg-dark pt-30 pb-30 lh-40 text-center">
    <div class="container px-xl-0">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-auto text-lg-left" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
                <a href="{{ route('dashboard') }}" class="logo link color-white">Artconnect</a>
            </div>
            <div class="col-lg-9 text-lg-right" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
                <a href="{{ route('showHighlightsCatalogue')}}" class="link color-white mr-15">Highlights</a>
                <a href="{{ route('showHomeAccessoriesCatalogue')}}" class="link color-white mx-15">Home Accessories</a>
                <a href="#" class="link color-white mx-15">Furniture</a>
                <a href="#" class="link color-white mx-15">Paintings</a>
                <a href="#" class="link color-white mx-15">Sculpture</a>
                <a href="#" class="link color-white mx-15">Login</a>
               
                <a href="{{ route('listCart') }}" class="btn btn-outline-light" >
                        Cart
                        @inject('count', 'App\Services\CountingService')
                        <span class="badge text-black ms-1 rounded-pill">{{ $count->itemsInCart() }}</span>
                    </a>
                </div>
              <!--   <form method="GET" action="/" class="ml-15 mt-10 mt-md-0 d-inline-block">
                    <input type="text" name="search" placeholder="Search" class="input sm w-200 mw-full border-transparent-white focus-white color-white placeholder-transparent-white text-center text-md-left" />
                    <input type="submit" class="d-none" />
                </form> -->
               <!--  <form class="ml-15 mt-10 mt-md-0 d-inline-block">
                    
                </form> -->
            </div>
        </div>
    </div>
</nav>