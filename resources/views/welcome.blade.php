<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang - Pengaduan Prasarana Sekolah</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* Root warna (konsisten semua halaman) */
:root {
    --primary: #4F46E5;
    --primary-dark: #4338CA;
    --accent: #6366F1;
    --background: #F9FAFB;
    --text: #111827;
    --text-muted: #6B7280;
    --border: #E5E7EB;
    --shadow-classic: 0 10px 25px rgba(0, 0, 0, 0.08);
}

/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body */
body {
    font-family: 'Inter', sans-serif;
    background-color: var(--background);
    color: var(--text);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;

    /* background halus */
    background-image:
        radial-gradient(at 0% 0%, rgba(15, 23, 42, 0.03) 0, transparent 50%),
        radial-gradient(at 100% 100%, rgba(79, 70, 229, 0.05) 0, transparent 50%);
}

/* Hero section */
.hero {
    text-align: center;
    max-width: 650px;
    padding: 2rem;
    animation: fadeIn 1s ease-out;
}

/* Judul */
.hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    color: var(--primary);
    margin-bottom: 1rem;
    letter-spacing: -0.02em;
}

/* Deskripsi */
.hero p {
    font-size: 1.1rem;
    color: var(--text-muted);
    margin-bottom: 2.5rem;
    line-height: 1.6;
}

/* Tombol group */
.cta-group {
    display: flex;
    gap: 1.2rem;
    justify-content: center;
    flex-wrap: wrap;
}

/* Tombol umum */
.btn-large {
    padding: 0.9rem 2rem;
    font-size: 0.95rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.25s ease;
    display: inline-block;
}

/* Tombol utama */
.btn-primary-classic {
    background: var(--primary);
    color: #fff;
    border: 1px solid var(--primary);
}

.btn-primary-classic:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-classic);
}

/* Tombol outline */
.btn-outline-classic {
    background: transparent;
    color: var(--primary);
    border: 1px solid var(--border);
}

.btn-outline-classic:hover {
    border-color: var(--accent);
    color: var(--accent);
    transform: translateY(-2px);
}

/* Footer */
footer {
    margin-top: 2rem;
    font-size: 0.85rem;
    color: var(--text-muted);
}

/* Animasi */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(25px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 600px) {
    .hero h1 {
        font-size: 2.2rem;
    }

    .hero p {
        font-size: 1rem;
    }

    .btn-large {
        width: 100%;
    }

    .cta-group {
        flex-direction: column;
    }
}
    </style>
</head>

<body>
    <div class="hero">
        <h1>Pengaduan Prasarana Sekolah</h1>
        <p>Layanan aduan kerusakan sarana prasarana sekolah yang aman, cepat, dan transparan. Laporkan kendala demi
            kenyamanan belajar bersama.</p>

        <div class="cta-group">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-large btn-primary-classic">Masuk ke Dasbor</a>
            @else
                <a href="{{ route('login') }}" class="btn-large btn-primary-classic">Masuk</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-large btn-outline-classic">Daftar Akun</a>
                @endif
            @endauth
        </div>

        <footer style="margin-top: 2rem;">
            &copy; {{ date('Y') }} Pengaduan Prasarana Sekolah. Dibuat dengan integritas.
        </footer>
    </div>
</body>

</html>