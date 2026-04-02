<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Pengaduan Prasarana Sekolah</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <style>
        :root {
    --primary: #4F46E5;
    --primary-dark: #4338CA;
    --accent: #6366F1;
    --bg: #F9FAFB;
    --text: #111827;
    --text-muted: #6B7280;
    --border: #E5E7EB;
}

/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body */
body.auth-wrapper {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #EEF2FF, #F9FAFB);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Card */
.auth-card {
    background: #fff;
    border-radius: 16px;
    padding: 2.5rem 2rem;
    width: 100%;
    max-width: 450px;
    border: 1px solid var(--border);
}

/* Shadow */
.shadow-lg {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

/* Logo */
.auth-logo {
    display: block;
    margin: 0 auto;
}

/* Form */
.form-group {
    margin-bottom: 1.2rem;
}

.form-label {
    display: block;
    font-size: 0.85rem;
    margin-bottom: 0.4rem;
    color: var(--text);
    font-weight: 500;
}

/* Input */
.form-control {
    width: 100%;
    padding: 0.7rem 0.75rem;
    border: 1px solid var(--border);
    border-radius: 8px;
    font-size: 0.9rem;
    transition: all 0.2s ease;
}

.form-control::placeholder {
    color: var(--text-muted);
    font-size: 0.85rem;
}

.form-control:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.15);
}

/* Button */
.btn {
    display: inline-block;
    padding: 0.75rem;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-primary {
    background: var(--primary);
    color: #fff;
}

.btn-primary:hover {
    background: var(--primary-dark);
}

/* Link */
a {
    color: var(--primary);
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Alert sukses */
div[style*="#D1FAE5"] {
    font-size: 0.85rem;
}

/* Alert error */
div[style*="#FEE2E2"] {
    font-size: 0.85rem;
}

/* Responsive */
@media (max-width: 480px) {
    .auth-card {
        padding: 1.8rem 1.2rem;
        margin: 1rem;
    }
}
    </style>

<body class="auth-wrapper">
    <div class="card auth-card shadow-lg">
        <div style="text-align: center; margin-bottom: 3rem;">
            <h1 style="font-size: 1.75rem; color: var(--primary); font-family: 'Playfair Display', serif;">PENGADUAN
                PRASARANA SEKOLAH</h1>
            <p
                style="color: var(--accent); font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.75rem;">
                Lapor Kendala, Wujudkan Kenyamanan Belajar</p>
        </div>

        @if(session('success'))
            <div style="background:#D1FAE5; color:#065F46; padding: 0.75rem; border-radius: 8px; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background:#FEE2E2; color:#991B1B; padding: 0.75rem; border-radius: 8px; margin-bottom: 1rem;">
                Username atau password salah.
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="username"><i class="bi bi-person"></i> Username</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}"
                    required autofocus placeholder="Masukkan username Anda">
            </div>

            <div class="form-group">
                <label class="form-label" for="password"><i class="bi bi-shield-lock"></i> Kata Sandi</label>
                <input type="password" id="password" name="password" class="form-control" required
                    placeholder="Masukkan kata sandi">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Masuk Sekarang</button>

            <p style="text-align: center; margin-top: 1.5rem; color: var(--text-muted); font-size: 0.875rem;">
                Belum punya akun? <a href="{{ route('register') }}" style="font-weight: 600;">Daftar di sini</a>
            </p>
        </form>
        <div>
        <p class="copyright">&copy; {{ date('Y') }} Sistem Aspirasi Made By Rifa XII RPL 2</p>
</div>
    </div>
    
</body>

</html>