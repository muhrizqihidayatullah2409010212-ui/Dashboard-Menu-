<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Website Rizqi</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',system-ui,sans-serif;
}

body{
    min-height:100vh;
    background:radial-gradient(circle at top,#1b1f3b,#0a0c1b);
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    color:#fff;
}

/* Antigravity canvas */
#antigravity{
    position:fixed;
    inset:0;
    z-index:0;
}

/* Glow */
.bg{
    position:absolute;
    width:500px;
    height:500px;
    background:linear-gradient(45deg,#7a5cff,#00eaff);
    filter:blur(160px);
    opacity:.55;
    animation:float 12s ease-in-out infinite alternate;
    pointer-events:none;
    z-index:1;
}

@keyframes float{
    from{transform:translate(-60px,-60px);}
    to{transform:translate(60px,60px);}
}

/* Card */
.card{
    position:relative;
    z-index:2;
    width:100%;
    max-width:480px;
    background:rgba(255,255,255,.07);
    backdrop-filter:blur(22px);
    border:1px solid rgba(255,255,255,.12);
    border-radius:28px;
    padding:48px;
    text-align:center;
    animation:fadeUp 1s ease;
}

@keyframes fadeUp{
    from{opacity:0;transform:translateY(30px);}
    to{opacity:1;transform:translateY(0);}
}

h2{
    font-size:28px;
    margin-bottom:8px;
}

p{
    font-size:14px;
    opacity:.75;
    margin-bottom:32px;
}

input{
    width:100%;
    padding:15px 18px;
    margin-bottom:16px;
    border-radius:14px;
    border:1px solid rgba(255,255,255,.15);
    background:rgba(255,255,255,.08);
    color:#fff;
    outline:none;
}

input::placeholder{
    color:rgba(255,255,255,.6);
}

input:focus{
    border-color:#00eaff;
}

button{
    width:100%;
    padding:15px;
    border-radius:30px;
    background:linear-gradient(90deg,#7a5cff,#00eaff);
    color:#000;
    font-weight:600;
    border:none;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    transform:translateY(-3px);
    box-shadow:0 14px 30px rgba(0,234,255,.45);
}

.links{
    margin-top:20px;
    font-size:14px;
}

.links a{
    display:block;
    margin-top:8px;
    color:#7adfff;
    text-decoration:none;
}

.links a:hover{
    text-decoration:underline;
}
</style>
</head>

<body>

<canvas id="antigravity"></canvas>
<div class="bg"></div>

<div class="card">
    <h2>Selamat Datang</h2>
    <p>Login ke Website Rizqi</p>

    <form method="post" action="proses_login.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <div class="links">
        <a href="lupa_password.php">Lupa Password?</a>
        <a href="register.php">Belum punya akun? Daftar</a>
    </div>

</div>

<script>
const canvas = document.getElementById("antigravity");
const ctx = canvas.getContext("2d");

let w, h;
function resize(){
    w = canvas.width = innerWidth;
    h = canvas.height = innerHeight;
}
resize();
addEventListener("resize", resize);

const mouse = { x: w/2, y: h/2 };
addEventListener("mousemove", e => {
    mouse.x = e.clientX;
    mouse.y = e.clientY;
});

/* ===== ANTI GRAVITY PARTICLES ===== */
const particles = [];
const COUNT = 300;
const REPEL_RADIUS = 150;
const FORCE = 0.8;
const FRICTION = 0.93;

for(let i=0;i<COUNT;i++){
    particles.push({
        x: Math.random()*w,
        y: Math.random()*h,
        vx: (Math.random()-0.5)*0.6,
        vy: (Math.random()-0.5)*0.6,
        len: 10 + Math.random()*10
    });
}

function animate(){
    ctx.clearRect(0,0,w,h);

    particles.forEach(p=>{
        const dx = p.x - mouse.x;
        const dy = p.y - mouse.y;
        const dist = Math.sqrt(dx*dx + dy*dy) || 1;

        /* MENOLAK CURSOR */
        if(dist < REPEL_RADIUS){
            const power = (1 - dist / REPEL_RADIUS) * FORCE;
            p.vx += (dx / dist) * power;
            p.vy += (dy / dist) * power;
        }

        p.vx *= FRICTION;
        p.vy *= FRICTION;

        p.x += p.vx;
        p.y += p.vy;

        if(p.x < 0) p.x = w;
        if(p.x > w) p.x = 0;
        if(p.y < 0) p.y = h;
        if(p.y > h) p.y = 0;

        const angle = Math.atan2(p.vy, p.vx);

        ctx.save();
        ctx.translate(p.x, p.y);
        ctx.rotate(angle);
        ctx.strokeStyle = "#3021a1";
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(-p.len/2, 0);
        ctx.lineTo(p.len/2, 0);
        ctx.stroke();
        ctx.restore();
    });

    requestAnimationFrame(animate);
}
animate();
</script>

</body>
</html>
