<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIMBATA | Sistem Informasi Akademik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            display: flex;
            justify-content: space-between;
            gap: 40px;
            animation: fadeSlide 1s ease forwards;
        }

        .left {
            flex: 1;
            animation: fadeLeft 1s ease forwards;
        }

        .right {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
            animation: fadeRight 1s ease forwards;
        }

        h1 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            opacity: 0.95;
        }

        .login-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 25px;
            padding: 12px 26px;
            background: white;
            color: #0d6efd;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            width: fit-content;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 10px 25px rgba(255,255,255,0.35);
        }

        .card {
            background: rgba(255,255,255,0.15);
            border-radius: 14px;
            padding: 20px;
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
            cursor: default;
        }

        .card:hover {
            transform: translateY(-6px);
            background: rgba(255,255,255,0.22);
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        }

        .card h3 {
            margin: 0 0 6px;
            font-size: 18px;
        }

        footer {
            position: absolute;
            bottom: 20px;
            font-size: 13px;
            opacity: 0.8;
        }

        /* ===== ANIMATION ===== */
        @keyframes fadeSlide {
            from { opacity: 0; transform: scale(0.97); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes fadeLeft {
            from { opacity: 0; transform: translateX(-40px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeRight {
            from { opacity: 0; transform: translateX(40px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @media(max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="left">
        <h1>SIMBATA</h1>
        <h3>Sistem Informasi Manajemen Akademik</h3>
        <p>
            Aplikasi berbasis web untuk mengelola data
            <b>Dosen</b>, <b>Mata Kuliah</b>, dan
            <b>Kartu Rencana Studi (KRS)</b>
            secara efisien dan terintegrasi.
        </p>

        <a href="/login" class="login-btn">
            <i class="bi bi-box-arrow-in-right"></i> Login
        </a>
    </div>

    <div class="right">
        <div class="card">
            <h3><i class="bi bi-person-badge"></i> Manajemen Dosen</h3>
            <p>Pengelolaan data dosen secara terstruktur.</p>
        </div>

        <div class="card">
            <h3><i class="bi bi-book"></i> Mata Kuliah</h3>
            <p>Manajemen mata kuliah terintegrasi.</p>
        </div>

        <div class="card">
            <h3><i class="bi bi-journal-check"></i> KRS</h3>
            <p>Pengambilan KRS lebih cepat dan rapi.</p>
        </div>
    </div>
</div>

<footer>
    © 2026 SIMBATA
</footer>

</body>
</html>
