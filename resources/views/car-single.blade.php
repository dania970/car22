@extends('layouts.app')

@section('title', 'تفاصيل السيارة')

@section('content')

<!-- Content Section -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/car-banner-light.png') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <!-- يمكن إضافة عنوان أو توجيه -->
            </div>
        </div>
    </div>
</section>

<style>
    /* تنسيق قسم تفاصيل السيارة */
    .ftco-section .car-details {
        margin-bottom: 30px;
    }

    .ftco-section .car-info {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        text-align: right; /* إضافة اتجاه النص إلى اليمين */
    }

    .ftco-section .car-info p {
        margin-bottom: 10px;
        color: #333;
    }

    .ftco-section .car-details .img {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-position: center;
        background-size: cover;
        width: 100%;
    }

    .ftco-section .car-details .img:hover {
        opacity: 0.9;
    }
    .related-cars-section .car-wrap {
    margin-bottom: 20px;
}
.related-cars-section h3 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

</style>

<!-- قسم تفاصيل السيارة -->
<section class="ftco-section ftco-car-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <span class="subheading" style="font-size: 20px;">{{ $carSingle->brand->name }}</span>
                <h2>{{ $carSingle->name }}</h2>
            </div>
        </div>
        <div class="car-dee" style="display: flex; justify-content: space-between; gap: 20px;">
            <div class="w-100" style="width: 70%;height: 400px;">
                <div class="car-details">
                    <!-- عرض الصور المتعددة -->
                    @if($carSingle->images->count())
                        <div class="img rounded" id="car-image" style="background-image: url('{{ asset('storage/' . $carSingle->images->first()->image_path) }}'); height: 300px; background-size: cover;">
                        </div>
                        <div class="image-navigation mt-3 text-center">
                            <button id="prev-image" style="background-color: #ddd; padding: 8px 15px; border: none; border-radius: 5px;">&#60;</button>
                            <button id="next-image" style="background-color: #ddd; padding: 8px 15px; border: none; border-radius: 5px;">&#62;</button>
                        </div>
                    @else
                        <div class="img rounded" style="background-image: url('{{ asset('images/default.jpg') }}'); height: 300px; background-size: cover;"></div>
                    @endif
                </div>
            </div>
            <div class="car-info w-100" style="width: 30%;height: 300px;">
                <p><strong>رقم المرجع:</strong> {{ $carSingle->id }}</p>
                <p><strong>العلامة التجارية:</strong> {{ $carSingle->brand->name }}</p>
                <p><strong>السنة:</strong> {{ $carSingle->year }}</p>
                <p><strong>السعر:</strong> {{ $carSingle->price }}  دينار أردني</p>
                <div class="d-flex mb-0 d-block" style="gap: 10px;">
                    <!-- WhatsApp Button -->
                    <a href="https://wa.me/1234567890" class="btn btn-secondary py-2 ml-1" style="display: flex; align-items: center; gap: 8px;">
                        واتساب
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="mb-4">سيارات مشابهة</h3>
            </div>
        </div>
        <div class="row">
            @foreach($relatedCars as $relatedCar)
        <a href="{{ route('car-singles.show', $relatedCar->id) }}" style="text-decoration: none; color: inherit; width: 100%;">
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <!-- عرض صورة السيارة المرتبطة -->
                        <div class="img rounded d-flex align-items-end" style="background-image: url('{{ asset('storage/' . $relatedCar->images->first()->image_path) }}');">
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="{{ route('car-singles.show', $relatedCar->id) }}">{{ $relatedCar->name }}</a></h2>
                            <div class="d-flex mb-3">
                                <span class="cat">{{ $relatedCar->brand->name }}</span>
                                <p class="price ml-auto">{{ $relatedCar->price }} <span>دينار</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block" style="gap: 10px;">
                                <!-- رابط التفاصيل -->
                                <a href="{{ route('car-singles.show', $relatedCar->id) }}" class="btn btn-primary py-1 px-3" style="font-size: 14px; display: flex; align-items: center; gap: 5px;padding: 7px 0 !important;
    align-items: center;
    justify-content: center;
">
                                    التفاصيل
                                    <i class="fas fa-search"></i>
                                </a>

                                <!-- رابط واتساب -->
                                <a href="https://wa.me/{{ $relatedCar->whatsapp_number ?? '' }}" class="btn btn-secondary py-1 px-3" style="font-size: 14px; display: flex; align-items: center; gap: 5px;padding: 7px 0 !important;
    align-items: center;
    justify-content: center;
">
                                    واتساب
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
           </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const images = @json($carSingle->images->pluck('image_path')->map(fn($path) => asset('storage/' . $path))); // تحميل جميع الصور
    let currentIndex = 0;

    const carImage = document.getElementById('car-image');
    const prevButton = document.getElementById('prev-image');
    const nextButton = document.getElementById('next-image');

    function updateImage() {
        carImage.style.backgroundImage = `url(${images[currentIndex]})`;
    }

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateImage();
    });

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        updateImage();
    });
});


</script>


@endsection