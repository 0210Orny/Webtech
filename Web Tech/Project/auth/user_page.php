
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost&Found</title>
</head>
<body>
    
</body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Lost & Found Portal</title>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- CSS Variables & Reset --- */
        :root {
            --primary: #4F46E5;
            --primary-dark: #3730A3;
            --primary-light: #EEF2FF;
            --secondary: #64748B;
            --text-main: #0F172A;
            --text-light: #F8FAFC;
            --bg-body: #F8FAFC;
            --bg-card: #ffffff;
            --border-color: #E2E8F0;
            --success: #10B981;
            --danger: #EF4444;
            
            --font-sans: 'Inter', sans-serif;
            --container-width: 1200px;
            --header-height: 70px;
            --radius: 12px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color 0.2s;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        /* --- Utility Classes --- */
        .container {
            width: 100%;
            max-width: var(--container-width);
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .justify-center { justify-content: center; }
        .gap-2 { gap: 0.5rem; }
        .gap-4 { gap: 1rem; }
        
        .hidden-mobile { display: none; }
        @media (min-width: 768px) {
            .hidden-mobile { display: flex; }
            .hidden-desktop { display: none; }
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .btn-primary {
            background-color: #fff;
            color: var(--primary);
        }
        .btn-primary:hover {
            background-color: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(4px);
        }
        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .btn-secondary {
            background-color: #fff;
            border: 1px solid var(--border-color);
            color: var(--secondary);
        }
        .btn-secondary:hover {
            background-color: var(--bg-body);
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-dark {
            background-color: var(--text-main);
            color: white;
        }
        .btn-dark:hover {
            opacity: 0.9;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* --- Header/Nav --- */
        .navbar {
            background-color: white;
            border-bottom: 1px solid var(--border-color);
            height: var(--header-height);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
        }

        .logo-box {
            background-color: var(--primary);
            color: white;
            padding: 0.35rem;
            border-radius: 0.5rem;
            display: flex;
        }

        .logo-text {
            font-weight: 700;
            font-size: 1.25rem;
            margin-left: 0.5rem;
        }
        .logo-text span { color: var(--primary); }

        .nav-links a {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--secondary);
            margin: 0 1rem;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--primary);
        }

        /* --- Hero Section --- */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 5rem 0 8rem;
            position: relative;
            overflow: hidden;
            text-align: center;
            color: white;
        }

        /* Hero Background Blobs */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.2;
            pointer-events: none;
        }
        .blob-1 {
            top: 5rem;
            left: 2rem;
            width: 300px;
            height: 300px;
            background-color: white;
        }
        .blob-2 {
            bottom: 2rem;
            right: 2rem;
            width: 400px;
            height: 400px;
            background-color: #818cf8;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            max-width: 700px;
            margin: 0 auto;
        }

        .hero-badge {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            margin-bottom: 1.5rem;
            animation: bounce-gentle 3s infinite;
        }

        .hero h1 {
            font-size: 2.5rem;
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 1.5rem;
            animation: slide-up 0.8s ease-out forwards;
        }
        
        @media (min-width: 768px) {
            .hero h1 { font-size: 3.5rem; }
        }

        .hero h1 span {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 400;
        }

        .hero p {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2.5rem;
            animation: slide-up 0.8s ease-out forwards;
            animation-delay: 0.1s;
            opacity: 0; /* starts hidden for animation */
        }

        .hero-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            justify-content: center;
            animation: slide-up 0.8s ease-out forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }
        @media (min-width: 640px) {
            .hero-buttons { flex-direction: row; }
        }

        /* --- Stats Section --- */
        .stats-section {
            background-color: white;
            border-bottom: 1px solid var(--border-color);
            padding: 3rem 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        @media (min-width: 768px) {
            .stats-grid { grid-template-columns: repeat(3, 1fr); }
        }

        .stat-item {
            text-align: center;
            transition: transform 0.3s ease;
        }
        .stat-item:hover { transform: scale(1.05); }

        .stat-icon {
            width: 3.5rem;
            height: 3.5rem;
            background-color: var(--primary-light);
            color: var(--primary);
            border-radius: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .stat-value {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--text-main);
        }
        .stat-label { color: var(--secondary); }

        /* --- Section Styling --- */
        .section {
            padding: 5rem 0;
        }
        .bg-muted { background-color: #F1F5F9; }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 2rem;
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .section-title p { color: var(--secondary); }

        /* --- Cards Grid --- */
        .cards-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        @media (min-width: 640px) {
            .cards-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (min-width: 1024px) {
            .cards-grid { grid-template-columns: repeat(3, 1fr); }
        }

        .card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .card-image {
            height: 200px;
            position: relative;
            background-color: #e2e8f0;
            overflow: hidden;
        }
        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .card:hover .card-image img { transform: scale(1.05); }

        .card-tag {
            position: absolute;
            top: 0.75rem;
            left: 0.75rem;
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .tag-lost { background-color: var(--danger); }
        .tag-found { background-color: var(--success); }

        .card-body { padding: 1.25rem; }
        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        .card-desc {
            font-size: 0.875rem;
            color: var(--secondary);
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .meta-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }
        .meta-row svg { width: 1rem; height: 1rem; color: #94a3b8; }

        .card-btn {
            width: 100%;
            margin-top: 0.5rem;
            padding: 0.5rem;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            color: var(--text-main);
            cursor: pointer;
            transition: background 0.2s;
        }
        .card-btn:hover { background-color: var(--bg-body); }

        /* --- How It Works --- */
        .step-card {
            background: white;
            padding: 2rem;
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            height: 100%;
            position: relative;
            transition: box-shadow 0.3s;
        }
        .step-card:hover { box-shadow: var(--shadow-lg); }
        
        .step-number {
            font-size: 3rem;
            font-weight: 700;
            color: rgba(79, 70, 229, 0.1); /* Primary color very transparent */
            margin-bottom: 1rem;
        }

        .step-arrow {
            position: absolute;
            top: 50%;
            right: -1.5rem;
            transform: translateY(-50%);
            color: #cbd5e1;
            display: none;
            z-index: 5;
        }
        @media (min-width: 768px) {
            .step-arrow-visible { display: block; }
        }

        /* --- CTA --- */
        .cta-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            text-align: center;
        }

        /* --- Footer --- */
        .footer {
            background-color: var(--text-main);
            color: #cbd5e1;
            padding: 3rem 0;
            margin-top: auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        @media (min-width: 768px) {
            .footer-grid { grid-template-columns: repeat(4, 1fr); }
        }

        .footer h4 { color: white; margin-bottom: 1rem; font-size: 1rem; }
        .footer ul li { margin-bottom: 0.5rem; font-size: 0.9rem; }
        .footer a:hover { color: white; }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
            font-size: 0.875rem;
        }

        /* --- Animations --- */
        @keyframes bounce-gentle {
            0%, 100% { transform: translateY(-5%); }
            50% { transform: translateY(5%); }
        }

        @keyframes slide-up {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="logo-box">
                    <i data-lucide="map-pin" width="20" height="20"></i>
                </div>
                <div class="logo-text">Lost<span>&Found</span></div>
            </div>

            <div class="nav-links hidden-mobile">
                <a href="#" class="active">Home</a>
                <a href="#lost">Lost Items</a>
                <a href="#found">Found Items</a>
                <a href="#how-it-works">How it Works</a>
            </div>

            <div class="flex items-center gap-4">
                <button class="btn hidden-mobile" style="color: var(--secondary)">Sign In</button>
                <button class="btn btn-dark">Post Item</button>
            </div>
 
</div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <!-- Background Blobs -->
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>

            <div class="container hero-content">
                <div class="badge hero-badge">
                    <i data-lucide="map-pin" width="16" height="16"></i>
                    <span>Lost & Found Portal</span>
                </div>

                <h1>
                    Lost Something?
                    <br />
                    <span>We'll Help You Find It</span>
                </h1>

                <p>
                    Our lost and found portal connects people with their missing belongings. 
                    Report lost items or help others by submitting found items.
                </p>

                <div class="hero-buttons">
                    <a href="#report-lost" class="btn btn-primary btn-lg">
                        <i data-lucide="file-question" width="20" height="20"></i>
                        Report Lost Item
                    </a>
                    <a href="#report-found" class="btn btn-outline btn-lg">
                        <i data-lucide="check-circle" width="20" height="20"></i>
                        Report Found Item
                    </a>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i data-lucide="file-question" width="28" height="28"></i>
                        </div>
                        <div class="stat-value">1,247</div>
                        <div class="stat-label">Items Reported</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i data-lucide="users" width="28" height="28"></i>
                        </div>
                        <div class="stat-value">892</div>
                        <div class="stat-label">Happy Reunions</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i data-lucide="clock" width="28" height="28"></i>
                        </div>
                        <div class="stat-value">3 Days</div>
                        <div class="stat-label">Avg. Return Time</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Recent Lost Items -->
        <section id="lost" class="section">
            <div class="container">
                <div class="section-header">
                    <div class="section-title">
                        <h2>Recently Lost Items</h2>
                        <p>Help someone find their lost belongings</p>
                    </div>
                    <a href="#" class="btn btn-secondary hidden-mobile">
                        View All <i data-lucide="arrow-right" width="16"></i>
                    </a>
                </div>

                <div class="cards-grid">
                    <!-- Lost Card 1 -->
                    <div class="card">
                        <div class="card-image">
                            <img src="https://images.offerup.com/Up-HB689bob7rI5rNkreCJy47lg=/1440x1920/860d/860dc02a87a940458236fa85b7270f76.jpg" alt="iPhone">
                            <span class="card-tag tag-lost">Lost</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">iPhone 13 Pro Black</h3>
                            <p class="card-desc">Left it on the bench near the fountain. Has a clear case with stickers.</p>
                            <div class="meta-row">
                                <i data-lucide="map-pin"></i> Science Quad
                            </div>
                            <div class="meta-row">
                                <i data-lucide="calendar"></i> Today, 10:30 AM
                            </div>
                            <button class="card-btn">View Details</button>
                        </div>
                    </div>

                    <!-- Lost Card 2 -->
                    <div class="card">
                        <div class="card-image">
                            <img src="https://live.staticflickr.com/6005/5923517037_cce7f5ac5e_b.jpg" alt="Keys">
                            <span class="card-tag tag-lost">Lost</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Toyota Car Keys</h3>
                            <p class="card-desc">Key fob with a blue lanyard and a small bear keychain.</p>
                            <div class="meta-row">
                                <i data-lucide="map-pin"></i> Library, 2nd Floor
                            </div>
                            <div class="meta-row">
                                <i data-lucide="calendar"></i> Yesterday, 2:00 PM
                            </div>
                            <button class="card-btn">View Details</button>
                        </div>
                    </div>

                    <!-- Lost Card 3 -->
                    <div class="card">
                        <div class="card-image">
                            <img src="https://m.media-amazon.com/images/I/51Pw13NYyML._AC_UY1100_.jpg" alt="Backpack">
                            <span class="card-tag tag-lost">Lost</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Nike Navy Backpack</h3>
                            <p class="card-desc">Contains textbooks for Bio 101 and a grey laptop.</p>
                            <div class="meta-row">
                                <i data-lucide="map-pin"></i> Cafeteria
                            </div>
                            <div class="meta-row">
                                <i data-lucide="calendar"></i> Yesterday, 12:15 PM
                            </div>
                            <button class="card-btn">View Details</button>
                        </div>
                    </div>
                </div>

                <div class="hidden-desktop" style="margin-top: 1.5rem;">
                    <button class="btn btn-secondary" style="width: 100%">View All Lost Items</button>
                </div>
            </div>
        </section>

        <!-- Recent Found Items -->
        <section id="found" class="section bg-muted">
            <div class="container">
                <div class="section-header">
                    <div class="section-title">
                        <h2>Recently Found Items</h2>
                        <p>Check if your item has been found</p>
                    </div>
                    <a href="#" class="btn btn-secondary hidden-mobile">
                        View All <i data-lucide="arrow-right" width="16"></i>
                    </a>
                </div>

                <div class="cards-grid">
                    <!-- Found Card 1 -->
                    <div class="card">
                        <div class="card-image">
                            <img src="https://officetools.com.bd/storage/053c80eb-89ad-4d79-bc5f-24a3ce91e80e/original.jpg" alt="Notebook">
                            <span class="card-tag tag-found">Found</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Leather Notebook</h3>
                            <p class="card-desc">Brown leather journal, no name inside. Found under table 4.</p>
                            <div class="meta-row">
                                <i data-lucide="map-pin"></i> Study Hall A
                            </div>
                            <div class="meta-row">
                                <i data-lucide="calendar"></i> Today, 8:45 AM
                            </div>
                            <button class="card-btn">View Details</button>
                        </div>
                    </div>

                    <!-- Found Card 2 -->
                    <div class="card">
                        <div class="card-image">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlLW362i8RqZV0Fyr37fYVXV2EAiuRQRv97w&s" alt="Bottle">
                            <span class="card-tag tag-found">Found</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Hydroflask Blue</h3>
                            <p class="card-desc">32oz water bottle with some hiking stickers on the bottom.</p>
                            <div class="meta-row">
                                <i data-lucide="map-pin"></i> Gym Locker Room
                            </div>
                            <div class="meta-row">
                                <i data-lucide="calendar"></i> Yesterday, 6:30 PM
                            </div>
                            <button class="card-btn">View Details</button>
                        </div>
                    </div>

                    <!-- Found Card 3 -->
                    <div class="card">
                        <div class="card-image">
                            <img src="https://thumbs.dreamstime.com/b/hand-holding-one-black-closed-umbrella-against-green-wall-hand-holding-one-black-closed-umbrella-against-green-wall-autumn-423573800.jpg" alt="Umbrella">
                            <span class="card-tag tag-found">Found</span>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Black Umbrella</h3>
                            <p class="card-desc">Small compact umbrella, left near the entrance during the rain.</p>
                            <div class="meta-row">
                                <i data-lucide="map-pin"></i> Student Center
                            </div>
                            <div class="meta-row">
                                <i data-lucide="calendar"></i> Oct 24, 9:00 AM
                            </div>
                            <button class="card-btn">View Details</button>
                        </div>
                    </div>
                </div>

                <div class="hidden-desktop" style="margin-top: 1.5rem;">
                    <button class="btn btn-secondary" style="width: 100%">View All Found Items</button>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" class="section">
            <div class="container">
                <div style="text-align: center; margin-bottom: 3rem;">
                    <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem;">How It Works</h2>
                    <p style="color: var(--secondary);">Our simple process helps reunite people with their belongings quickly and efficiently.</p>
                </div>

                <div class="stats-grid"> <!-- Reusing stats grid for 3 column layout -->
                    <div class="step-card">
                        <div class="step-number">01</div>
                        <h3 style="margin-bottom: 0.75rem; font-size: 1.25rem; font-weight: 600;">Report</h3>
                        <p style="color: var(--secondary);">Submit a detailed report of your lost or found item with photos and description.</p>
                        <i data-lucide="arrow-right" class="step-arrow step-arrow-visible" width="32"></i>
                    </div>

                    <div class="step-card">
                        <div class="step-number">02</div>
                        <h3 style="margin-bottom: 0.75rem; font-size: 1.25rem; font-weight: 600;">Search</h3>
                        <p style="color: var(--secondary);">Browse through reported items or use our search to find matching items quickly.</p>
                        <i data-lucide="arrow-right" class="step-arrow step-arrow-visible" width="32"></i>
                    </div>

                    <div class="step-card">
                        <div class="step-number">03</div>
                        <h3 style="margin-bottom: 0.75rem; font-size: 1.25rem; font-weight: 600;">Connect</h3>
                        <p style="color: var(--secondary);">Contact the reporter directly through our secure platform and arrange to retrieve your belongings.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="section cta-section">
            <div class="container">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem;">Ready to Find What You're Looking For?</h2>
                <p style="opacity: 0.9; margin-bottom: 2rem;">Start by browsing our database or submit a report to help others find their belongings.</p>
                <button class="btn btn-primary" style="padding: 1rem 2rem;">
                    <i data-lucide="search" width="20"></i>
                    Browse All Items
                </button>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <div class="flex items-center gap-2" style="margin-bottom: 1rem; color: white;">
                        <div class="logo-box">
                            <i data-lucide="map-pin" width="16" height="16"></i>
                        </div>
                        <span style="font-weight: 700; font-size: 1.1rem;">CampusFind</span>
                    </div>
                    <p style="font-size: 0.875rem;">The official lost and found portal for students and faculty.</p>
                </div>
                
                <div>
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Lost Items</a></li>
                        <li><a href="#">Found Items</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Security</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>

                <div>
                    <h4>Contact</h4>
                    <ul>
                        <li class="flex items-center gap-2">
                            <i data-lucide="phone" width="16"></i> (555) 123-4567
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="mail" width="16"></i> security@university.edu
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                &copy; 2024 University Lost & Found. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Initialize Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>