<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../mediaicons/logo.png" type="image/x-icon" />
  <link rel="shortcut icon" href="../media/icons/logo.png" />
  <link rel="apple-touch-icon" href="../media/icons/logo.png" />
  <meta name="color-scheme" content="light only">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Local CSS -->
<link rel="stylesheet" href="{{ asset('assets/scss2/style.css') }}">
<style>/* الحاوية الرئيسية */
    .container {
      display: flex; /* استخدام Flexbox لترتيب الـ Sidebar والمحتوى الرئيسي */
      min-height: 100vh; /* يجعل الصفحة تأخذ كامل الطول */
      direction: rtl; /* لجعل النصوص تناسب اللغة العربية */
    }

    .container .sidebar {
      width: 250px;
      background-color: #f8f9fa; /* لون خلفية الـ Sidebar */
      padding: 108px 30px 36px; /* مسافة داخلية */
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* تأثير ظل */
      position: sticky; /* يجعل الـ Sidebar ثابت عند التمرير */
      height: 100vh; /* يغطي كامل الشاشة */
    }

    /* المحتوى الرئيسي */
    .container .main-content {
      flex: 1; /* يأخذ المساحة المتبقية */
      background-color: #ffffff; /* لون خلفية المحتوى */
      overflow-x: hidden; /* منع التمرير الأفقي */
    }

    /* Navbar */
    .container .navbar {
      width: 100%; /* عرض كامل الصفحة */
      background-color: #007bff; /* لون خلفية الـ Navbar */
      color: #fff; /* لون النص */
      padding: 10px; /* مسافة داخلية */
      text-align: center; /* محاذاة النص في الوسط */
    }

    /* تصميم متجاوب */
    @media (max-width: 768px) {
      .container {
        flex-direction: column; /* الـ Sidebar والمحتوى يصبحان فوق بعض */
      }
    }
    </style>

  <title>100 Jo Cars</title>
</head>

<body>
    <div class="container">
      @include('adminlayouts.side') <!-- Sidebar -->
      <div class="main-content">
        @include('adminlayouts.navbar') <!-- Navbar -->
        @yield('content') <!-- Main Content -->
      </div>
    </div>
  </body>




<script src="{{ asset('assets/js2/main.js') }}"></script>
<script src="{{ asset('assets/js2/links.js') }}"></script>
<script src="{{ asset('assets/js2/paginations.js') }}"></script>
<script src="{{ asset('assets/js2/edit.js') }}"></script>
<script src="{{ asset('assets/js2/cat.js') }}"></script>
<script src="{{ asset('assets/js2/select.js') }}"></script>
</html>
