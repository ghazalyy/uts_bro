<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Universitas Sultan Ageng Tirtayasa</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/untirta.png') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Quicksand:wght@400;500&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- WOW.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <style>
        /* Aesthetic Color Palette */
        :root {
            --primary: #1e3a8a; /* Deep Sapphire */
            --secondary: #f5e8d3; /* Darker Cream */
            --accent: #facc15; /* Champagne Gold */
            --bg-light: #344155; /* Darker Cream */
            --text-dark: #1e293b; /* Deep Slate */
            --text-light: #334155; /* Darker Gray for contrast */
        }

        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background: var(--bg-light); /* Solid Cream */
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

        /* Register Section */
        .register-section {
            min-height: 100vh;
            background: var(--bg-light); /* Solid Cream */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 100px 60px;
            position: relative;
            overflow: hidden;
        }

        .register-form {
            background: rgba(245, 232, 211, 0.92); /* Darker Cream */
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.25), 0 0 15px rgba(250, 204, 21, 0.3);
            position: relative;
            z-index: 3;
            transform: translateY(0);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .register-form:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3), 0 0 20px rgba(250, 204, 21, 0.5);
        }

        .register-form h1 {
            font-family: 'Josefin Sans', sans-serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            text-shadow: 0 2px 8px rgba(250, 204, 21, 0.4);
        }

        .register-form .content {
            padding: 20px 0;
        }

        .register-form .input-field {
            margin-bottom: 20px;
        }

        .register-form .input-field input {
            font-family: 'Quicksand', sans-serif;
            font-size: 1.2rem;
            width: 100%;
            padding: 10px 0;
            border: none;
            border-bottom: 2px solid var(--text-light);
            background: transparent;
            color: var(--text-dark);
            outline: none;
            transition: border-color 0.3s ease;
        }

        .register-form .input-field input::placeholder {
            color: var(--text-light);
            text-transform: uppercase;
            opacity: 0.7;
        }

        .register-form .input-field input:focus {
            border-color: var(--primary);
        }

        .register-form .invalid-feedback {
            font-family: 'Quicksand', sans-serif;
            font-size: 0.9rem;
            color: #dc3545;
            text-align: left;
            margin-top: 5px;
        }

        .register-form .alert {
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 8px;
        }

        .register-form .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .register-form a.link {
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
            color: var(--text-light);
            text-decoration: none;
            text-transform: uppercase;
            margin-top: 15px;
            display: inline-block;
            transition: color 0.3s ease;
        }

        .register-form a.link:hover {
            color: var(--primary);
        }

        .register-form .action {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .register-form .action button,
        .register-form .action a button {
            font-family: 'Quicksand', sans-serif;
            font-size: 1.1rem;
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .register-form .action a button {
            background: var(--secondary);
            color: var(--text-dark);
        }

        .register-form .action a button:hover {
            background: var(--accent);
            transform: translateY(-2px);
        }

        .register-form .action button[type="submit"] {
            background: var(--primary);
            color: var(--secondary);
        }

        .register-form .action button[type="submit"]:hover {
            background: #2a4ca3;
            transform: translateY(-2px);
        }

        .register-decor {
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .register-section {
                padding: 60px 30px;
            }

            .register-form {
                padding: 30px;
                max-width: 90%;
            }

            .register-form h1 {
                font-size: 2.5rem;
            }

            .register-form .input-field input {
                font-size: 1rem;
            }

            .register-form .action button,
            .register-form .action a button {
                font-size: 1rem;
                padding: 12px;
            }

            .register-decor {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="loader"></div>
    </div>

    <!-- Register Section -->
    <section class="register-section">
        <div class="register-form">
            <form action="/register" method="post" class="form-input">
                @csrf
                <h1 class="wow fadeInUp" data-wow-delay=".2s">Register</h1>
                <div class="content">
                    @if (session()->has('regiserror'))
                        <div class="alert alert-danger alert-dismissible fade show wow fadeInUp" data-wow-delay=".3s" role="alert">
                            {{ session('regiserror') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="input-field wow fadeInUp" data-wow-delay=".4s">
                        <input type="text" name="name" id="name-content-4-1" placeholder="Your Name"
                            value="{{ old('name') }}" class="@error('name') is-invalid @enderror" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-field wow fadeInUp" data-wow-delay=".5s">
                        <input type="number" name="nomor_induk" id="nomor_induk-content-4-1" placeholder="Your NIM"
                            value="{{ old('nomor_induk') }}" class="@error('nomor_induk') is-invalid @enderror" required>
                        @error('nomor_induk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-field wow fadeInUp" data-wow-delay=".6s">
                        <input type="email" name="email" id="floatingInput" placeholder="Your Email Address"
                            value="{{ old('email') }}" class="@error('email') is-invalid @enderror" required autofocus
                            autocomplete="off">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-field wow fadeInUp" data-wow-delay=".7s">
                        <input type="password" name="password" id="password-content-4-1" placeholder="Your Password"
                            class="@error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="#" class="link wow fadeInUp" data-wow-delay=".8s">Forgot Your Password?</a>
                </div>
                <div class="action wow fadeInUp" data-wow-delay=".9s">
                    <a href="/login"><button type="button">Login</button></a>
                    <button type="submit">Register</button>
                </div>
            </form>
            <div class="register-decor"></div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- Initialize WOW.js -->
    <script>
        new WOW().init();
    </script>
    <!-- Preloader Script -->
    <script>
        window.addEventListener('load', function() {
            const preloader = document.querySelector('.preloader');
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 600);
        });
    </script>
</body>

</html>