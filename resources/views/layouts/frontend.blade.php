<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title', 'Home')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Brand Accent Trio */
            --indigo: #6366f1;
            --violet: #8b5cf6;
            --cyan: #06b6d4;
            
            /* Signature Gradient */
            --grad-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #06b6d4 100%);
            
            /* Core Backgrounds */
            --bg-main: #030014;
            --bg-footer: #02000a;
            
            /* Text Colors */
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            
            /* Borders */
            --border-default: rgba(255,255,255, 0.08);
            --border-glow: rgba(99,102,241, 0.3);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-primary);
            line-height: 1.6;
        }
        
        /* Navigation */
        .navbar {
            background-color: rgba(3, 0, 20, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-default);
        }
        
        .navbar-brand {
            font-weight: 700;
            background: var(--grad-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-link {
            color: var(--text-secondary) !important;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: var(--indigo) !important;
        }
        
        /* Buttons */
        .btn-primary {
            background: var(--grad-primary);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
        }
        
        .btn-outline-primary {
            border: 1px solid var(--indigo);
            color: var(--indigo);
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: var(--grad-primary);
            border-color: transparent;
            color: white;
        }
        
        /* Hero Section */
        .hero-section {
            background: var(--grad-primary);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(99,102,241,0.3) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        
        /* Cards */
        .card {
            background: rgba(255,255,255, 0.03);
            border: 1px solid var(--border-default);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            border-color: var(--border-glow);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.2);
        }
        
        .service-card {
            transition: all 0.3s ease;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            border-color: var(--indigo);
        }
        
        .service-card .icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--grad-primary);
            margin-bottom: 20px;
            color: white;
            font-size: 1.5rem;
        }
        
        .project-card {
            overflow: hidden;
            border-radius: 12px;
            background: rgba(255,255,255, 0.03);
            border: 1px solid var(--border-default);
        }
        
        .project-card img {
            transition: transform 0.3s ease;
        }
        
        .project-card:hover {
            border-color: var(--border-glow);
        }
        
        .project-card:hover img {
            transform: scale(1.1);
        }
        
        /* Testimonials */
        .testimonial-card {
            background: rgba(255,255,255, 0.03);
            border: 1px solid var(--border-default);
            border-radius: 12px;
            padding: 30px;
            backdrop-filter: blur(10px);
        }
        
        .testimonial-card:hover {
            border-color: var(--border-glow);
        }
        
        /* Card text visibility on dark background */
        .card .card-title {
            color: var(--text-primary);
        }

        .card .card-text {
            color: var(--text-secondary);
        }

        .card small,
        .card p.small,
        .card .small {
            color: var(--text-secondary);
        }

        .card p:not(.card-text):not(.small):not(.mb-0) {
            color: var(--text-secondary);
        }

        /* Technologies */
        .tech-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid var(--border-default);
            margin-bottom: 15px;
            color: var(--indigo);
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .tech-icon:hover {
            background: var(--grad-primary);
            color: white;
            border-color: transparent;
        }
        
        /* Footer */
        .footer {
            background-color: var(--bg-footer);
            color: var(--text-secondary);
            padding: 60px 0 30px;
            border-top: 1px solid var(--border-default);
        }
        
        .footer h5 {
            color: var(--text-primary);
            margin-bottom: 20px;
        }
        
        .footer a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer a:hover {
            color: var(--indigo);
        }
        
        .footer .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255, 0.05);
            border: 1px solid var(--border-default);
            transition: all 0.3s ease;
        }
        
        .footer .social-links a:hover {
            background: var(--grad-primary);
            border-color: transparent;
            color: white;
        }
        
        /* Form Elements */
        .form-control {
            background: rgba(255,255,255, 0.05);
            border: 1px solid var(--border-default);
            color: var(--text-primary);
        }
        
        .form-control:focus {
            background: rgba(255,255,255, 0.08);
            border-color: var(--indigo);
            color: var(--text-primary);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
        }
        
        .form-control::placeholder {
            color: var(--text-muted);
        }
        
        .form-label {
            color: var(--text-secondary);
        }
        
        /* Alerts */
        .alert {
            margin-bottom: 20px;
            border: 1px solid var(--border-default);
            backdrop-filter: blur(10px);
        }
        
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            color: #4ade80;
            border-color: rgba(34, 197, 94, 0.3);
        }
        
        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border-color: rgba(239, 68, 68, 0.3);
        }
        
        /* Section Headers */
        h1, h2, h3, h4, h5, h6 {
            color: var(--text-primary);
        }
        
        p {
            color: var(--text-secondary);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--bg-main);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--indigo);
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--violet);
        }
        
        /* Utility Classes */
        .text-gradient {
            background: var(--grad-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .border-glow {
            border: 1px solid var(--border-glow);
        }
        
        .bg-glass {
            background: rgba(255,255,255, 0.03);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-brain me-2"></i>{{ \App\Models\Setting::get('company_name', config('app.name')) }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('technologies.*') ? 'active' : '' }}" href="{{ route('technologies.index') }}">Technologies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">Contact</a>
                    </li>
                </ul>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary ms-3">
                        <i class="fas fa-lock me-2"></i>Admin
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-4">{{ \App\Models\Setting::get('company_name', config('app.name')) }}</h5>
                    <p>{{ \App\Models\Setting::get('company_description', 'Leading IT solutions provider') }}</p>
                    <div class="social-links mt-3">
                        @if(\App\Models\Setting::get('facebook_url'))
                            <a href="{{ \App\Models\Setting::get('facebook_url') }}" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('twitter_url'))
                            <a href="{{ \App\Models\Setting::get('twitter_url') }}" class="me-3"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('linkedin_url'))
                            <a href="{{ \App\Models\Setting::get('linkedin_url') }}" class="me-3"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('instagram_url'))
                            <a href="{{ \App\Models\Setting::get('instagram_url') }}" class="me-3"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('github_url'))
                            <a href="{{ \App\Models\Setting::get('github_url') }}"><i class="fab fa-github"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}">About</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}">Services</a></li>
                        <li class="mb-2"><a href="{{ route('projects.index') }}">Projects</a></li>
                        <li class="mb-2"><a href="{{ route('products.index') }}">Products</a></li>
                        <li class="mb-2"><a href="{{ route('contact.index') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-4">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            {{ \App\Models\Setting::get('company_address', '123 Tech Street') }}
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone me-2"></i>
                            {{ \App\Models\Setting::get('company_phone', '+1 (555) 123-4567') }}
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope me-2"></i>
                            {{ \App\Models\Setting::get('company_email', 'info@example.com') }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-0">{{ \App\Models\Setting::get('footer_copyright', '© 2024 All rights reserved.') }}</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
