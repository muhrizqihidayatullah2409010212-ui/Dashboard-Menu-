<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lupa Password</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', system-ui, sans-serif;
}

body {
    min-height: 100vh;
    background: radial-gradient(circle at top, #1b1f3b, #0a0c1b);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    color: #fff;
}

/* Glow background */
.bg {
    position: absolute;
    width: 420px;
    height: 420px;
    background: linear-gradient(45deg, #7a5cff, #00eaff);
    filter: blur(140px);
    opacity: 0.6;
    animation: float 10s ease-in-out infinite alternate;
    pointer-events: none;
}

@keyframes float {
    from { transform: translate(-40px, -40px); }
    to   { transform: translate(40px, 40px); }
}

/* Card */
.card {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 420px;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    border-radius: 22px;
    padding: 40px;
    text-align: center;
    animation: fadeUp 1s ease;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

h2 {
    font-size: 26px;
    margin-bottom: 8px;
}

p {
    font-size: 14px;
    opacity: 0.75;
    margin-bottom: 28px;
}

input {
    width: 100%;
    padding: 14px 16px;
    margin-bottom: 14px;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.15);
    background: rgba(255,255,255,0.08);
    color: #fff;
    outline: none;
}

input::placeholder {
    color: rgba(255,255,255,0.6);
}

input:focus {
    border-color: #00eaff;
}

/* Button link */
a.btn {
    display: block;
    margin-top: 10px;
    padding: 14px;
    border-radius: 30px;
    background: linear-gradient(90deg, #7a5cff, #00eaff);
    color: #000;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s ease;
}

a.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(0,234,255,0.45);
}
</style>
</head>

<body>

<div class="bg"></div>

<div class="card">
    <h2>Lupa Password</h2>
    <p>Fitur reset password sedang dalam perbaikan</p>

    <input type="email" placeholder="Masukkan email" disabled>
    <input type="password" placeholder="Password baru" disabled>

    <a href="perbaikan.html" class="btn">Reset Password</a>
</div>

</body>
</html>
