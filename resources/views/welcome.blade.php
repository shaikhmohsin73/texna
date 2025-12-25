<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texna – Leading Jacquard Harness Solutions</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0b5ed7; /* Texna Blue */
            --secondary: #d63384; /* Texna Pink/Accent */
            --dark: #212529;
            --light: #f8f9fa;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        html { scroll-behavior: smooth; }
        body { color: #333; line-height: 1.6; background-color: #fff; }

        /* ---------- NAVIGATION ---------- */
        header {
            background: #fff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 15px 5%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .nav-container { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 28px; font-weight: 700; color: var(--primary); letter-spacing: 1px; }
        .nav-links { display: flex; list-style: none; gap: 30px; }
        .nav-links a { text-decoration: none; color: var(--dark); font-weight: 500; transition: 0.3s; font-size: 15px; }
        .nav-links a:hover { color: var(--primary); }
        .menu-toggle { display: none; font-size: 24px; cursor: pointer; }

        /* ---------- HERO SECTION ---------- */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }
        .hero-content h1 { font-size: clamp(2.2rem, 5vw, 4rem); line-height: 1.2; margin-bottom: 20px; }
        .hero-content p { font-size: 1.1rem; margin-bottom: 30px; max-width: 800px; margin-inline: auto; opacity: 0.9; }
        .btn-group { display: flex; gap: 15px; justify-content: center; }
        .btn { padding: 12px 30px; border-radius: 5px; text-decoration: none; font-weight: 600; transition: 0.3s; }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-outline { border: 2px solid #fff; color: #fff; }
        .btn:hover { transform: translateY(-3px); filter: brightness(1.1); }

        /* ---------- SECTION COMMON ---------- */
        section { padding: 80px 8%; }
        .section-title { text-align: center; margin-bottom: 50px; }
        .section-title h2 { font-size: 2.5rem; color: var(--dark); margin-bottom: 10px; }
        .section-title span { width: 60px; height: 4px; background: var(--primary); display: block; margin: 0 auto; }

        /* ---------- ABOUT SECTION ---------- */
        .about-flex { display: flex; align-items: center; gap: 50px; flex-wrap: wrap; }
        .about-text { flex: 1; min-width: 300px; }
        .about-image { flex: 1; min-width: 300px; border-radius: 10px; overflow: hidden; box-shadow: 20px 20px 0px var(--light); }
        .about-image img { width: 100%; display: block; }

        /* ---------- SERVICES GRID ---------- */
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; }
        .card { padding: 40px; border: 1px solid #eee; border-radius: 10px; transition: 0.3s; position: relative; overflow: hidden; }
        .card:hover { border-color: var(--primary); box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .card h3 { color: var(--primary); margin-bottom: 15px; }
        .card p { font-size: 0.95rem; color: #666; }

        /* ---------- STATS SECTION ---------- */
        .stats { background: var(--primary); color: white; display: flex; justify-content: space-around; flex-wrap: wrap; text-align: center; padding: 60px 8%; }
        .stat-item h3 { font-size: 2.5rem; }
        .stat-item p { font-size: 1rem; text-transform: uppercase; }

        /* ---------- CONTACT SECTION ---------- */
        .contact-container { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
        .contact-info h3 { margin-bottom: 20px; }
        .contact-form input, .contact-form textarea { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px; }
        .contact-form button { background: var(--primary); color: white; border: none; padding: 12px 30px; border-radius: 5px; cursor: pointer; font-weight: 600; }

        /* ---------- FOOTER ---------- */
        footer { background: #111; color: #fff; padding: 60px 8% 20px; }
        .footer-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; margin-bottom: 40px; }
        .footer-col h4 { margin-bottom: 20px; color: var(--primary); }
        .footer-col p, .footer-col li { color: #999; font-size: 14px; margin-bottom: 10px; list-style: none; }
        .footer-bottom { text-align: center; border-top: 1px solid #333; padding-top: 20px; font-size: 14px; color: #666; }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 768px) {
            .menu-toggle { display: block; }
            .nav-links { position: absolute; top: 70px; left: -100%; flex-direction: column; background: #fff; width: 100%; padding: 20px; transition: 0.4s; }
            .nav-links.active { left: 0; }
            .contact-container { grid-template-columns: 1fr; }
            section { padding: 60px 5%; }
        }
    </style>
</head>
<body>

<header>
    <div class="nav-container">
        <div class="logo">TEXNA</div>
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div>
</header>

<section class="hero" id="home">
    <div class="hero-content">
        <h1>Global Standard in Jacquard Harness Assembly</h1>
        <p>Expert solutions for High Speed Electronic Jacquards. We specialize in precision harness building for Rapier, Waterjet, and Airjet looms.</p>
        <div class="btn-group">
            <a href="#contact" class="btn btn-primary">Enquire Now</a>
            <a href="#services" class="btn btn-outline">Our Services</a>
        </div>
    </div>
</section>

<section id="about">
    <div class="about-flex">
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1558346490-a72e53ae2d4f?auto=format&fit=crop&q=80" alt="About Texna">
        </div>
        <div class="about-text">
            <div class="section-title" style="text-align: left;">
                <h2>About Texna</h2>
                <span style="margin: 0;"></span>
            </div>
            <p>Texna is a leading provider of high-quality Jacquard harness solutions. With years of expertise in the textile industry, we deliver precision-engineered products that ensure smooth production and longevity of weaving machines.</p>
            <br>
            <p>Our team of technical experts provides end-to-end support, from initial setup to annual maintenance, ensuring your jacquard runs at peak efficiency.</p>
        </div>
    </div>
</section>

<div class="stats">
    <div class="stat-item"><h3>500+</h3><p>Harnesses Built</p></div>
    <div class="stat-item"><h3>15+</h3><p>Years Experience</p></div>
    <div class="stat-item"><h3>200+</h3><p>Happy Clients</p></div>
    <div class="stat-item"><h3>24/7</h3><p>Support</p></div>
</div>

<section id="services">
    <div class="section-title">
        <h2>Our Core Expertise</h2>
        <span></span>
    </div>
    <div class="grid">
        <div class="card">
            <h3>Harness Assembly</h3>
            <p>Professional harness building with high-quality Italian cords and precision-drilled guide boards for all jacquard models.</p>
        </div>
        <div class="card">
            <h3>AMC Services</h3>
            <p>Comprehensive Annual Maintenance Contracts to prevent breakdowns and extend the life of your expensive textile machinery.</p>
        </div>
        <div class="card">
            <h3>Jacquard Repair</h3>
            <p>Expert mechanical and electronic repair services for Stäubli, Bonas, and other Chinese high-speed jacquards.</p>
        </div>
    </div>
</section>

<section id="products" style="background: var(--light);">
    <div class="section-title">
        <h2>Why Choose Texna?</h2>
        <span></span>
    </div>
    <div class="grid">
        <div class="card" style="background: #fff;">
            <h3>Quality Materials</h3>
            <p>We use only the best vulcanized cords, comber boards, and pulleys to ensure friction-free movement.</p>
        </div>
        <div class="card" style="background: #fff;">
            <h3>Expert Technicians</h3>
            <p>Our engineers have deep knowledge of jacquard shedding patterns and tension requirements.</p>
        </div>
        <div class="card" style="background: #fff;">
            <h3>Timely Delivery</h3>
            <p>We understand that loom downtime costs money. We guarantee the fastest turnaround time for harness building.</p>
        </div>
    </div>
</section>

<section id="contact">
    <div class="section-title">
        <h2>Get In Touch</h2>
        <span></span>
    </div>
    <div class="contact-container">
        <div class="contact-info">
            <h3>Registered Office</h3>
            <p><strong>Address:</strong> Plot No. 123, Textile Park, Surat, Gujarat, India</p>
            <p><strong>Phone:</strong> +91 98XXX XXXXX</p>
            <p><strong>Email:</strong> info@texna.in</p>
            <br>
            <h3>Working Hours</h3>
            <p>Monday - Saturday: 10:00 AM - 7:00 PM</p>
            <p>Sunday: Closed</p>
        </div>
        <div class="contact-form">
            <form>
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>
                <input type="text" placeholder="Subject">
                <textarea rows="5" placeholder="Your Message"></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
</section>

<footer>
    <div class="footer-grid">
        <div class="footer-col">
            <div class="logo" style="color:#fff; margin-bottom: 20px;">TEXNA</div>
            <p>Your trusted partner for high-speed Jacquard harness solutions and textile maintenance services worldwide.</p>
        </div>
        <div class="footer-col">
            <h4>Quick Links</h4>
            <li><a href="#home" style="color:#999; text-decoration:none;">Home</a></li>
            <li><a href="#about" style="color:#999; text-decoration:none;">About Us</a></li>
            <li><a href="#services" style="color:#999; text-decoration:none;">Services</a></li>
            <li><a href="#contact" style="color:#999; text-decoration:none;">Contact</a></li>
        </div>
        <div class="footer-col">
            <h4>Our Services</h4>
            <li>Jacquard Harness</li>
            <li>Guide Board Drilling</li>
            <li>Electronic Repair</li>
            <li>AMC Contract</li>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 Texna Jacquard Solutions. All Rights Reserved.</p>
    </div>
</footer>

<script>
    function toggleMenu() {
        document.getElementById('navLinks').classList.toggle('active');
    }

    // Close mobile menu on click
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('navLinks').classList.remove('active');
        });
    });
</script>

</body>
</html>