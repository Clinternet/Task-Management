<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Heavenly Shopping' }}</title>
    
    <!-- CSS Links -->
    <link rel="icon" type="images/x-icon" href="/images/app-icon.jpg">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ asset('css/products.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-DjGos_hs.css') }}"> --}}

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <!-- Logo & Name -->
            <div style="display: flex; align-items: center; gap: 15px; padding: 10px;">
                <img src="/images/logo2.jpg" alt="Logo" width="50">
                <h4>ShoeShells</h4>
            </div>
            <div class="divider"></div>

            <!-- Sidebar Menu -->
            <ul class="menu">
                @if(Auth::user()->user_role === 'customer')
                    
                
                    <li><a href="{{ route(name: '/home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="{{ route(name: '/cart') }}"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                    <li><a href="{{ route(name: 'purchase.page') }}"><i class="fas fa-shopping-bag"></i> Purchases</a></li>
                    <li><a href="{{ route(name: 'billing.page') }}"><i class="fas fa-credit-card"></i> Billing</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a href="{{ route(name: 'logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                @else
                    <li><a href="{{ route(name: 'dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="{{ route(name: 'products') }}"><i class="fas fa-shopping-basket"></i> Products</a></li>
                    <li>
                        <form class="logout" method="POST" action="{{ route('logout')}}">
                            @csrf
                            <button class="logout-btn" type="submit"><i class="fas fa-sign-out-alt"></i> &nbsp;&nbsp;Logout</button>
                        </form>
                    </li>


                @endif
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>
</html>
