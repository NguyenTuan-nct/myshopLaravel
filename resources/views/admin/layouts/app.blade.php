<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title> <!-- Sử dụng Default Title nếu không có title -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM2Xa6R9fN6B9jUGL5Gj8+Vx4yO5jSI4yJiQRcz" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Đảm bảo đường dẫn CSS chính xác -->
    
    <!-- Meta tags cho SEO và tối ưu hóa -->
    <meta name="description" content="Your App Description">
    <meta name="keywords" content="Your, App, Keywords">
    <meta name="author" content="Your Name">
    
    @stack('head') <!-- Stack for additional styles/scripts -->
</head>
<body>
    <div id="app">
        @include('admin.layouts.navbar') <!-- Include Navbar -->
        
        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    @stack('scripts') <!-- Stack for additional scripts -->
</body>
</html>
