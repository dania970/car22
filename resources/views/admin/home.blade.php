@extends('adminlayouts.app')
@section('title', 'الرئيسية')
@section('content')

<div class="mainCont" id="main">
    <!-- Start Main Content -->
    <div class="conta p30">
        <h3>اهلا بكم في لوحة التحكم</h3>

        <div class="cons">
          <!-- السيارات -->
          <a href="{{ route('admin.cars') }}" class="itm mi">
            <img src="{{ asset('assets/media/icons/customers.png') }}" alt="سيارات">
            <span>السيارات</span>
            <h1>{{ $carCount }}</h1>
          </a>

          <a href="{{ route('admin.category') }}" class="itm mi">
            <img src="{{ asset('assets/media/icons/mail.png') }}" alt="علامات تجارية">
            <span>العلامات التجارية</span>
            <h1>{{ $brandCount }}</h1>
          </a>
        </div>
    </div>
</div>
@endsection
