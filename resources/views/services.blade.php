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

    .services-page{
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
        max-width:720px;
        margin:auto;
        color:#475569;
        font-size:16px;
        line-height:1.8;
    }

    .services-header{
        padding:52px 0 30px;
        position:relative;
        overflow:hidden;
    }

    .services-header:before{
        content:"";
        position:absolute;
        width:340px;
        height:340px;
        border-radius:50%;
        background:rgba(37,99,235,0.10);
        top:-80px;
        right:-80px;
        filter:blur(10px);
    }

    .services-header:after{
        content:"";
        position:absolute;
        width:300px;
        height:300px;
        border-radius:50%;
        background:rgba(124,58,237,0.10);
        bottom:-80px;
        left:-80px;
        filter:blur(10px);
    }

    .header-card{
        position:relative;
        z-index:2;
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:34px;
        padding:48px;
        box-shadow:var(--shadow-lg);
        overflow:hidden;
    }

    .header-card:before{
        content:"";
        position:absolute;
        width:220px;
        height:220px;
        right:-50px;
        top:-50px;
        border-radius:40px;
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

    .header-card h1{
        font-size:58px;
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

    .header-card p{
        max-width:760px;
        font-size:17px;
        line-height:1.9;
        color:#475569;
        margin:0 auto 26px;
        position:relative;
        z-index:2;
    }

    .header-actions{
        display:flex;
        gap:14px;
        justify-content:center;
        flex-wrap:wrap;
        position:relative;
        z-index:2;
    }

    .services-section{
        padding:26px 0 88px;
    }

    .services-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:22px;
    }

    .service-card{
        background:#fff;
        border:1px solid #e6edf6;
        border-radius:28px;
        padding:30px;
        box-shadow:var(--shadow-md);
        transition:.35s ease;
        position:relative;
        overflow:hidden;
    }

    .service-card:before{
        content:"";
        position:absolute;
        width:120px;
        height:120px;
        right:-25px;
        bottom:-25px;
        border-radius:28px;
        background:var(--gradient-soft);
        transform:rotate(18deg);
    }

    .service-card:hover{
        transform:translateY(-10px);
    }

    .service-icon{
        width:62px;
        height:62px;
        border-radius:18px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:21px;
        font-weight:800;
        background:var(--gradient);
        margin-bottom:18px;
        position:relative;
        z-index:2;
    }

    .service-card h3{
        font-size:23px;
        margin:0 0 10px;
        position:relative;
        z-index:2;
    }

    .service-card p{
        margin:0 0 18px;
        font-size:15px;
        line-height:1.8;
        color:#475569;
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
        padding:10px 12px;
        border-radius:13px;
        background:#f8fafc;
        border:1px solid #e2e8f0;
        color:#334155;
        font-size:13px;
        font-weight:700;
    }

    .service-bottom{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:14px;
        margin-top:20px;
        position:relative;
        z-index:2;
        flex-wrap:wrap;
    }

    .service-bottom small{
        font-size:13px;
        color:var(--primary);
        font-weight:700;
    }

    .process-strip{
        padding:0 0 88px;
    }

    .process-box{
        background:#0f172a;
        border-radius:34px;
        padding:34px;
        box-shadow:0 24px 55px rgba(15,23,42,0.18);
    }

    .process-grid{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:18px;
    }

    .process-card{
        background:rgba(255,255,255,0.05);
        border:1px solid rgba(255,255,255,0.08);
        border-radius:22px;
        padding:24px;
        color:#fff;
    }

    .process-card strong{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        width:48px;
        height:48px;
        border-radius:14px;
        background:rgba(255,255,255,0.10);
        font-size:18px;
        margin-bottom:14px;
    }

    .process-card h4{
        font-size:20px;
        margin:0 0 8px;
    }

    .process-card p{
        margin:0;
        color:rgba(255,255,255,0.74);
        line-height:1.7;
        font-size:14px;
    }

    .custom-solution{
        padding:0 0 92px;
    }

    .custom-card{
        background:var(--gradient);
        color:#fff;
        border-radius:36px;
        padding:50px;
        position:relative;
        overflow:hidden;
        box-shadow:0 24px 60px rgba(37,99,235,0.24);
    }

    .custom-card:before{
        content:"";
        position:absolute;
        width:260px;
        height:260px;
        border-radius:50%;
        background:rgba(255,255,255,0.10);
        right:-70px;
        top:-70px;
    }

    .custom-card:after{
        content:"";
        position:absolute;
        width:180px;
        height:180px;
        border-radius:36px;
        background:rgba(255,255,255,0.08);
        left:-50px;
        bottom:-50px;
        transform:rotate(25deg);
    }

    .custom-wrap{
        position:relative;
        z-index:2;
        display:grid;
        grid-template-columns:1.1fr .9fr;
        gap:26px;
        align-items:center;
    }

    .custom-text h2{
        font-size:42px;
        line-height:1.15;
        margin:0 0 14px;
    }

    .custom-text p{
        margin:0 0 24px;
        font-size:16px;
        line-height:1.85;
        max-width:620px;
        opacity:.96;
    }

    .custom-points{
        display:grid;
        gap:12px;
    }

    .custom-points span{
        display:flex;
        align-items:center;
        gap:10px;
        font-size:14px;
        font-weight:700;
        padding:12px 14px;
        border-radius:14px;
        background:rgba(255,255,255,0.10);
        border:1px solid rgba(255,255,255,0.12);
    }

    .custom-points span i{
        width:24px;
        height:24px;
        border-radius:50%;
        background:rgba(255,255,255,0.18);
        display:flex;
        align-items:center;
        justify-content:center;
        font-style:normal;
        font-size:12px;
    }

    .contact-panel{
        background:rgba(255,255,255,0.12);
        border:1px solid rgba(255,255,255,0.16);
        border-radius:28px;
        padding:28px;
        backdrop-filter:blur(8px);
    }

    .contact-panel h3{
        font-size:24px;
        margin:0 0 12px;
    }

    .contact-panel p{
        margin:0 0 18px;
        font-size:15px;
        line-height:1.8;
        opacity:.95;
    }

    .contact-list{
        display:grid;
        gap:12px;
        margin-bottom:22px;
    }

    .contact-list span{
        display:block;
        padding:12px 14px;
        border-radius:14px;
        background:rgba(255,255,255,0.10);
        font-size:14px;
        font-weight:700;
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
        .services-grid{
            grid-template-columns:1fr 1fr;
        }

        .process-grid{
            grid-template-columns:1fr 1fr;
        }

        .custom-wrap{
            grid-template-columns:1fr;
        }
    }

    @media(max-width:768px){
        .header-card{
            padding:34px 22px;
        }

        .header-card h1{
            font-size:40px;
            letter-spacing:-1px;
        }

        .section-head h2{
            font-size:32px;
        }

        .services-grid,
        .process-grid{
            grid-template-columns:1fr;
        }

        .custom-card{
            padding:34px 24px;
        }

        .custom-text h2{
            font-size:30px;
        }
    }

    @media(max-width:520px){
        .header-actions{
            flex-direction:column;
            align-items:stretch;
        }

        .btn{
            width:100%;
        }
    }
</style>

<div class="services-page">

    <section class="services-header">
        <div class="container">
            <div class="header-card text-center">
                <div class="mini-badge">
                    <span class="dot"></span>
                    Our Services
                </div>

                <h1>
                    Premium <span class="gradient-text">services designed</span><br>
                    to help your brand grow
                </h1>

                <p>
                    We offer modern digital services that combine strategy, creative design, development, and growth execution. Each service is built to help your business look stronger, communicate better, and convert more effectively online.
                </p>

                <div class="header-actions">
                    <a href="{{ route('contact') }}" class="btn btn-primary">Start a Project</a>
                    <a href="{{ route('about') }}" class="btn btn-secondary">Learn About Us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section">
        <div class="container">
            <div class="section-head">
                <span>Service Cards</span>
                <h2>What we can do for your business</h2>
                <p>
                    From branding and websites to optimization and long-term support, our service blocks are designed to clearly communicate value and help visitors understand what the agency offers.
                </p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">01</div>
                    <h3>Brand Strategy</h3>
                    <p>
                        We help define your brand direction, positioning, messaging, and identity so your business feels more professional, memorable, and aligned.
                    </p>
                    <div class="service-list">
                        <span>Brand Positioning</span>
                        <span>Identity Direction</span>
                        <span>Messaging Framework</span>
                    </div>
                    <div class="service-bottom">
                        <small>Strategic Foundation</small>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">02</div>
                    <h3>UI/UX Design</h3>
                    <p>
                        We create polished digital interfaces with stronger visual hierarchy, cleaner user flow, and more premium presentation across all screen sizes.
                    </p>
                    <div class="service-list">
                        <span>Website Interface Design</span>
                        <span>Landing Page UI</span>
                        <span>User Experience Planning</span>
                    </div>
                    <div class="service-bottom">
                        <small>Modern Experience</small>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">03</div>
                    <h3>Web Development</h3>
                    <p>
                        Responsive and scalable web development focused on clean structure, smooth performance, and seamless implementation of premium UI designs.
                    </p>
                    <div class="service-list">
                        <span>Laravel / PHP Development</span>
                        <span>Responsive Front-End</span>
                        <span>Custom Integrations</span>
                    </div>
                    <div class="service-bottom">
                        <small>Clean Build Quality</small>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">04</div>
                    <h3>SEO Services</h3>
                    <p>
                        Improve search visibility with stronger content structure, technical optimization, and strategic on-page improvements that support long-term organic growth.
                    </p>
                    <div class="service-list">
                        <span>On-Page SEO</span>
                        <span>Technical SEO Audit</span>
                        <span>Content Structuring</span>
                    </div>
                    <div class="service-bottom">
                        <small>Organic Visibility</small>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">05</div>
                    <h3>Performance Marketing</h3>
                    <p>
                        Campaign planning and funnel optimization designed to attract better leads, increase conversions, and make ad spend more effective.
                    </p>
                    <div class="service-list">
                        <span>Ad Funnel Strategy</span>
                        <span>Conversion Optimization</span>
                        <span>Analytics & Tracking</span>
                    </div>
                    <div class="service-bottom">
                        <small>Growth-Focused Execution</small>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">06</div>
                    <h3>Maintenance & Support</h3>
                    <p>
                        Ongoing updates, improvements, and support services to keep your website secure, relevant, optimized, and ready for future growth.
                    </p>
                    <div class="service-list">
                        <span>Website Maintenance</span>
                        <span>Performance Improvements</span>
                        <span>Long-Term Support</span>
                    </div>
                    <div class="service-bottom">
                        <small>Ongoing Reliability</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="process-strip">
        <div class="container">
            <div class="process-box">
                <div class="process-grid">
                    <div class="process-card">
                        <strong>01</strong>
                        <h4>Discover</h4>
                        <p>We learn about your business, goals, audience, and the opportunities that matter most.</p>
                    </div>

                    <div class="process-card">
                        <strong>02</strong>
                        <h4>Plan</h4>
                        <p>We map out the strategy, service scope, priorities, and project direction before execution.</p>
                    </div>

                    <div class="process-card">
                        <strong>03</strong>
                        <h4>Create</h4>
                        <p>We design and build polished solutions that combine aesthetics, usability, and performance.</p>
                    </div>

                    <div class="process-card">
                        <strong>04</strong>
                        <h4>Optimize</h4>
                        <p>We refine, improve, and support the final product so it keeps delivering stronger results.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="custom-solution">
        <div class="container">
            <div class="custom-card">
                <div class="custom-wrap">
                    <div class="custom-text">
                        <h2>Need a custom solution for your business?</h2>
                        <p>
                            Not every project fits into a standard package. If you need a tailored combination of branding, design, development, SEO, or marketing support, we can build a custom service plan around your exact goals.
                        </p>

                        <div class="custom-points">
                            <span><i>✓</i> Custom strategy based on your business needs</span>
                            <span><i>✓</i> Flexible scope for startups, agencies, and growing brands</span>
                            <span><i>✓</i> Clear communication, timeline, and delivery plan</span>
                        </div>
                    </div>

                    <div class="contact-panel">
                        <h3>Contact Us For Custom Solutions</h3>
                        <p>
                            Tell us what you need, what stage your business is in, and what kind of outcome you want. We will help you choose the right solution.
                        </p>

                        <div class="contact-list">
                            <span>Email: hello@agencyx.com</span>
                            <span>Phone: +880 1234 567890</span>
                            <span>Response Time: Within 24 Hours</span>
                        </div>

                        <a href="{{ route('contact') }}" class="btn btn-secondary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer-wrap">
            <p>© 2026 AgencyX. Services page design for a modern digital agency.</p>

            <div class="footer-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </div>
    </footer>
</div>
@endsection