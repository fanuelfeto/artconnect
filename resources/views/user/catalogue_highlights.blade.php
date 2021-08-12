@extends('layouts.user.user')
@section('title','Welcome')
@section('content')

<section class="feature_44 bg-light pt-100 text-center text-md-left">
    <div class="container px-xl-0">
        @foreach($highlights as $highlight)
        <div class="row align-items-center align-items-lg-start">
            <div class="col-xl-1"></div>
            <div class="col-lg-5 col-md-7" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
                <h3 class="mt-20 mb-30 small">{{ $highlight->name }}</h3>
                <div class="f-18 color-heading text-adaptive">
                   {{  $highlight->description }}
                </div>
                <a href="{{ route('showHomeAccessoriesCatalogue')}}" class="mt-30 btn border-gray color-main" style="width:100px;height:100px;">See More</a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-lg-5 col-md-4" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
                 <img class="card-img-top" height="250" src="{{ asset('images/products/'.$highlight->productGallery()->first()->picture) }}" class="img-fluid img" alt="..." />         
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection