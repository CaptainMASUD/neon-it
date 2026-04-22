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

    a{
        text-decoration:none;
    }

    .about-page{
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

    .section-space{
        padding:84px 0;
        position:relative;
    }

    .section-head{
        text-align:center;
        margin-bottom:52px;
    }

    .section-head.left{
        text-align:left;
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

    .section-head.left p{
        margin:0;
        max-width:100%;
    }

    .about-intro{
        padding:50px 0 24px;
    }

    .intro-wrap{
        display:grid;
        grid-template-columns:1.05fr .95fr;
        gap:28px;
        align-items:center;
    }

    .intro-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:30px;
        padding:38px;
        box-shadow:var(--shadow-lg);
        position:relative;
        overflow:hidden;
    }

    .intro-card:before{
        content:"";
        position:absolute;
        width:180px;
        height:180px;
        border-radius:40px;
        right:-40px;
        top:-40px;
        background:var(--gradient-soft);
        transform:rotate(22deg);
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
        position:relative;
        z-index:2;
    }

    .dot{
        width:10px;
        height:10px;
        border-radius:50%;
        background:var(--accent);
        box-shadow:0 0 0 5px rgba(6,182,212,0.12);
    }

    .intro-card h1{
        font-size:54px;
        line-height:1.05;
        letter-spacing:-1.8px;
        margin:0 0 16px;
        position:relative;
        z-index:2;
    }

    .gradient-text{
        background:var(--gradient);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
        background-clip:text;
    }

    .intro-card p{
        font-size:17px;
        color:#475569;
        line-height:1.85;
        margin:0 0 26px;
        position:relative;
        z-index:2;
    }

    .intro-actions{
        display:flex;
        gap:14px;
        flex-wrap:wrap;
        position:relative;
        z-index:2;
    }

    .intro-visual{
        position:relative;
        min-height:520px;
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
        background:rgba(124,58,237,0.14);
        top:40px;
        right:-20px;
    }

    .blur-shape-3{
        width:220px;
        height:220px;
        background:rgba(6,182,212,0.12);
        left:80px;
        bottom:20px;
    }

    .visual-main{
        position:absolute;
        right:0;
        top:20px;
        width:82%;
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:30px;
        padding:18px;
        box-shadow:var(--shadow-lg);
        z-index:2;
    }

    .visual-main img{
        width:100%;
        height:420px;
        object-fit:cover;
        display:block;
        border-radius:24px;
    }

    .floating-card{
        position:absolute;
        background:#fff;
        border:1px solid #e8eef8;
        border-radius:20px;
        box-shadow:0 20px 45px rgba(15,23,42,0.08);
        z-index:3;
        padding:18px;
    }

    .floating-card.one{
        left:0;
        top:92px;
        width:230px;
    }

    .floating-card.two{
        left:28px;
        bottom:30px;
        width:250px;
    }

    .floating-card h5{
        font-size:15px;
        margin:0 0 10px;
        color:var(--text);
    }

    .floating-card p{
        font-size:13px;
        color:var(--muted);
        line-height:1.65;
        margin:0;
    }

    .floating-metric{
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin-top:12px;
    }

    .floating-metric strong{
        font-size:28px;
        color:var(--text);
    }

    .floating-metric span{
        font-size:12px;
        color:var(--muted);
    }

    .story-section{
        padding:28px 0 84px;
    }

    .story-wrap{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:24px;
        align-items:center;
    }

    .story-content{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:28px;
        padding:36px;
        box-shadow:var(--shadow-md);
    }

    .story-content p{
        margin:0 0 16px;
        color:#475569;
        font-size:16px;
        line-height:1.9;
    }

    .story-content p:last-child{
        margin-bottom:0;
    }

    .story-image{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:28px;
        padding:18px;
        box-shadow:var(--shadow-md);
    }

    .story-image img{
        width:100%;
        height:470px;
        object-fit:cover;
        display:block;
        border-radius:22px;
    }

    .mission-section{
        padding:10px 0 84px;
    }

    .mission-grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:22px;
    }

    .mission-card{
        background:#fff;
        border:1px solid #e6edf6;
        border-radius:28px;
        padding:34px;
        box-shadow:var(--shadow-md);
        transition:.3s ease;
        position:relative;
        overflow:hidden;
    }

    .mission-card:hover{
        transform:translateY(-8px);
    }

    .mission-card:before{
        content:"";
        position:absolute;
        width:120px;
        height:120px;
        right:-20px;
        top:-20px;
        border-radius:26px;
        background:var(--gradient-soft);
        transform:rotate(24deg);
    }

    .mission-icon{
        width:60px;
        height:60px;
        border-radius:18px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:22px;
        font-weight:800;
        background:var(--gradient);
        margin-bottom:18px;
        position:relative;
        z-index:2;
    }

    .mission-card h3{
        font-size:26px;
        margin:0 0 12px;
        position:relative;
        z-index:2;
    }

    .mission-card p{
        margin:0;
        color:#475569;
        line-height:1.8;
        font-size:15px;
        position:relative;
        z-index:2;
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
        line-height:1.6;
    }

    .values-section{
        padding:0 0 84px;
    }

    .values-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:22px;
    }

    .value-card{
        background:#fff;
        border:1px solid #e6edf6;
        border-radius:26px;
        padding:30px;
        box-shadow:var(--shadow-md);
        transition:.3s ease;
    }

    .value-card:hover{
        transform:translateY(-8px);
    }

    .value-icon{
        width:58px;
        height:58px;
        border-radius:18px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:20px;
        font-weight:800;
        background:var(--gradient);
        margin-bottom:18px;
    }

    .value-card h3{
        font-size:22px;
        margin:0 0 10px;
    }

    .value-card p{
        margin:0;
        font-size:15px;
        color:#475569;
        line-height:1.8;
    }

    .team-section{
        padding:0 0 84px;
    }

    .team-grid{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:22px;
    }

    .team-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:24px;
        overflow:hidden;
        box-shadow:var(--shadow-md);
        transition:.35s ease;
    }

    .team-card:hover{
        transform:translateY(-8px);
    }

    .team-image{
        height:280px;
        overflow:hidden;
    }

    .team-image img{
        width:100%;
        height:100%;
        object-fit:cover;
        display:block;
        transition:.45s ease;
    }

    .team-card:hover .team-image img{
        transform:scale(1.06);
    }

    .team-content{
        padding:22px;
    }

    .team-content h3{
        font-size:20px;
        margin:0 0 6px;
        color:var(--text);
    }

    .team-role{
        display:inline-block;
        font-size:13px;
        font-weight:700;
        color:var(--primary);
        background:rgba(37,99,235,0.08);
        padding:7px 12px;
        border-radius:999px;
        margin-bottom:12px;
    }

    .team-content p{
        margin:0;
        font-size:14px;
        line-height:1.7;
        color:#475569;
    }

    .timeline-section{
        padding:0 0 84px;
    }

    .timeline-wrap{
        display:grid;
        gap:18px;
        max-width:920px;
        margin:0 auto;
    }

    .timeline-item{
        display:grid;
        grid-template-columns:110px 1fr;
        gap:18px;
        align-items:flex-start;
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:24px;
        padding:24px;
        box-shadow:var(--shadow-md);
    }

    .timeline-year{
        min-height:64px;
        border-radius:18px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:22px;
        font-weight:800;
        color:#fff;
        background:var(--gradient);
    }

    .timeline-content h3{
        font-size:22px;
        margin:0 0 8px;
    }

    .timeline-content p{
        margin:0;
        color:#475569;
        font-size:15px;
        line-height:1.8;
    }

    .trust-section{
        padding:0 0 84px;
    }

    .trust-wrap{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:22px;
    }

    .trust-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:28px;
        padding:34px;
        box-shadow:var(--shadow-md);
    }

    .trust-card h3{
        font-size:26px;
        margin:0 0 12px;
    }

    .trust-card p{
        margin:0 0 18px;
        color:#475569;
        line-height:1.8;
        font-size:15px;
    }

    .trust-list{
        display:grid;
        gap:12px;
    }

    .trust-list span{
        display:flex;
        align-items:center;
        gap:10px;
        padding:12px 14px;
        border-radius:14px;
        background:#f8fafc;
        border:1px solid #e2e8f0;
        color:#334155;
        font-size:14px;
        font-weight:700;
    }

    .trust-list span i{
        width:24px;
        height:24px;
        border-radius:50%;
        background:var(--gradient-soft);
        display:flex;
        align-items:center;
        justify-content:center;
        font-style:normal;
        color:var(--primary);
        font-size:13px;
    }

    .cta{
        padding:0 0 90px;
    }

    .cta-box{
        background:var(--gradient);
        color:#fff;
        border-radius:34px;
        padding:48px;
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
        .intro-wrap,
        .story-wrap,
        .trust-wrap{
            grid-template-columns:1fr;
        }

        .values-grid{
            grid-template-columns:1fr 1fr;
        }

        .team-grid{
            grid-template-columns:1fr 1fr;
        }

        .stats-grid{
            grid-template-columns:1fr 1fr;
        }

        .mission-grid{
            grid-template-columns:1fr;
        }

        .intro-visual{
            min-height:640px;
        }

        .visual-main{
            width:84%;
        }
    }

    @media(max-width:768px){
        .about-intro{
            padding-top:34px;
        }

        .intro-card{
            padding:28px 22px;
        }

        .intro-card h1{
            font-size:38px;
            letter-spacing:-1px;
        }

        .section-head h2{
            font-size:32px;
        }

        .values-grid,
        .team-grid,
        .stats-grid{
            grid-template-columns:1fr;
        }

        .visual-main{
            position:relative;
            width:100%;
            right:auto;
            top:0;
        }

        .floating-card.one,
        .floating-card.two{
            position:relative;
            width:100%;
            left:auto;
            top:auto;
            bottom:auto;
            margin-top:14px;
        }

        .intro-visual{
            min-height:auto;
        }

        .timeline-item{
            grid-template-columns:1fr;
        }

        .story-image img{
            height:340px;
        }

        .team-image{
            height:250px;
        }

        .cta-box{
            padding:34px 24px;
        }

        .cta-text h2{
            font-size:30px;
        }
    }

    @media(max-width:520px){
        .intro-actions{
            flex-direction:column;
            align-items:stretch;
        }

        .btn{
            width:100%;
        }
    }
</style>

<div class="about-page">

    <section class="about-intro">
        <div class="container intro-wrap">
            <div class="intro-card">
                <div class="mini-badge">
                    <span class="dot"></span>
                    About Our Agency
                </div>

                <h1>
                    We build <span class="gradient-text">meaningful digital experiences</span> with strategy, design, and growth in mind
                </h1>

                <p>
                    We are a creative digital agency focused on helping brands grow through thoughtful strategy, premium design, scalable development, and performance-driven execution. Our approach combines strong visuals with real business value so every project feels modern, clear, and effective.
                </p>

                <div class="intro-actions">
                    <a href="#" class="btn btn-primary">Work With Us</a>
                    <a href="#" class="btn btn-secondary">See Our Services</a>
                </div>
            </div>

            <div class="intro-visual">
                <div class="blur-shape"></div>
                <div class="blur-shape-2"></div>
                <div class="blur-shape-3"></div>

                <div class="visual-main">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80" alt="agency team">
                </div>

                <div class="floating-card one">
                    <h5>Creative + Strategic</h5>
                    <p>We mix beautiful design with practical business thinking to create digital work that truly performs.</p>
                    <div class="floating-metric">
                        <strong>120+</strong>
                        <span>Projects delivered</span>
                    </div>
                </div>

                <div class="floating-card two">
                    <h5>Built for Growth</h5>
                    <p>From branding and websites to campaign systems, we create digital foundations that support long-term business growth.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="story-section">
        <div class="container story-wrap">
            <div class="story-content">
                <div class="section-head left">
                    <span>Our Story</span>
                    <h2>From creative ambition to a full-service agency mindset</h2>
                    <p>We started with a simple goal: create better digital experiences that feel premium, human, and effective.</p>
                </div>

                <p>
                    What began as a passion for strong visual design evolved into a broader agency vision built around business impact. We saw that clients did not just need attractive websites — they needed clearer communication, stronger positioning, smarter user experiences, and digital systems that could actually support growth.
                </p>

                <p>
                    That is why our process expanded beyond design alone. Today, we work across strategy, branding, development, optimization, and creative direction to help brands move with more confidence online.
                </p>

                <p>
                    Every project we take on is shaped by collaboration, precision, and the belief that great digital work should not only look impressive but also create trust, engagement, and measurable results.
                </p>
            </div>

            <div class="story-image">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80" alt="agency discussion">
            </div>
        </div>
    </section>

    <section class="mission-section">
        <div class="container">
            <div class="mission-grid">
                <div class="mission-card">
                    <div class="mission-icon">M</div>
                    <h3>Our Mission</h3>
                    <p>
                        To help brands communicate better, look sharper, and grow faster through thoughtful strategy, premium design systems, modern web experiences, and performance-led digital execution.
                    </p>
                </div>

                <div class="mission-card">
                    <div class="mission-icon">V</div>
                    <h3>Our Vision</h3>
                    <p>
                        To become the agency brands trust when they want digital work that balances creativity, clarity, innovation, and measurable business outcomes in one seamless experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="stats-section">
        <div class="container">
            <div class="stats-wrap">
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>7+</h3>
                        <p>Years of combined digital design and development experience</p>
                    </div>
                    <div class="stat-card">
                        <h3>120+</h3>
                        <p>Projects launched across branding, websites, and marketing</p>
                    </div>
                    <div class="stat-card">
                        <h3>45+</h3>
                        <p>Businesses supported with stronger digital growth systems</p>
                    </div>
                    <div class="stat-card">
                        <h3>100%</h3>
                        <p>Client satisfaction through collaborative and reliable delivery</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="values-section">
        <div class="container">
            <div class="section-head">
                <span>Core Values</span>
                <h2>The principles that shape how we work</h2>
                <p>Our team follows a clear set of values so every client experience feels professional, collaborative, and focused on real outcomes.</p>
            </div>

            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">01</div>
                    <h3>Clarity</h3>
                    <p>We believe strong design and communication should make things easier to understand, not more complicated.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">02</div>
                    <h3>Quality</h3>
                    <p>We pay attention to detail in every screen, interaction, and deliverable so the final experience feels premium.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">03</div>
                    <h3>Collaboration</h3>
                    <p>Great work happens when strategy, design, development, and client input move together with transparency.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">04</div>
                    <h3>Innovation</h3>
                    <p>We stay modern in our thinking and execution so every solution feels relevant, efficient, and future-ready.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">05</div>
                    <h3>Impact</h3>
                    <p>We care about outcomes, not just visuals — every project should support trust, growth, and better performance.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">06</div>
                    <h3>Trust</h3>
                    <p>Clear communication, honest timelines, and dependable delivery are part of the experience we promise clients.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section">
        <div class="container">
            <div class="section-head">
                <span>Meet The Team</span>
                <h2>The people behind the ideas and execution</h2>
                <p>A balanced team of strategists, designers, developers, and growth-focused creatives who work together to build better digital experiences.</p>
            </div>

            <div class="team-grid">
             

               
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://scontent.fdac183-1.fna.fbcdn.net/v/t39.30808-6/489060551_4151808458476043_7838466855480869628_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=53a332&_nc_eui2=AeGcirO-lNSca6zBrSiGs1-WBZEFR2We-8kFkQVHZZ77yWTqRrJ2mSs_BDNkCBAyekW87S8-GojakrIHng2yfhFb&_nc_ohc=VWf2SzXAetgQ7kNvwE9huaE&_nc_oc=AdqNZ8aD8rUkxLPAxW_begT6bWeAtwfBSop3cl8sIRkkMa6a4sC2nGuBARNs6iHeojw&_nc_zt=23&_nc_ht=scontent.fdac183-1.fna&_nc_gid=Kl6exY0BX2bD8-FgFGRsWA&_nc_ss=7a3a8&oh=00_Af1VinoZTl1bHrfk_FmSR29-P6uKW_BkeKYo5XiU9-5s3w&oe=69EE9551" alt="team member">
                    </div>
                    <div class="team-content">
                        <h3>Sazzad Hossain Provat</h3>
                        <div class="team-role">Lead Developer</div>
                        <p>Builds responsive, scalable, and polished web experiences with clean technical execution.</p>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="https://scontent.fdac183-1.fna.fbcdn.net/v/t39.30808-6/489910368_1687024488599154_1331217035492863919_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=53a332&_nc_eui2=AeH6jsKh0s2yVHEeZWU6ioVNqO8Qheeuh-mo7xCF566H6WawJVIHemfnF-65X_Cc_ZvyW9fUzgtlHOQOv_XB1jo7&_nc_ohc=lSGeMl_BoP4Q7kNvwEh2F6x&_nc_oc=AdoeUGZwhVezT-e_gtG5WM93f5ivBIMJPttbJ5EJoFcM3f3s4ZoW5xa2077OJupsMgs&_nc_zt=23&_nc_ht=scontent.fdac183-1.fna&_nc_gid=qlhRTHEG2axJmTPf67ipoA&_nc_ss=7a3a8&oh=00_Af0vldGN7XWwiPY-x7C0o9zinMhrwjri2s_mlGETGAeeTg&oe=69EE8D64" alt="team member">
                    </div>
                    <div class="team-content">
                        <h3>Mimi Wahi</h3>
                        <div class="team-role">Growth Specialist</div>
                        <p>Focuses on campaigns, analytics, and performance systems that support long-term growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="timeline-section">
        <div class="container">
            <div class="section-head">
                <span>Our Journey</span>
                <h2>How the agency evolved over time</h2>
                <p>A simple timeline section gives the About page more story, personality, and depth.</p>
            </div>

            <div class="timeline-wrap">
                <div class="timeline-item">
                    <div class="timeline-year">2019</div>
                    <div class="timeline-content">
                        <h3>The beginning</h3>
                        <p>We started as a small creative team focused on branding and website design for early-stage businesses and local brands.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2021</div>
                    <div class="timeline-content">
                        <h3>Expanded into full digital execution</h3>
                        <p>Our service offering grew into UI/UX, front-end development, SEO foundations, and stronger content-led web strategy.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2023</div>
                    <div class="timeline-content">
                        <h3>Built a stronger agency workflow</h3>
                        <p>We refined our process to better connect strategy, design, and delivery so client projects could move faster and more clearly.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2026</div>
                    <div class="timeline-content">
                        <h3>Focused on growth-oriented digital experiences</h3>
                        <p>Today, we help ambitious brands create digital systems that feel premium, communicate clearly, and support measurable growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trust-section">
        <div class="container trust-wrap">
            <div class="trust-card">
                <h3>Why clients trust us</h3>
                <p>
                    Our clients choose us because we combine design quality with business understanding. We stay collaborative, organized, and focused on work that creates long-term value instead of short-term noise.
                </p>

                <div class="trust-list">
                    <span><i>✓</i> Clear communication and transparent project updates</span>
                    <span><i>✓</i> Premium design direction with practical business thinking</span>
                    <span><i>✓</i> Reliable delivery and refined user experience execution</span>
                    <span><i>✓</i> Long-term mindset for growth, performance, and support</span>
                </div>
            </div>

            <div class="trust-card">
                <h3>What makes our approach different</h3>
                <p>
                    We do not treat design, development, and growth as separate pieces. We build everything with alignment so the final experience feels cohesive, strategic, and ready to perform in the real world.
                </p>

                <div class="trust-list">
                    <span><i>✓</i> Strategy-led design decisions</span>
                    <span><i>✓</i> Consistent premium visual language</span>
                    <span><i>✓</i> Scalable and responsive development</span>
                    <span><i>✓</i> Conversion-focused thinking from start to finish</span>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <div class="cta-box">
                <div class="cta-content">
                    <div class="cta-text">
                        <h2>Let’s build something meaningful together</h2>
                        <p>Whether you need branding, a stronger website, or a complete digital growth system, our team is ready to help you move forward with confidence.</p>
                    </div>

                    <div class="cta-actions">
                        <a href="#" class="btn btn-secondary">Start Your Project</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer-wrap">
            <p>© 2026 AgencyX. About us page design for a modern digital agency.</p>

            <div class="footer-links">
                <a href="#">Home</a>
                <a href="#">Services</a>
                <a href="#">Portfolio</a>
                <a href="#">Contact</a>
            </div>
        </div>
    </footer>
</div>
@endsection