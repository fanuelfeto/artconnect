@extends('layouts.user.user')
@section('title','Home Accesories Catalogue')

@section('content')

<section class="feature_44 bg-light pt-100 text-center text-md-left">
    @foreach($highlight_items as $highlight_item)
    <div class="container px-xl-0">
        <div class="row align-items-center align-items-lg-start">
            <div class="col-xl-1"></div>
            <div class="col-lg-5 col-md-7" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
                <div class="f-22 color-heading text-adaptive">
                    We provide comfortable and modern
                    accesories for your beloved home and family
                    Enjoy the variations of our products
                </div>
                <a href="{{ route('showHomeAccessoriesCatalogue')}}" class="mt-30 btn border-gray color-main">See More</a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-lg-5 col-md-4" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">

                <img class="img" src="{{ asset('images/highlights/'.$highlight_item->picture1) }}" alt="..." />           
            </div>
        </div>
        <div class="mt-75 row justify-content-center justify-content-md-between align-items-end align-items-lg-start flex-row-reverse row2">
            <div class="col-xl-1"></div>
            <div class="col-lg-5 col-md-6 pb-60 pb-lg-0 inner2" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
                <h2 class="mt-55 mb-30 small">Add cozy Furniture <br />to your room</h2>
                <div class="f-22 color-heading text-adaptive">
                    Nothing as comfort as having cozy couches,
                    beds, and eye-catching decorations in your house
                </div>
                <a href="#" class="mt-30 btn border-gray color-main">See More</a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-8" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
                <img srcset="i/feature_44_img_2@2x.png 2x" src="i/feature_44_img_2.png" class="img-fluid img" alt="" />         
            </div>
            <div class="col-xl-1"></div>
        </div>
    </div>
    @endforeach
</section>

@endsection