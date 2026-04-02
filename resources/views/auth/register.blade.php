<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SuaraSiswa</title>
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
    padding: 2rem;
    width: 100%;
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
    margin-bottom: 1rem;
}

.form-label {
    display: block;
    font-size: 0.85rem;
    margin-bottom: 0.35rem;
    color: var(--text);
    font-weight: 500;
}

/* Input */
.form-control {
    width: 100%;
    padding: 0.65rem 0.75rem;
    border: 1px solid var(--border);
    border-radius: 8px;
    font-size: 0.9rem;
    transition: all 0.2s ease;
}

.form-control:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.15);
}

/* Button */
.btn {
    display: inline-block;
    padding: 0.7rem;
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

/* Error box */
ul {
    padding-left: 1rem;
}

li {
    margin-bottom: 0.25rem;
}

/* Responsive */
@media (max-width: 480px) {
    .auth-card {
        padding: 1.5rem;
        margin: 1rem;
    }
}
    </style>
</head>

<body class="auth-wrapper">
    <div class="card auth-card shadow-lg" style="max-width: 500px;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="font-size: 1.75rem; color: var(--primary); font-family: 'Playfair Display', serif;">DAFTAR AKUN
            </h1>
            <p
                style="color: var(--accent); font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.75rem;">
                Pengaduan Prasarana Sekolah</p>
        </div>

        @if($errors->any())
            <div
                style="background:#FEE2E2; color:#991B1B; padding: 0.75rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.875rem;">
                <ul style="margin-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="nik"><i class="bi bi-card-heading"></i> NIK / NIS
                    (Masyarakat/Siswa)</label>
                <input type="text" id="nik" name="nik" class="form-control" value="{{ old('nik') }}" required autofocus>
            </div>

            <div class="form-group">
                <label class="form-label" for="name"><i class="bi bi-person-badge"></i> Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="username"><i class="bi bi-person"></i> Username</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}"
                    required>
            </div>

            <div class="form-group">
                <label class="form-label" for="phone"><i class="bi bi-telephone"></i> Nomor Telepon</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password"><i class="bi bi-shield-lock"></i> Kata Sandi</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Konfirmasi Kata Sandi</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Buat Akun</button>

            <p style="text-align: center; margin-top: 1.5rem; color: var(--text-muted); font-size: 0.875rem;">
                Sudah punya akun? <a href="{{ route('login') }}" style="font-weight: 600;">Masuk di sini</a>
            </p>
        </form>
    </div>
</body>

</html>