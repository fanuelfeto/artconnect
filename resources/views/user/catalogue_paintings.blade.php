@extends('layouts.user.user')
@section('title','Paintings Catalogue')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
    </head>
    <body>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-black">
                    <h2 class="display-4">Paintings Catalogue</h2>
                    <p class="lead fw-normal text-black-50 mb-0">Pick your favorite with good price</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach( $products as $product )
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" height="250" src="{{ asset('images/products/'.$product->productGallery()->first()->picture) }}" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{$product->name}}</h5>
                                    {{$product->description}}
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a href="{{ route('catalogueDetails',['id' => $product->id])}}" class="mt-30 btn border-gray color-main">See More</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/shop_scripts.js') }}"></script>
    </body>
</html>
@endsection