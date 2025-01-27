<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./media/icons/logo.png" type="image/x-icon" />
  <link rel="shortcut icon" href="./media/icons/logo.png" />
  <link rel="apple-touch-icon" href="./media/icons/logo.png" />
  <meta name="color-scheme" content="light only">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
  <link rel="stylesheet" href="{{ asset('assets/scss2/style.css') }}">
  <title>100 Jo Cars</title>
</head>

<body>
  <!-- Start Nav -->
  <nav class="nav">
    <div class="logo">
								<img style="width: 40px;" src="{{ asset('images/logo.png') }}" alt=""/> 
      <i class="fa-regular fa-bars" id="menu"></i>
      <span>الدخول الى لوحة التحكم</span>
    </div>
  </nav>
  <!-- End Nav -->
<div class="home">
  <div class="login">
								<img style="width: 80px;" src="{{ asset('images/customers.png') }}" alt=""/> 
    <h2>تسجيل الدخول</h2>
    <form action="{{ route('login.post') }}" method="POST" class="form">
        @csrf
        <div class="input">
          <span>البريد الالكتروني :</span>
          <input type="text" name="email" spellcheck="false" placeholder="البريد الالكتروني" required>
        </div>
        <div class="input">
          <span>كلمة المرور :</span>
          <input type="password" name="password" placeholder="كلمة المرور" required>
        </div>
        <button type="submit">تسجيل الدخول</button>
      </form>
  </div>
</div>
</body>
<script src="./js/main.js"></script>
<script src="./js/scroll.js"></script>

</html>
