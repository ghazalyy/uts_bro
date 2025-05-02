@extends('layouts.main')

@section('container')
    <style>
        /* Aesthetic Color Palette */
        :root {
            --primary: #1e3a8a; /* Deep Sapphire */
            --secondary: #fff7ed; /* Soft Cream */
            --accent: #facc15; /* Champagne Gold */
            --bg-light: #fff7ed; /* Soft Cream */
            --text-dark: #1e293b; /* Deep Slate */
            --text-light: #334155; /* Darker Gray for contrast */
        }

        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background: var(--bg-light); /* Cream for body */
            overflow-x: hidden;
        }

        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.6s ease;
        }

        .loader {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .loader::before, .loader::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid transparent;
            border-top-color: var(--primary);
            animation: spin 1.2s ease-in-out infinite;
        }

        .loader::after {
            border-top-color: var(--accent);
            animation-delay: 0.6s;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: url('assets/images/untircoyyy.jpg') no-repeat center/cover; /* Restored image */
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 100px 60px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(30, 58, 138, 0.7), rgba(252, 231, 243, 0.5));
            animation: gradientShift 15s ease-in-out infinite;
            z-index: 1;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23fff7ed" fill-opacity="1" d="M0,128L1440,64L1440,320L0,320Z"></path></svg>') no-repeat bottom/cover;
            z-index: 2;
        }

        .hero-content {
            background: rgba(255, 247, 237, 0.92); /* Soft Cream for visibility */
            border-radius: 20px;
            padding: 40px;
            max-width: 600px;
            text-align: left;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.25), 0 0 15px rgba(250, 204, 21, 0.3);
            position: relative;
            z-index: 3;
            transform: translateX(0);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .hero-content:hover {
            transform: translateX(8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3), 0 0 20px rgba(250, 204, 21, 0.5);
        }

        .hero-content h1 {
            font-family: 'Josefin Sans', sans-serif;
            font-size: 4.5rem;
            font-weight: 700;
            color: var(--text-dark); /* Deep Slate for contrast */
            line-height: 1.1;
            margin-bottom: 20px;
            text-shadow: 0 2px 8px rgba(250, 204, 21, 0.4);
            letter-spacing: 0.8px;
        }

        .hero-content p {
            font-family: 'Quicksand', sans-serif;
            font-size: 1.4rem;
            color: var(--text-light);
            line-height: 1.7;
            max-width: 500px;
        }

        .hero-decor {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 80px;
            height: 80px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path fill="%23facc15" fill-opacity="0.3" d="M50,20L60,40L80,45L65,60L70,80L50,70L30,80L35,60L20,45L40,40Z"></path></svg>') no-repeat center/contain;
            animation: sparkle 3s ease-in-out infinite;
            z-index: 2;
        }

        @keyframes sparkle {
            0%, 100% { transform: scale(1); opacity: 0.7; }
            50% { transform: scale(1.2); opacity: 1; }
        }

        /* Help Section */
        .help-section {
            padding: 140px 40px;
            background: var(--bg-light); /* Cream */
        }

        .help-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .help-title h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.8rem;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .help-title p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .help-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 35px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .help-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(8px);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .help-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .help-card .icon {
            width: 65px;
            height: 65px;
            background: linear-gradient(45deg, var(--secondary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--primary);
            font-size: 30px;
            transition: transform 0.4s ease;
        }

        .help-card:hover .icon {
            transform: scale(1.1);
        }

        .help-card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.7rem;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .help-card p {
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: var(--text-light);
            line-height: 1.8;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 3rem;
            }

            .hero-content p {
                font-size: 1.2rem;
            }

            .hero-content {
                padding: 30px;
                max-width: 90%;
            }

            .hero-section {
                padding: 60px 30px;
            }

            .hero-decor {
                width: 60px;
                height: 60px;
            }

            .help-section {
                padding: 100px 20px;
            }

            .help-title h2 {
                font-size: 2.2rem;
            }

            .help-grid {
                grid-template-columns: 1fr;
            }

            .help-card {
                padding: 25px;
            }
        }
    </style>

    <!-- Preloader -->
    <div class="preloader">
        <div class="loader"></div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="wow fadeInUp" data-wow-delay=".2s">Sistem Peminjaman Ruangan</h1>
            <p class="wow fadeInUp" data-wow-delay=".4s">Selamat datang di Website Peminjaman Ruang Fakultas Teknik Universitas Sultan Ageng Tirtayasa. Temukan, pesan, dan manfaatkan ruang fakultas dengan mudah dan cepat</p>
        </div>
        <div class="hero-decor"></div>
    </section>

    <!-- Help Section -->
    <section class="help-section">
        <div class="help-title">
            <h2 class="wow fadeInUp" data-wow-delay=".2s">Bantuan</h2>
            <p class="wow fadeInUp" data-wow-delay=".4s">Tata Cara Penggunaan Sistem Peminjaman Ruangan<br>Fakultas Teknik, Universitas Sultan Ageng Tirtayasa</p>
        </div>
        <div class="help-grid">
            <div class="help-card wow fadeInUp" data-wow-delay=".2s">
                <div class="icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                <h3>Login</h3>
                <p>Silahkan login terlebih dahulu.</p>
            </div>
            <div class="help-card wow fadeInUp" data-wow-delay=".4s">
                <div class="icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <h3>Isi Form</h3>
                <p>Silakan menuju ke menu Daftar Ruangan. Jika ruangan tersedia, isi form peminjaman secara lengkap, dan submit.</p>
            </div>
            <div class="help-card wow fadeInUp" data-wow-delay=".6s">
                <div class="icon">
                    <i class="bi bi-clock"></i>
                </div>
                <h3>Proses</h3>
                <p>Tunggu saat proses peminjaman. Untuk mengecek status peminjaman, silakan menuju menu Daftar Peminjaman.</p>
            </div>
        </div>
    </section>

    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">

    <!-- Add Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- JavaScript to hide preloader after page load -->
    <script>
        window.addEventListener('load', function() {
            const preloader = document.querySelector('.preloader');
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 600);
        });
    </script>
@endsection