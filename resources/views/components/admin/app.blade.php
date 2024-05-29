<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>SukaSukaKu</title>
  <link rel="icon" href="{{ asset('img/sukasukaku2-icon.png') }}" type="image">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
</head>
<body class="bg-gray-50">
    <x-admin.footer></x-admin.footer>
    
    <x-admin.header></x-admin.header>
    
    <!-- ========== MAIN CONTENT ========== -->
    <x-admin.navigation></x-admin.navigation>
  
    {{ $slot }}
    <!-- ========== END MAIN CONTENT ========== -->
    
</body>
</html>
