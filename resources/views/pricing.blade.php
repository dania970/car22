@extends('layouts.app')
@section('title', 'التصنيفات')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

<!-- Content Section -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/car-banner-light.png') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
            </div>
        </div>
    </div>
</section>
<section class="ftco-section" style="padding: 20px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <div class="car-listings">
            @foreach($pricings as $pricing)
                            <a href="{{ route('car-singles.show', $pricing->id) }}" style="text-decoration: none; color: inherit;">

                <div class="car-listing-item" style="margin-bottom: 15px; padding: 15px; background: #fff; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <div class="row align-items-center" style="gap: 40px;text-align: start;">
                        <div class="car-image col-auto" style="width: 350px;height: 250px;">
                            <!-- عرض الصورة الأولى إن وجدت، وإلا عرض الصورة الافتراضية -->
                            <img class="car-image" src="{{ $pricing->images->first() ? asset('storage/' . $pricing->images->first()->image_path) : asset('images/bg_2.jpg') }}"
                            alt="{{ $pricing->name }}"
                                 style="width: 350px; height: 100%; object-fit: cover; border-radius: 6px;">
                                 
                        </div>
                        <div class="res-col">
                            <div class="col text-pric" >
                            <h3 style="font-size: 16px; margin-bottom: 4px;">{{ $pricing->name }}</h3>
                            <p style="color: #666; margin-bottom: 0; font-size: 14px;">
                                Used, {{ $pricing->year }}, {{ $pricing->mileage }} km, Sedan
                            </p>
                        </div>
                        <div class="w-100">
                            <span style="font-size: 18px; font-weight: bold; color: #000; margin-right:0px;">
                                {{ $pricing->price }} دينار أردني
                            </span>
                        </div>
                        <div class="col-auto" style="display: flex; align-items: center; gap: 30px;">
                            <div style="display: flex; gap: 10px;">
                               <a href="{{ route('car-singles.show', $pricing->id) }}" style="background: #2196F3; color: white; text-decoration: none; padding: 8px 20px; border-radius: 4px; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                                   {{ $pricing->phone }}
                                   التفاصيل
                               </a>
                               <button onclick="window.location.href='https://wa.me/+962 7 9642 3572'"
                                       style="background: #25D366; color: white; border: none; padding: 8px 20px; border-radius: 4px; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                                   واتساب
                               </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection