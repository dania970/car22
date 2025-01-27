@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')

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

  <div class="loader">
        <div class="loaderLogo"><img src="./logo.png" alt=""></div>
        <img src="./loader.svg" alt="">
    </div>
    
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex" style="gap: 15px">
                            <div class="icon mr-3" style="margin-top: 0">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p style="text-align: start;"><span>الهاتف:</span> <a href="tel:+962 7 9642 3572" style="direction: ltr">+962 7 9642 3572</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
                <form action="{{ url('/contact') }}" method="post" class="bg-light p-5 contact-form">
                    @csrf
                    <!-- الحقول الخاصة بالنموذج -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="الاسم" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="الموضوع" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="رسالتك" rows="7" required></textarea>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <button type="submit" class="btn btn-primary py-3 px-5">إرسال الرسالة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<style>
body {
    direction: rtl;
}
</style>
@endsection
