<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Food Delivery App — README</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Syne', sans-serif;
    background: #0a0a0a;
    color: #f0ede6;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    padding: 3rem 1rem;
  }

  .rm-root {
    width: 100%;
    max-width: 780px;
    padding: 2.5rem 2.5rem;
    position: relative;
    overflow: hidden;
  }

  .rm-root::before {
    content: '';
    position: absolute;
    top: -120px; right: -120px;
    width: 420px; height: 420px;
    background: radial-gradient(circle, #ff4d00 0%, transparent 65%);
    opacity: 0.12;
    pointer-events: none;
  }

  .rm-root::after {
    content: '';
    position: absolute;
    bottom: -80px; left: -80px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, #ff9a00 0%, transparent 65%);
    opacity: 0.09;
    pointer-events: none;
  }

  .header {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    margin-bottom: 2.5rem;
    position: relative;
    z-index: 1;
  }

  .logo-box {
    width: 64px; height: 64px;
    background: linear-gradient(135deg, #ff4d00, #ff9a00);
    border-radius: 18px;
    display: flex; align-items: center; justify-content: center;
    font-size: 30px;
    flex-shrink: 0;
    box-shadow: 0 0 30px rgba(255,77,0,0.4);
  }

  .title-area h1 {
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -0.03em;
    color: #fff;
    line-height: 1.1;
  }

  .title-area p {
    font-size: 13px;
    color: #888;
    margin-top: 4px;
    font-family: 'DM Mono', monospace;
    letter-spacing: 0.04em;
  }

  .badges {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 2rem;
    position: relative; z-index: 1;
  }

  .badge {
    font-family: 'DM Mono', monospace;
    font-size: 11px;
    padding: 4px 12px;
    border-radius: 100px;
    font-weight: 500;
    letter-spacing: 0.05em;
  }

  .badge-orange { background: rgba(255,77,0,0.15); color: #ff7a33; border: 1px solid rgba(255,77,0,0.3); }
  .badge-yellow { background: rgba(255,154,0,0.12); color: #ffb84d; border: 1px solid rgba(255,154,0,0.25); }
  .badge-gray   { background: rgba(255,255,255,0.06); color: #aaa; border: 1px solid rgba(255,255,255,0.12); }

  .section-label {
    font-size: 10px;
    font-family: 'DM Mono', monospace;
    letter-spacing: 0.15em;
    color: #555;
    text-transform: uppercase;
    margin-bottom: 12px;
    margin-top: 2rem;
    position: relative; z-index: 1;
  }

  .features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 10px;
    margin-bottom: 1.5rem;
    position: relative; z-index: 1;
  }

  .feature-card {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 14px;
    padding: 16px 18px;
    transition: border-color 0.2s, background 0.2s;
  }

  .feature-card:hover {
    background: rgba(255,77,0,0.07);
    border-color: rgba(255,77,0,0.25);
  }

  .feature-icon {
    font-size: 22px;
    margin-bottom: 8px;
    display: block;
  }

  .feature-card h3 {
    font-size: 13px;
    font-weight: 700;
    color: #f0ede6;
    margin-bottom: 4px;
  }

  .feature-card p {
    font-size: 11px;
    color: #666;
    line-height: 1.5;
  }

  .stack-row {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 1rem;
    position: relative; z-index: 1;
  }

  .stack-pill {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 10px;
    padding: 8px 14px;
    font-size: 12px;
    font-weight: 500;
    color: #ccc;
  }

  .stack-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    flex-shrink: 0;
  }

  .steps {
    position: relative; z-index: 1;
  }

  .step {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 13px 0;
    border-bottom: 1px solid rgba(255,255,255,0.05);
  }

  .step:last-child { border-bottom: none; }

  .step-num {
    width: 28px; height: 28px;
    border-radius: 8px;
    background: rgba(255,77,0,0.15);
    border: 1px solid rgba(255,77,0,0.3);
    display: flex; align-items: center; justify-content: center;
    font-size: 11px;
    font-family: 'DM Mono', monospace;
    color: #ff7a33;
    font-weight: 500;
    flex-shrink: 0;
    margin-top: 1px;
  }

  .step-text h4 {
    font-size: 13px;
    font-weight: 700;
    color: #f0ede6;
    margin-bottom: 3px;
  }

  .step-text p {
    font-size: 12px;
    color: #666;
    line-height: 1.5;
  }

  .step-text code {
    font-family: 'DM Mono', monospace;
    font-size: 11px;
    color: #ff9a55;
    background: rgba(255,154,0,0.1);
    padding: 1px 5px;
    border-radius: 4px;
  }

  .footer {
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid rgba(255,255,255,0.07);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
    position: relative; z-index: 1;
  }

  .footer-author {
    font-size: 12px;
    color: #555;
    font-family: 'DM Mono', monospace;
  }

  .footer-author span {
    color: #ff7a33;
    font-weight: 500;
  }

  .footer-links {
    display: flex;
    gap: 8px;
  }

  .footer-link {
    font-size: 11px;
    font-family: 'DM Mono', monospace;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    color: #888;
    padding: 6px 14px;
    border-radius: 8px;
    text-decoration: none;
    transition: color 0.2s, border-color 0.2s;
  }

  .footer-link:hover { color: #ff7a33; border-color: rgba(255,77,0,0.3); }
</style>
</head>
<body>

<div class="rm-root">

  <div class="header">
    <div class="logo-box">🍔</div>
    <div class="title-area">
      <h1>Food Delivery App</h1>
      <p>v1.0.0 &nbsp;·&nbsp; PHP / MySQL / Bootstrap</p>
    </div>
  </div>

  <div class="badges">
    <span class="badge badge-orange">PHP</span>
    <span class="badge badge-yellow">MySQL</span>
    <span class="badge badge-gray">Bootstrap 5</span>
    <span class="badge badge-gray">HTML / CSS</span>
    <span class="badge badge-orange">XAMPP</span>
    <span class="badge badge-gray">MIT License</span>
  </div>

  <p class="section-label">✦ Features</p>
  <div class="features-grid">
    <div class="feature-card">
      <span class="feature-icon">🛒</span>
      <h3>Food Ordering</h3>
      <p>Browse menus and place orders with ease.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">🖥️</span>
      <h3>Admin Dashboard</h3>
      <p>Full control over items, orders, and users.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">📦</span>
      <h3>Order Management</h3>
      <p>Real-time order tracking and status updates.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">📱</span>
      <h3>Responsive UI</h3>
      <p>Seamless experience across all devices.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">🔐</span>
      <h3>User Auth</h3>
      <p>Secure login, registration, and sessions.</p>
    </div>
    <div class="feature-card">
      <span class="feature-icon">🗄️</span>
      <h3>MySQL Backend</h3>
      <p>Robust relational data storage and queries.</p>
    </div>
  </div>

  <p class="section-label">✦ Tech Stack</p>
  <div class="stack-row">
    <div class="stack-pill"><span class="stack-dot" style="background:#ff7a33;"></span>PHP 8+</div>
    <div class="stack-pill"><span class="stack-dot" style="background:#4db8ff;"></span>MySQL</div>
    <div class="stack-pill"><span class="stack-dot" style="background:#a78bfa;"></span>Bootstrap 5</div>
    <div class="stack-pill"><span class="stack-dot" style="background:#f0ede6;"></span>HTML5 / CSS3</div>
    <div class="stack-pill"><span class="stack-dot" style="background:#4ade80;"></span>XAMPP</div>
  </div>

  <p class="section-label">✦ Quick Start</p>
  <div class="steps">
    <div class="step">
      <div class="step-num">01</div>
      <div class="step-text">
        <h4>Clone or Download</h4>
        <p>Download the project as a ZIP or clone via Git.</p>
      </div>
    </div>
    <div class="step">
      <div class="step-num">02</div>
      <div class="step-text">
        <h4>Move to htdocs</h4>
        <p>Place the project folder inside <code>C:/xampp/htdocs/</code>.</p>
      </div>
    </div>
    <div class="step">
      <div class="step-num">03</div>
      <div class="step-text">
        <h4>Import Database</h4>
        <p>Open phpMyAdmin and import the provided <code>.sql</code> file.</p>
      </div>
    </div>
    <div class="step">
      <div class="step-num">04</div>
      <div class="step-text">
        <h4>Launch on Localhost</h4>
        <p>Start Apache &amp; MySQL in XAMPP, then visit <code>localhost/your-folder</code>.</p>
      </div>
    </div>
  </div>

  <div class="footer">
    <p class="footer-author">crafted with ♥ by <span>Manoj Codings</span></p>
    <div class="footer-links">
      <a href="#" class="footer-link">⭐ Star on GitHub</a>
      <a href="#" class="footer-link">📄 Docs</a>
      <a href="#" class="footer-link">🐛 Report Bug</a>
    </div>
  </div>

</div>

</body>
</html>