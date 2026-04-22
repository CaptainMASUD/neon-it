@extends('layouts.app')

@section('content')
<style>
    :root{
        --bg:#f5f7fb;
        --card:#ffffff;
        --text:#0f172a;
        --muted:#64748b;
        --line:#e2e8f0;
        --primary:#2563eb;
        --secondary:#7c3aed;
        --accent:#06b6d4;
        --dark:#020617;
        --gradient:linear-gradient(135deg,#2563eb 0%,#7c3aed 55%,#06b6d4 100%);
        --gradient-soft:linear-gradient(135deg,rgba(37,99,235,0.10),rgba(124,58,237,0.12),rgba(6,182,212,0.10));
        --shadow-lg:0 25px 60px rgba(15,23,42,0.12);
        --shadow-md:0 16px 35px rgba(15,23,42,0.08);
        --shadow-sm:0 10px 24px rgba(15,23,42,0.05);
        --radius-xl:30px;
        --radius-lg:22px;
        --radius-md:18px;
    }

    body{
        background:var(--bg);
        color:var(--text);
    }

    *{
        box-sizing:border-box;
    }

    html{
        scroll-behavior:smooth;
    }

    a{
        text-decoration:none;
    }

    .agency-page{
        overflow:hidden;
    }

    .btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        padding:14px 24px;
        border-radius:14px;
        font-weight:700;
        transition:all .3s ease;
        border:1px solid transparent;
        cursor:pointer;
    }

    .btn-primary{
        background:var(--gradient);
        color:#fff;
        box-shadow:0 12px 30px rgba(37,99,235,0.22);
    }

    .btn-primary:hover{
        transform:translateY(-3px);
        box-shadow:0 18px 35px rgba(37,99,235,0.26);
    }

    .btn-secondary{
        background:#fff;
        color:var(--text);
        border-color:var(--line);
        box-shadow:var(--shadow-sm);
    }

    .btn-secondary:hover{
        transform:translateY(-3px);
    }

    .btn-dark{
        background:#0f172a;
        color:#fff;
        box-shadow:0 12px 25px rgba(15,23,42,0.16);
    }

    .btn-dark:hover{
        transform:translateY(-3px);
    }

    .section-head{
        text-align:center;
        margin-bottom:52px;
    }

    .section-head span{
        display:inline-block;
        font-size:13px;
        font-weight:700;
        color:var(--primary);
        background:rgba(37,99,235,0.08);
        padding:8px 14px;
        border-radius:999px;
        margin-bottom:14px;
    }

    .section-head h2{
        font-size:42px;
        line-height:1.15;
        margin:0 0 12px;
        color:var(--text);
    }

    .section-head p{
        max-width:700px;
        margin:auto;
        color:#475569;
        font-size:16px;
    }

    .hero{
        padding:88px 0 74px;
        position:relative;
        overflow:hidden;
    }

    .hero:before{
        content:"";
        position:absolute;
        width:480px;
        height:480px;
        border-radius:50%;
        background:rgba(37,99,235,0.10);
        top:-140px;
        right:-100px;
        filter:blur(20px);
    }

    .hero:after{
        content:"";
        position:absolute;
        width:360px;
        height:360px;
        border-radius:50%;
        background:rgba(124,58,237,0.10);
        left:-120px;
        bottom:-120px;
        filter:blur(20px);
    }

    .hero-wrap{
        display:grid;
        grid-template-columns:1.02fr 1fr;
        gap:48px;
        align-items:center;
        position:relative;
        z-index:2;
    }

    .mini-badge{
        display:inline-flex;
        align-items:center;
        gap:10px;
        background:#fff;
        border:1px solid #e6edf7;
        box-shadow:0 10px 25px rgba(15,23,42,0.05);
        color:var(--primary);
        padding:10px 16px;
        border-radius:999px;
        font-size:13px;
        font-weight:700;
        margin-bottom:22px;
    }

    .dot{
        width:10px;
        height:10px;
        border-radius:50%;
        background:var(--accent);
        box-shadow:0 0 0 5px rgba(6,182,212,0.12);
    }

    .hero-text h1{
        font-size:68px;
        line-height:1.02;
        letter-spacing:-2px;
        margin:0 0 18px;
        color:var(--text);
    }

    .gradient-text{
        background:var(--gradient);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
        background-clip:text;
    }

    .hero-text p{
        font-size:18px;
        color:#475569;
        max-width:610px;
        margin-bottom:30px;
    }

    .hero-actions{
        display:flex;
        gap:14px;
        flex-wrap:wrap;
        margin-bottom:28px;
    }

    .hero-points{
        display:grid;
        grid-template-columns:repeat(2,minmax(0,1fr));
        gap:12px;
        max-width:580px;
    }

    .hero-point{
        display:flex;
        align-items:center;
        gap:10px;
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:16px;
        padding:14px 16px;
        box-shadow:var(--shadow-sm);
        color:#334155;
        font-size:14px;
        font-weight:600;
    }

    .hero-point i{
        width:28px;
        height:28px;
        border-radius:50%;
        background:var(--gradient-soft);
        display:flex;
        align-items:center;
        justify-content:center;
        color:var(--primary);
        font-style:normal;
        font-size:14px;
        font-weight:800;
    }

    .hero-visual{
        position:relative;
        min-height:700px;
    }

    .blur-shape,
    .blur-shape-2,
    .blur-shape-3{
        position:absolute;
        border-radius:50%;
        filter:blur(10px);
        z-index:0;
    }

    .blur-shape{
        width:190px;
        height:190px;
        background:rgba(37,99,235,0.16);
        top:10px;
        left:10px;
    }

    .blur-shape-2{
        width:250px;
        height:250px;
        background:rgba(124,58,237,0.15);
        top:70px;
        right:-20px;
    }

    .blur-shape-3{
        width:220px;
        height:220px;
        background:rgba(6,182,212,0.12);
        left:90px;
        bottom:30px;
    }

    .floating-card{
        position:absolute;
        background:#fff;
        border:1px solid #e8eef8;
        border-radius:20px;
        box-shadow:0 20px 45px rgba(15,23,42,0.08);
        z-index:3;
    }

    .floating-card.one{
        left:0;
        top:88px;
        width:240px;
        padding:18px;
    }

    .floating-card.two{
        left:30px;
        bottom:70px;
        width:255px;
        padding:18px;
    }

    .floating-card.three{
        right:10px;
        bottom:-2px;
        width:220px;
        padding:18px;
    }

    .floating-card h5{
        font-size:15px;
        margin:0 0 10px;
        color:var(--text);
    }

    .floating-card p{
        font-size:13px;
        color:var(--muted);
        line-height:1.55;
        margin:0;
    }

    .floating-metric{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:12px;
        margin-top:12px;
    }

    .floating-metric strong{
        font-size:26px;
        color:var(--text);
    }

    .floating-metric span{
        font-size:12px;
        color:var(--muted);
    }

    .avatar-row{
        display:flex;
        align-items:center;
        margin-top:12px;
    }

    .avatar{
        width:38px;
        height:38px;
        border-radius:50%;
        border:2px solid #fff;
        margin-right:-8px;
        object-fit:cover;
        box-shadow:0 4px 12px rgba(15,23,42,0.12);
    }

    .main-ui-card{
        position:absolute;
        right:0;
        top:35px;
        width:80%;
        background:rgba(255,255,255,0.84);
        backdrop-filter:blur(14px);
        border:1px solid rgba(255,255,255,0.85);
        border-radius:30px;
        padding:22px;
        box-shadow:var(--shadow-lg);
        z-index:2;
    }

    .browser-top{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:18px;
        gap:16px;
        flex-wrap:wrap;
    }

    .browser-dots{
        display:flex;
        gap:8px;
    }

    .browser-dots span{
        width:10px;
        height:10px;
        border-radius:50%;
        background:#cbd5e1;
    }

    .browser-tag{
        font-size:12px;
        font-weight:700;
        color:#fff;
        background:var(--gradient);
        padding:8px 14px;
        border-radius:999px;
    }

    .dashboard-hero{
        position:relative;
        border-radius:26px;
        min-height:240px;
        overflow:hidden;
        margin-bottom:16px;
        box-shadow:var(--shadow-sm);
    }

    .dashboard-hero img{
        width:100%;
        height:240px;
        object-fit:cover;
        display:block;
    }

    .dashboard-hero:after{
        content:"";
        position:absolute;
        inset:0;
        background:linear-gradient(to top, rgba(15,23,42,0.84), rgba(15,23,42,0.16));
    }

    .dashboard-content{
        position:absolute;
        left:24px;
        bottom:22px;
        z-index:2;
        color:#fff;
    }

    .dashboard-content small{
        display:inline-block;
        font-size:13px;
        margin-bottom:8px;
        padding:7px 12px;
        border-radius:999px;
        background:rgba(255,255,255,0.16);
        backdrop-filter:blur(8px);
    }

    .dashboard-content h3{
        font-size:30px;
        margin:0 0 8px;
    }

    .dashboard-content p{
        font-size:14px;
        max-width:320px;
        opacity:0.95;
        margin:0;
    }

    .ui-grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:14px;
    }

    .mini-card{
        background:#f8fbff;
        border:1px solid #e8eef8;
        border-radius:20px;
        padding:18px;
        transition:.3s ease;
    }

    .mini-card:hover{
        transform:translateY(-4px);
    }

    .mini-card h4{
        font-size:14px;
        color:#334155;
        margin:0 0 10px;
    }

    .progress{
        width:100%;
        height:10px;
        border-radius:999px;
        background:#e8eef8;
        overflow:hidden;
        margin-bottom:10px;
    }

    .progress span{
        display:block;
        height:100%;
        border-radius:999px;
        background:var(--gradient);
    }

    .mini-card p{
        color:var(--muted);
        font-size:13px;
        margin:0;
    }

    .chart-bars{
        display:flex;
        align-items:flex-end;
        gap:8px;
        height:78px;
        margin-top:10px;
    }

    .chart-bars span{
        width:18px;
        border-radius:10px 10px 4px 4px;
        background:var(--gradient);
        animation:growBars 1.6s ease-in-out infinite alternate;
    }

    .chart-bars span:nth-child(1){ height:36px; animation-delay:.1s; }
    .chart-bars span:nth-child(2){ height:56px; animation-delay:.2s; }
    .chart-bars span:nth-child(3){ height:48px; animation-delay:.3s; }
    .chart-bars span:nth-child(4){ height:72px; animation-delay:.4s; }
    .chart-bars span:nth-child(5){ height:62px; animation-delay:.5s; }

    @keyframes growBars{
        from{ opacity:.88; transform:translateY(0); }
        to{ opacity:1; transform:translateY(-4px); }
    }

    .client-strip{
        padding:8px 0 74px;
    }

    .client-shell{
        background:#fff;
        border:1px solid #e8eef8;
        border-radius:24px;
        padding:22px 0;
        overflow:hidden;
        box-shadow:0 12px 30px rgba(15,23,42,0.04);
    }

    .client-track{
        display:flex;
        width:max-content;
        animation:marquee 22s linear infinite;
    }

    .client-item{
        margin:0 10px;
        padding:14px 24px;
        border-radius:14px;
        background:linear-gradient(135deg,#f8fbff,#f4f1ff);
        border:1px solid #e6ebf5;
        font-size:14px;
        font-weight:800;
        color:#334155;
        white-space:nowrap;
        letter-spacing:.4px;
    }

    @keyframes marquee{
        from{ transform:translateX(0); }
        to{ transform:translateX(-50%); }
    }

    .services{
        padding:10px 0 86px;
    }

    .service-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:22px;
    }

    .service-card{
        background:#fff;
        border:1px solid #e6edf6;
        border-radius:26px;
        padding:28px;
        box-shadow:var(--shadow-md);
        transition:0.35s ease;
        position:relative;
        overflow:hidden;
    }

    .service-card:before{
        content:"";
        position:absolute;
        inset:auto -30px -30px auto;
        width:120px;
        height:120px;
        border-radius:30px;
        background:var(--gradient-soft);
        transform:rotate(18deg);
    }

    .service-card:hover{
        transform:translateY(-10px);
    }

    .service-icon{
        width:58px;
        height:58px;
        border-radius:18px;
        display:flex;
        align-items:center;
        justify-content:center;
        margin-bottom:18px;
        color:#fff;
        font-weight:800;
        font-size:20px;
        background:var(--gradient);
        position:relative;
        z-index:2;
    }

    .service-card h3{
        font-size:22px;
        margin:0 0 10px;
        color:var(--text);
        position:relative;
        z-index:2;
    }

    .service-card p{
        color:#475569;
        font-size:15px;
        line-height:1.7;
        margin:0 0 18px;
        position:relative;
        z-index:2;
    }

    .service-list{
        display:grid;
        gap:10px;
        position:relative;
        z-index:2;
    }

    .service-list span{
        font-size:13px;
        color:#334155;
        font-weight:700;
        padding:10px 12px;
        background:#f8fafc;
        border:1px solid #e2e8f0;
        border-radius:12px;
    }

    .stats-section{
        padding:0 0 84px;
    }

    .stats-wrap{
        background:#0f172a;
        color:#fff;
        border-radius:34px;
        padding:34px;
        box-shadow:0 24px 60px rgba(15,23,42,0.18);
    }

    .stats-grid{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:22px;
    }

    .stat-card{
        background:rgba(255,255,255,0.05);
        border:1px solid rgba(255,255,255,0.08);
        border-radius:22px;
        padding:24px;
    }

    .stat-card h3{
        font-size:36px;
        margin:0 0 8px;
        color:#fff;
    }

    .stat-card p{
        margin:0;
        font-size:14px;
        color:rgba(255,255,255,0.75);
    }

    .about-section{
        padding:10px 0 84px;
    }

    .about-wrap{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:24px;
        align-items:center;
    }

    .about-visual{
        background:#fff;
        border-radius:28px;
        padding:18px;
        box-shadow:var(--shadow-lg);
        border:1px solid #e6edf6;
    }

    .about-photo{
        position:relative;
        border-radius:24px;
        overflow:hidden;
        min-height:500px;
    }

    .about-photo img{
        width:100%;
        height:500px;
        object-fit:cover;
        display:block;
    }

    .about-badge{
        position:absolute;
        right:18px;
        top:18px;
        background:rgba(255,255,255,0.9);
        backdrop-filter:blur(12px);
        border-radius:18px;
        padding:16px 18px;
        box-shadow:var(--shadow-sm);
    }

    .about-badge strong{
        display:block;
        font-size:22px;
        color:var(--text);
    }

    .about-badge span{
        font-size:13px;
        color:var(--muted);
    }

    .about-content .section-head{
        text-align:left;
        margin-bottom:22px;
    }

    .about-content .section-head p{
        margin:0;
    }

    .about-copy{
        color:#475569;
        font-size:16px;
        line-height:1.8;
        margin-bottom:20px;
    }

    .about-features{
        display:grid;
        gap:14px;
        margin-bottom:24px;
    }

    .about-item{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:18px;
        padding:16px 18px;
        box-shadow:var(--shadow-sm);
    }

    .about-item h4{
        margin:0 0 6px;
        font-size:16px;
        color:var(--text);
    }

    .about-item p{
        margin:0;
        color:var(--muted);
        font-size:14px;
        line-height:1.6;
    }

    .process{
        padding:6px 0 84px;
    }

    .process-grid{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:20px;
    }

    .process-card{
        background:#fff;
        border:1px solid #e6edf6;
        border-radius:24px;
        padding:26px 24px;
        box-shadow:var(--shadow-md);
        transition:0.3s ease;
    }

    .process-card:hover{
        transform:translateY(-8px);
    }

    .process-number{
        width:52px;
        height:52px;
        border-radius:16px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-weight:800;
        background:var(--gradient);
        margin-bottom:16px;
    }

    .process-card h3{
        font-size:20px;
        margin:0 0 10px;
    }

    .process-card p{
        margin:0;
        color:#475569;
        font-size:14px;
        line-height:1.7;
    }

    .portfolio-gallery{
        padding:10px 0 84px;
    }

    .gallery-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:22px;
    }

    .gallery-card{
        background:#fff;
        border:1px solid #e8eef7;
        border-radius:24px;
        overflow:hidden;
        box-shadow:var(--shadow-md);
        transition:0.35s ease;
    }

    .gallery-card:hover{
        transform:translateY(-8px);
    }

    .gallery-image{
        position:relative;
        height:250px;
        overflow:hidden;
    }

    .gallery-image img{
        width:100%;
        height:100%;
        object-fit:cover;
        display:block;
        transition:0.5s ease;
    }

    .gallery-card:hover .gallery-image img{
        transform:scale(1.06);
    }

    .gallery-badge{
        position:absolute;
        top:16px;
        left:16px;
        background:rgba(15,23,42,0.72);
        color:#fff;
        font-size:12px;
        font-weight:700;
        padding:8px 12px;
        border-radius:999px;
        backdrop-filter:blur(8px);
    }

    .gallery-content{
        padding:22px;
    }

    .gallery-content h3{
        font-size:22px;
        margin:0 0 8px;
        color:var(--text);
    }

    .gallery-content p{
        font-size:14px;
        color:#475569;
        line-height:1.65;
        margin:0 0 16px;
    }

    .gallery-meta{
        display:flex;
        gap:10px;
        flex-wrap:wrap;
    }

    .meta-pill{
        padding:8px 12px;
        border-radius:999px;
        background:#f8fafc;
        border:1px solid var(--line);
        color:#334155;
        font-size:12px;
        font-weight:700;
    }

    .testimonial-section{
        padding:8px 0 84px;
    }

    .testimonial-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:22px;
    }

    .testimonial-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:24px;
        padding:28px;
        box-shadow:var(--shadow-md);
        transition:.3s ease;
    }

    .testimonial-card:hover{
        transform:translateY(-8px);
    }

    .stars{
        color:#f59e0b;
        letter-spacing:2px;
        font-size:16px;
        margin-bottom:14px;
    }

    .testimonial-card p{
        font-size:15px;
        line-height:1.8;
        color:#475569;
        margin:0 0 18px;
    }

    .client-info{
        display:flex;
        align-items:center;
        gap:12px;
    }

    .client-info img{
        width:52px;
        height:52px;
        border-radius:50%;
        object-fit:cover;
    }

    .client-info h4{
        margin:0 0 4px;
        font-size:15px;
        color:var(--text);
    }

    .client-info span{
        font-size:13px;
        color:var(--muted);
    }

    .pricing-teaser{
        padding:0 0 84px;
    }

    .pricing-wrap{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:22px;
    }

    .pricing-card{
        background:#fff;
        border:1px solid #e6edf6;
        border-radius:28px;
        padding:30px;
        box-shadow:var(--shadow-md);
        position:relative;
        overflow:hidden;
    }

    .pricing-card.featured{
        background:linear-gradient(135deg,#0f172a,#1e293b,#1d4ed8);
        color:#fff;
    }

    .pricing-card .label{
        display:inline-block;
        font-size:12px;
        font-weight:800;
        padding:8px 12px;
        border-radius:999px;
        background:rgba(37,99,235,0.10);
        color:var(--primary);
        margin-bottom:16px;
    }

    .pricing-card.featured .label{
        background:rgba(255,255,255,0.12);
        color:#fff;
    }

    .pricing-card h3{
        font-size:24px;
        margin:0 0 10px;
    }

    .pricing-card p{
        font-size:15px;
        line-height:1.7;
        color:#475569;
        margin:0 0 20px;
    }

    .pricing-card.featured p{
        color:rgba(255,255,255,0.82);
    }

    .price{
        font-size:42px;
        font-weight:800;
        margin-bottom:18px;
    }

    .price small{
        font-size:15px;
        font-weight:600;
        opacity:0.7;
    }

    .price-list{
        display:grid;
        gap:10px;
        margin-bottom:24px;
    }

    .price-list span{
        padding:11px 12px;
        border-radius:12px;
        background:#f8fafc;
        border:1px solid #e2e8f0;
        color:#334155;
        font-size:14px;
        font-weight:600;
    }

    .pricing-card.featured .price-list span{
        background:rgba(255,255,255,0.08);
        border-color:rgba(255,255,255,0.10);
        color:#fff;
    }

    .cta{
        padding:8px 0 92px;
    }

    .cta-box{
        background:var(--gradient);
        color:#fff;
        border-radius:34px;
        padding:50px;
        position:relative;
        overflow:hidden;
        box-shadow:0 24px 55px rgba(37,99,235,0.22);
    }

    .cta-box:before{
        content:"";
        position:absolute;
        width:260px;
        height:260px;
        border-radius:50%;
        background:rgba(255,255,255,0.10);
        right:-70px;
        top:-70px;
    }

    .cta-box:after{
        content:"";
        position:absolute;
        width:170px;
        height:170px;
        border-radius:30px;
        background:rgba(255,255,255,0.08);
        left:-40px;
        bottom:-40px;
        transform:rotate(25deg);
    }

    .cta-content{
        position:relative;
        z-index:2;
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:24px;
        flex-wrap:wrap;
    }

    .cta-text h2{
        font-size:40px;
        margin:0 0 10px;
    }

    .cta-text p{
        font-size:16px;
        opacity:0.94;
        max-width:560px;
        margin:0;
    }

    .footer{
        padding:28px 0 40px;
    }

    .footer-wrap{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:20px;
        border-top:1px solid var(--line);
        padding-top:24px;
        flex-wrap:wrap;
    }

    .footer p{
        color:var(--muted);
        font-size:14px;
        margin:0;
    }

    .footer-links{
        display:flex;
        gap:20px;
        flex-wrap:wrap;
    }

    .footer-links a{
        color:#475569;
        font-size:14px;
        font-weight:600;
    }

    @media(max-width:1100px){
        .hero-wrap,
        .about-wrap,
        .pricing-wrap{
            grid-template-columns:1fr;
        }

        .gallery-grid,
        .testimonial-grid{
            grid-template-columns:1fr 1fr;
        }

        .service-grid{
            grid-template-columns:1fr 1fr;
        }

        .process-grid{
            grid-template-columns:1fr 1fr;
        }

        .stats-grid{
            grid-template-columns:1fr 1fr;
        }

        .hero-visual{
            min-height:740px;
        }

        .main-ui-card{
            width:84%;
        }
    }

    @media(max-width:900px){
        .hero-text h1{
            font-size:52px;
        }

        .hero-points{
            grid-template-columns:1fr;
        }

        .service-grid,
        .gallery-grid,
        .testimonial-grid{
            grid-template-columns:1fr 1fr;
        }
    }

    @media(max-width:768px){
        .hero{
            padding:60px 0 50px;
        }

        .hero-wrap{
            grid-template-columns:1fr;
        }

        .hero-text h1{
            font-size:40px;
            letter-spacing:-1px;
        }

        .hero-text p{
            font-size:16px;
        }

        .service-grid,
        .gallery-grid,
        .testimonial-grid,
        .process-grid,
        .stats-grid,
        .pricing-wrap{
            grid-template-columns:1fr;
        }

        .main-ui-card{
            position:relative;
            width:100%;
            top:0;
            right:auto;
        }

        .floating-card.one,
        .floating-card.two,
        .floating-card.three{
            position:relative;
            width:100%;
            left:auto;
            right:auto;
            bottom:auto;
            top:auto;
            margin-top:14px;
        }

        .hero-visual{
            min-height:auto;
        }

        .cta-box{
            padding:34px 24px;
        }

        .cta-text h2{
            font-size:30px;
        }

        .dashboard-hero img{
            height:220px;
        }

        .dashboard-hero{
            min-height:220px;
        }

        .about-photo img{
            height:380px;
        }

        .section-head h2{
            font-size:32px;
        }
    }

    @media(max-width:520px){
        .hero-actions{
            flex-direction:column;
            align-items:stretch;
        }

        .btn{
            width:100%;
        }

        .ui-grid{
            grid-template-columns:1fr;
        }

        .hero-text h1{
            font-size:34px;
        }
    }
</style>

<div class="agency-page">

    <section class="hero">
        <div class="container hero-wrap">
            <div class="hero-text">
                <div class="mini-badge">
                    <span class="dot"></span>
                    Full-Service Creative Digital Agency
                </div>

                <h1>
                    We build <span class="gradient-text">brands, websites</span><br>
                    and growth systems<br>
                    that convert
                </h1>

                <p>
                    From strategy and branding to website design, development, and performance marketing — we help ambitious businesses launch modern digital experiences that look premium and drive real results.
                </p>

                <div class="hero-actions">
                    <a href="#contact" class="btn btn-primary">Book Free Consultation</a>
                    <a href="#portfolio" class="btn btn-secondary">View Our Work</a>
                </div>

                <div class="hero-points">
                    <div class="hero-point">
                        <i>✓</i>
                        Brand Strategy & Identity Systems
                    </div>
                    <div class="hero-point">
                        <i>✓</i>
                        High-Converting Website Design
                    </div>
                    <div class="hero-point">
                        <i>✓</i>
                        Full-Stack Web Development
                    </div>
                    <div class="hero-point">
                        <i>✓</i>
                        SEO, Ads & Performance Growth
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="blur-shape"></div>
                <div class="blur-shape-2"></div>
                <div class="blur-shape-3"></div>

                <div class="floating-card one">
                    <h5>Growth Snapshot</h5>
                    <p>Average increase in qualified leads after redesigning brand positioning and website flow.</p>
                    <div class="floating-metric">
                        <strong>+187%</strong>
                        <span>Lead growth</span>
                    </div>
                </div>

                <div class="main-ui-card">
                    <div class="browser-top">
                        <div class="browser-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="browser-tag">Agency Performance Dashboard</div>
                    </div>

                    <div class="dashboard-hero">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80" alt="agency dashboard preview">
                        <div class="dashboard-content">
                            <small>Campaign + Website Performance</small>
                            <h3>Scale With Smarter Design</h3>
                            <p>Creative direction, modern UI, and data-backed optimization built into one agency workflow.</p>
                        </div>
                    </div>

                    <div class="ui-grid">
                        <div class="mini-card">
                            <h4>Project Delivery Rate</h4>
                            <div class="progress"><span style="width: 92%;"></span></div>
                            <p>Fast, structured execution with transparent milestones and weekly updates.</p>
                        </div>

                        <div class="mini-card">
                            <h4>Revenue Uplift Trend</h4>
                            <div class="chart-bars">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <p>Campaign and conversion optimization designed to push measurable business growth.</p>
                        </div>
                    </div>
                </div>

                <div class="floating-card two">
                    <h5>Core Team</h5>
                    <p>Strategists, designers, developers, and marketers working together on every launch.</p>
                    <div class="avatar-row">
                        <img class="avatar" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80" alt="team member">
                        <img class="avatar" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80" alt="team member">
                        <img class="avatar" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=100&q=80" alt="team member">
                        <img class="avatar" src="https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?auto=format&fit=crop&w=100&q=80" alt="team member">
                    </div>
                </div>

                <div class="floating-card three">
                    <h5>Client Satisfaction</h5>
                    <p><strong style="font-size:26px;color:#0f172a;">4.9/5</strong><br>trusted by startups, agencies, and growing brands.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="client-strip">
        <div class="container">
            <div class="client-shell">
                <div class="client-track">
                    <div class="client-item">NOVA CORP</div>
                    <div class="client-item">PIXELFORGE</div>
                    <div class="client-item">LUMEN LABS</div>
                    <div class="client-item">VERTEX STUDIO</div>
                    <div class="client-item">BLOOM TECH</div>
                    <div class="client-item">NEXTWAVE</div>
                    <div class="client-item">NOVA CORP</div>
                    <div class="client-item">PIXELFORGE</div>
                    <div class="client-item">LUMEN LABS</div>
                    <div class="client-item">VERTEX STUDIO</div>
                    <div class="client-item">BLOOM TECH</div>
                    <div class="client-item">NEXTWAVE</div>
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="section-head">
                <span>Our Services</span>
                <h2>Everything you need to launch and grow online</h2>
                <p>We combine brand strategy, premium design, development, and growth marketing to help businesses create stronger digital presence and better customer conversion.</p>
            </div>

            <div class="service-grid">
                <div class="service-card">
                    <div class="service-icon">01</div>
                    <h3>Brand Strategy</h3>
                    <p>We define your positioning, messaging, visual direction, and identity system so your business feels credible, clear, and memorable.</p>
                    <div class="service-list">
                        <span>Brand Positioning</span>
                        <span>Visual Identity</span>
                        <span>Messaging & Tone</span>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">02</div>
                    <h3>UI/UX Design</h3>
                    <p>We design modern, high-end interfaces that look sharp, feel smooth, and guide visitors toward conversion with a better user experience.</p>
                    <div class="service-list">
                        <span>Website UI Design</span>
                        <span>Landing Pages</span>
                        <span>Conversion-Focused UX</span>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">03</div>
                    <h3>Web Development</h3>
                    <p>Responsive, scalable websites built for speed, reliability, and growth using clean front-end and back-end implementation.</p>
                    <div class="service-list">
                        <span>Laravel / PHP Builds</span>
                        <span>Responsive Front-End</span>
                        <span>CMS & Custom Features</span>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">04</div>
                    <h3>SEO Optimization</h3>
                    <p>We improve technical SEO, on-page content structure, and search visibility so your site can attract qualified organic traffic.</p>
                    <div class="service-list">
                        <span>On-Page SEO</span>
                        <span>Technical Audits</span>
                        <span>Content Structuring</span>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">05</div>
                    <h3>Performance Marketing</h3>
                    <p>Run smarter campaigns with optimized funnels, ad creatives, and analytics to increase leads, bookings, and revenue.</p>
                    <div class="service-list">
                        <span>Paid Ads Strategy</span>
                        <span>Lead Funnel Design</span>
                        <span>Analytics & Tracking</span>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">06</div>
                    <h3>Ongoing Support</h3>
                    <p>After launch, we continue improving your website and digital systems with updates, reporting, optimization, and growth support.</p>
                    <div class="service-list">
                        <span>Maintenance</span>
                        <span>Conversion Updates</span>
                        <span>Growth Retainers</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stats-section">
        <div class="container">
            <div class="stats-wrap">
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>120+</h3>
                        <p>Projects launched across web, branding, and marketing</p>
                    </div>
                    <div class="stat-card">
                        <h3>100%</h3>
                        <p>Client satisfaction through transparent delivery</p>
                    </div>
                    <div class="stat-card">
                        <h3>45+</h3>
                        <p>Brands transformed with better digital presence</p>
                    </div>
                    <div class="stat-card">
                        <h3>3x</h3>
                        <p>Average conversion lift on optimized landing pages</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="about-wrap">
                <div class="about-visual">
                    <div class="about-photo">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" alt="agency team collaboration">
                        <div class="about-badge">
                            <strong>7+ Years</strong>
                            <span>Design, development & growth experience</span>
                        </div>
                    </div>
                </div>

                <div class="about-content">
                    <div class="section-head">
                        <span>Why Choose Us</span>
                        <h2>We design with strategy and build for business growth</h2>
                        <p>Not just good-looking screens. We create experiences that support trust, communication, lead generation, and long-term brand value.</p>
                    </div>

                    <div class="about-copy">
                        Our agency approach is simple: understand the business, clarify the message, design the experience, build the system, then optimize performance. This creates websites and digital assets that are both visually impressive and commercially effective.
                    </div>

                    <div class="about-features">
                        <div class="about-item">
                            <h4>Business-first creative direction</h4>
                            <p>We align every design decision with brand goals, customer behavior, and conversion opportunities.</p>
                        </div>
                        <div class="about-item">
                            <h4>Fast and collaborative workflow</h4>
                            <p>Clear process, milestone-based execution, responsive communication, and organized project delivery.</p>
                        </div>
                        <div class="about-item">
                            <h4>Design + development under one team</h4>
                            <p>No disconnect between concept and execution. The final product stays polished from idea to launch.</p>
                        </div>
                    </div>

                    <a href="#contact" class="btn btn-dark">Start a Project</a>
                </div>
            </div>
        </div>
    </section>

    <section class="process">
        <div class="container">
            <div class="section-head">
                <span>Our Process</span>
                <h2>How we take projects from idea to launch</h2>
                <p>A streamlined workflow that keeps the project focused, collaborative, and measurable from day one.</p>
            </div>

            <div class="process-grid">
                <div class="process-card">
                    <div class="process-number">01</div>
                    <h3>Discovery</h3>
                    <p>We understand your business goals, audience, pain points, competitors, and the opportunities that matter most.</p>
                </div>

                <div class="process-card">
                    <div class="process-number">02</div>
                    <h3>Strategy</h3>
                    <p>We create a content, brand, and conversion plan so the website communicates clearly and performs effectively.</p>
                </div>

                <div class="process-card">
                    <div class="process-number">03</div>
                    <h3>Design & Build</h3>
                    <p>We design premium UI, develop responsive pages, and implement everything with performance and usability in mind.</p>
                </div>

                <div class="process-card">
                    <div class="process-number">04</div>
                    <h3>Launch & Optimize</h3>
                    <p>After launch, we monitor behavior, refine the flow, and improve conversion through ongoing iteration and support.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-gallery" id="portfolio">
        <div class="container">
            <div class="section-head">
                <span>Case Studies</span>
                <h2>Selected work for growing brands</h2>
                <p>These project cards help present the agency as credible and premium by showing real service categories, business outcomes, and polished visuals.</p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=1200&q=80" alt="branding case study">
                        <div class="gallery-badge">Brand Transformation</div>
                    </div>
                    <div class="gallery-content">
                        <h3>Nova Corporate Rebrand</h3>
                        <p>Repositioned the company with a cleaner visual identity, improved messaging, and a premium website system tailored for lead generation.</p>
                        <div class="gallery-meta">
                            <span class="meta-pill">Branding</span>
                            <span class="meta-pill">Website Design</span>
                            <span class="meta-pill">Strategy</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=1200&q=80" alt="dashboard case study">
                        <div class="gallery-badge">SaaS Product UX</div>
                    </div>
                    <div class="gallery-content">
                        <h3>Analytics SaaS Dashboard</h3>
                        <p>Designed and built a modern data platform UI with better workflow clarity, improved navigation, and stronger product presentation.</p>
                        <div class="gallery-meta">
                            <span class="meta-pill">UI/UX</span>
                            <span class="meta-pill">Web App</span>
                            <span class="meta-pill">Development</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1200&q=80" alt="growth campaign case study">
                        <div class="gallery-badge">Growth Campaign</div>
                    </div>
                    <div class="gallery-content">
                        <h3>Finance Startup Launch Funnel</h3>
                        <p>Created a high-converting landing page and campaign funnel that improved acquisition quality and increased booked demos.</p>
                        <div class="gallery-meta">
                            <span class="meta-pill">Landing Page</span>
                            <span class="meta-pill">Paid Growth</span>
                            <span class="meta-pill">Optimization</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section">
        <div class="container">
            <div class="section-head">
                <span>Client Feedback</span>
                <h2>What clients say about working with us</h2>
                <p>Social proof makes the agency site feel more trustworthy and conversion-ready, especially for service businesses.</p>
            </div>

            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p>
                        They completely transformed our website and brand presentation. The new design feels premium, performs better, and helped us get more qualified inquiries within weeks.
                    </p>
                    <div class="client-info">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=120&q=80" alt="client">
                        <div>
                            <h4>Sarah Johnson</h4>
                            <span>Marketing Director, Nova Corp</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p>
                        The workflow was clear, fast, and collaborative. From design direction to development, everything felt structured and high quality. We finally have a website that matches our brand.
                    </p>
                    <div class="client-info">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=120&q=80" alt="client">
                        <div>
                            <h4>Daniel Lee</h4>
                            <span>Founder, Vertex Studio</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p>
                        Their landing page and campaign work improved conversion performance immediately. The team understands both aesthetics and business outcomes, which is rare.
                    </p>
                    <div class="client-info">
                        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=120&q=80" alt="client">
                        <div>
                            <h4>Michael Rahman</h4>
                            <span>CEO, Bloom Tech</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-teaser">
        <div class="container">
            <div class="section-head">
                <span>Packages</span>
                <h2>Flexible engagement models for different business stages</h2>
                <p>Use these blocks to position the agency clearly for startups, growing companies, and long-term retainers.</p>
            </div>

            <div class="pricing-wrap">
                <div class="pricing-card">
                    <div class="label">Starter Launch</div>
                    <h3>For startups and small brands</h3>
                    <p>A focused package for businesses that need a premium online presence without overcomplicating the launch.</p>
                    <div class="price">$1,200 <small>/ project</small></div>
                    <div class="price-list">
                        <span>Landing page or mini website</span>
                        <span>Responsive UI design</span>
                        <span>Basic SEO setup</span>
                        <span>Launch support</span>
                    </div>
                    <a href="#contact" class="btn btn-secondary">Choose Starter</a>
                </div>

                <div class="pricing-card featured">
                    <div class="label">Growth Package</div>
                    <h3>For brands ready to scale</h3>
                    <p>Complete agency support covering strategy, UI/UX, development, and growth optimization for serious expansion.</p>
                    <div class="price">$3,500 <small>/ project</small></div>
                    <div class="price-list">
                        <span>Multi-page website design & build</span>
                        <span>Brand direction and content planning</span>
                        <span>Conversion optimization setup</span>
                        <span>Analytics and performance support</span>
                    </div>
                    <a href="#contact" class="btn btn-secondary">Choose Growth</a>
                </div>
            </div>
        </div>
    </section>

    <section class="cta" id="contact">
        <div class="container">
            <div class="cta-box">
                <div class="cta-content">
                    <div class="cta-text">
                        <h2>Ready to turn your business into a stronger digital brand?</h2>
                        <p>Let’s build a modern agency-grade website experience that looks premium, communicates clearly, and helps you generate more leads and sales.</p>
                    </div>

                    <div class="cta-actions">
                        <a href="#" class="btn btn-secondary">Schedule a Call</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer-wrap">
            <p>© 2026 AgencyX. Creative digital agency for branding, websites, and growth.</p>

            <div class="footer-links">
                <a href="#">Home</a>
                <a href="#portfolio">Portfolio</a>
                <a href="#">Services</a>
                <a href="#">Contact</a>
            </div>
        </div>
    </footer>
</div>
@endsection