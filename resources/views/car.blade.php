@extends('layouts.app')

@section('title', 'موقع للسيارات')

@section('content')

<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/car-banner-light.png') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <!-- Optional Heading -->
            </div>
        </div>
    </div>
</section>

<!-- Filter Cars Section -->
<div class="car-filter">
    <button class="filter-btn" onclick="filterCars('all')">الكل</button>
    @foreach($brands as $brand)
        <button class="filter-btn" onclick="filterCars('{{ strtolower(str_replace(' ', '-', $brand->name)) }}')">{{ $brand->name }}</button>
    @endforeach
</div>

<!-- Car Section -->
<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row">
            @foreach($cars as $car)
                <div class="col-lg-3 col-md-6 car {{ strtolower(str_replace(' ', '-', $car->brand->name)) }}">
                    <div class="car-wrap rounded ftco-animate">
                        <!-- Display the first image or default -->
                                            <a href="{{ route('car-singles.show', $car->id) }}" class="car-wrap rounded ftco-animate" style="text-decoration: none; color: inherit;">

                        <div class="img rounded d-flex align-items-end"
                             style="background-image: url('{{ $car->images->first() ? asset('storage/' . $car->images->first()->image_path) : asset('images/default-car.jpg') }}');">
                        </div>
                        <div class="text p-3">
                            <h2 class="mb-2">
                                <a href="{{ route('car-singles.show', $car->id) }}">{{ $car->name }}</a>
                            </h2>
                            <div class="d-flex mb-3">
                                <span class="cat">{{ $car->brand->name }}</span>
                                <p class="price ml-auto">{{ $car->price }} <span>JOD</span></p>
                            </div>
                            <div class="d-flex mb-0 d-block" style="gap: 10px;">
                                <!-- Detail Button -->
                                <a href="{{ route('car-singles.show', $car->id) }}" class="btn btn-primary py-2 mr-1" style="display: flex; align-items: center; gap: 8px;">
                                    التفاصيل
                                </a>
                                <!-- WhatsApp Button -->
                                <a href="https://wa.me/1234567890" class="btn btn-secondary py-2 ml-1" style="display: flex; align-items: center; gap: 8px;">
                                    واتساب
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $cars->links() }}
        </div>
    </div>
</section>

<!-- Loader -->
<div class="loader">
    <div class="loaderLogo">
        <img src="{{ asset('images/logo.png') }}" alt="Loader Logo">
    </div>
    <img src="{{ asset('images/loader.svg') }}" alt="Loader">
</div>
@endsection

<!-- Custom Styles -->
<style>
    body {
        font-family: 'Arial', sans-serif;
    }

    .car-filter {
        text-align: center;
        margin: 20px 0;
    }

    .filter-btn {
        background-color: #007bff;
        color: black;
        border: none;
        padding: 10px 15px;
        margin: 5px;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .filter-btn:hover {
        background-color: #0056b3;
        color: #fff;
    }

    .car-wrap {
        background: #f9f9f9;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        margin-bottom: 20px;
    }

    .car-wrap:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .img {
        height: 200px;
        background-size: cover;
        background-position: center;
    }

    .text {
        padding: 15px;
    }

    .text h2 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .cat {
        font-size: 14px;
        font-weight: bold;
        color: #555;
    }

    .price {
        font-size: 16px;
        font-weight: bold;
        color: #007bff;
    }

    .btn {
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
    }

    .pagination-wrapper {
        text-align: center;
        margin-top: 20px;
    }

    .pagination .page-link {
        color: #333;
        border: 1px solid #ddd;
        padding: 8px 12px;
        margin: 0 5px;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .loader {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        justify-content: center;
        align-items: center;
    }

    .loaderLogo img {
        max-width: 100px;
    }
</style>

<!-- Custom Scripts -->
<script>
    function filterCars(name) {
        const cars = document.querySelectorAll('.car');

        if (name === 'all') {
            cars.forEach(car => {
                car.classList.remove('hidden');
            });
        } else {
            cars.forEach(car => {
                if (car.classList.contains(name)) {
                    car.classList.remove('hidden');
                } else {
                    car.classList.add('hidden');
                }
            });
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        filterCars('all');
    });
</script>