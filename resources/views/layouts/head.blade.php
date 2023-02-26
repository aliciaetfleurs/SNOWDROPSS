<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Link -->
<link rel="shortcut icon" type="image/x-icon"  href="/favicon.png">
<link rel="stylesheet" href="./css/destyle.css">
<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>@yield('title') | {{ config('app.name') }}</title>

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])