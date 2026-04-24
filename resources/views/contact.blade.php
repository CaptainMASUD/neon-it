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
        --danger:#dc2626;
        --success:#047857;
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

    .contact-page{
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

    .contact-header{
        padding:52px 0 30px;
        position:relative;
        overflow:hidden;
    }

    .contact-header:before{
        content:"";
        position:absolute;
        width:360px;
        height:360px;
        border-radius:50%;
        background:rgba(37,99,235,0.10);
        top:-90px;
        right:-80px;
        filter:blur(12px);
    }

    .contact-header:after{
        content:"";
        position:absolute;
        width:320px;
        height:320px;
        border-radius:50%;
        background:rgba(124,58,237,0.10);
        bottom:-100px;
        left:-80px;
        filter:blur(12px);
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
        text-align:center;
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

    .contact-info{
        padding:26px 0 40px;
    }

    .contact-info-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:22px;
    }

    .info-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:28px;
        padding:30px;
        box-shadow:var(--shadow-md);
        transition:.35s ease;
        position:relative;
        overflow:hidden;
    }

    .info-card:before{
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

    .info-card:hover{
        transform:translateY(-8px);
    }

    .info-icon{
        width:62px;
        height:62px;
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

    .info-card h3{
        font-size:23px;
        margin:0 0 10px;
        position:relative;
        z-index:2;
    }

    .info-card p{
        margin:0 0 14px;
        font-size:15px;
        line-height:1.8;
        color:#475569;
        position:relative;
        z-index:2;
    }

    .info-card a,
    .info-card span{
        display:block;
        font-size:14px;
        font-weight:700;
        color:var(--primary);
        position:relative;
        z-index:2;
    }

    .contact-main{
        padding:10px 0 90px;
    }

    .contact-main-wrap{
        display:grid;
        grid-template-columns:1.05fr .95fr;
        gap:24px;
        align-items:start;
    }

    .contact-form-card,
    .contact-side-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:30px;
        padding:34px;
        box-shadow:var(--shadow-lg);
    }

    .contact-form-card h2,
    .contact-side-card h2{
        font-size:32px;
        margin:0 0 12px;
        color:var(--text);
    }

    .contact-form-card p,
    .contact-side-card p{
        margin:0 0 24px;
        font-size:15px;
        line-height:1.8;
        color:#475569;
    }

    .form-grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:18px;
    }

    .form-group{
        display:flex;
        flex-direction:column;
        gap:8px;
        margin-bottom:18px;
    }

    .form-group.full{
        grid-column:1 / -1;
    }

    .form-group label{
        font-size:14px;
        font-weight:700;
        color:#334155;
    }

    .form-control{
        width:100%;
        padding:15px 16px;
        border-radius:16px;
        border:1px solid #dbe4f0;
        background:#f8fbff;
        outline:none;
        font-size:14px;
        color:var(--text);
        transition:.3s ease;
    }

    .form-control:focus{
        border-color:#93c5fd;
        background:#fff;
        box-shadow:0 0 0 4px rgba(37,99,235,0.08);
    }

    .form-control.is-invalid{
        border-color:#fca5a5;
        background:#fff7f7;
    }

    textarea.form-control{
        min-height:150px;
        resize:vertical;
    }

    .error-text{
        font-size:13px;
        font-weight:700;
        color:var(--danger);
    }

    .side-list{
        display:grid;
        gap:14px;
        margin-bottom:24px;
    }

    .side-item{
        padding:16px 18px;
        border-radius:18px;
        background:#f8fafc;
        border:1px solid #e2e8f0;
    }

    .side-item h4{
        margin:0 0 6px;
        font-size:16px;
        color:var(--text);
    }

    .side-item p{
        margin:0;
        font-size:14px;
        color:var(--muted);
        line-height:1.7;
    }

    .contact-highlight{
        margin-top:18px;
        border-radius:24px;
        padding:24px;
        background:var(--gradient);
        color:#fff;
        position:relative;
        overflow:hidden;
    }

    .contact-highlight:before{
        content:"";
        position:absolute;
        width:150px;
        height:150px;
        right:-30px;
        top:-30px;
        border-radius:30px;
        background:rgba(255,255,255,0.10);
        transform:rotate(18deg);
    }

    .contact-highlight h3{
        position:relative;
        z-index:2;
        margin:0 0 10px;
        font-size:24px;
    }

    .contact-highlight p{
        position:relative;
        z-index:2;
        margin:0 0 18px;
        font-size:15px;
        line-height:1.8;
        color:rgba(255,255,255,0.94);
    }

    .contact-highlight ul{
        position:relative;
        z-index:2;
        margin:0;
        padding:0;
        list-style:none;
        display:grid;
        gap:10px;
    }

    .contact-highlight ul li{
        padding:10px 12px;
        border-radius:12px;
        background:rgba(255,255,255,0.10);
        font-size:14px;
        font-weight:700;
    }

    .cta-section{
        padding:0 0 92px;
    }

    .cta-card{
        background:#0f172a;
        color:#fff;
        border-radius:36px;
        padding:48px;
        position:relative;
        overflow:hidden;
        box-shadow:0 24px 60px rgba(15,23,42,0.20);
    }

    .cta-card:before{
        content:"";
        position:absolute;
        width:260px;
        height:260px;
        border-radius:50%;
        background:rgba(255,255,255,0.06);
        right:-70px;
        top:-70px;
    }

    .cta-card:after{
        content:"";
        position:absolute;
        width:180px;
        height:180px;
        border-radius:36px;
        background:rgba(255,255,255,0.05);
        left:-50px;
        bottom:-50px;
        transform:rotate(25deg);
    }

    .cta-wrap{
        position:relative;
        z-index:2;
        display:grid;
        grid-template-columns:1.1fr .9fr;
        gap:24px;
        align-items:center;
    }

    .cta-text h2{
        font-size:40px;
        line-height:1.15;
        margin:0 0 14px;
    }

    .cta-text p{
        margin:0;
        font-size:16px;
        line-height:1.85;
        max-width:620px;
        color:rgba(255,255,255,0.84);
    }

    .cta-box{
        background:rgba(255,255,255,0.06);
        border:1px solid rgba(255,255,255,0.10);
        border-radius:28px;
        padding:28px;
    }

    .cta-box h3{
        font-size:24px;
        margin:0 0 10px;
    }

    .cta-box p{
        margin:0 0 18px;
        font-size:15px;
        line-height:1.75;
        color:rgba(255,255,255,0.82);
    }

    .cta-list{
        display:grid;
        gap:12px;
        margin-bottom:20px;
    }

    .cta-list span{
        display:block;
        padding:12px 14px;
        border-radius:14px;
        background:rgba(255,255,255,0.08);
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

    .success-modal{
        position:fixed;
        inset:0;
        z-index:99999;
        display:none;
        align-items:center;
        justify-content:center;
        padding:20px;
        background:rgba(15,23,42,0.55);
        backdrop-filter:blur(8px);
    }

    .success-modal.show{
        display:flex;
    }

    .success-modal-card{
        width:100%;
        max-width:460px;
        background:#fff;
        border-radius:30px;
        padding:34px;
        text-align:center;
        position:relative;
        overflow:hidden;
        border:1px solid #e7edf6;
        box-shadow:0 30px 90px rgba(15,23,42,0.30);
        animation:successPop .35s ease;
    }

    .success-modal-card:before{
        content:"";
        position:absolute;
        width:210px;
        height:210px;
        border-radius:42px;
        background:var(--gradient-soft);
        right:-70px;
        top:-80px;
        transform:rotate(24deg);
    }

    .success-modal-card:after{
        content:"";
        position:absolute;
        width:140px;
        height:140px;
        border-radius:50%;
        background:rgba(6,182,212,0.10);
        left:-50px;
        bottom:-50px;
    }

    .success-close{
        position:absolute;
        top:18px;
        right:18px;
        width:38px;
        height:38px;
        border-radius:12px;
        border:1px solid #e2e8f0;
        background:#fff;
        color:#334155;
        font-size:22px;
        line-height:1;
        cursor:pointer;
        z-index:3;
        transition:.25s ease;
    }

    .success-close:hover{
        background:#f8fafc;
        transform:translateY(-2px);
    }

    .success-icon{
        width:82px;
        height:82px;
        margin:0 auto 20px;
        border-radius:26px;
        background:linear-gradient(135deg,#10b981,#06b6d4);
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:40px;
        font-weight:900;
        box-shadow:0 18px 36px rgba(16,185,129,0.25);
        position:relative;
        z-index:2;
    }

    .success-modal-card h2{
        margin:0 0 10px;
        font-size:30px;
        color:var(--text);
        position:relative;
        z-index:2;
    }

    .success-modal-card p{
        margin:0 auto 24px;
        color:#475569;
        font-size:15px;
        line-height:1.8;
        max-width:340px;
        position:relative;
        z-index:2;
    }

    .success-modal-actions{
        display:flex;
        justify-content:center;
        position:relative;
        z-index:2;
    }

    @keyframes successPop{
        from{
            opacity:0;
            transform:translateY(18px) scale(.96);
        }
        to{
            opacity:1;
            transform:translateY(0) scale(1);
        }
    }

    @media(max-width:1100px){
        .contact-info-grid{
            grid-template-columns:1fr;
        }

        .contact-main-wrap,
        .cta-wrap{
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

        .form-grid{
            grid-template-columns:1fr;
        }

        .contact-form-card,
        .contact-side-card{
            padding:26px 20px;
        }

        .cta-card{
            padding:34px 24px;
        }

        .cta-text h2{
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

        .success-modal-card{
            padding:30px 22px;
            border-radius:24px;
        }

        .success-modal-card h2{
            font-size:25px;
        }
    }
</style>

<div class="contact-page">

    <section class="contact-header">
        <div class="container">
            <div class="header-card">
                <div class="mini-badge">
                    <span class="dot"></span>
                    Contact Us
                </div>

                <h1>
                    Let’s talk about your <span class="gradient-text">next project</span>
                </h1>

                <p>
                    Have an idea, need a custom solution, or want to discuss branding, design, development, or growth services? Reach out to our team and let’s build something meaningful together.
                </p>

                <div class="header-actions">
                    <a href="{{ route('services') }}" class="btn btn-primary">View Services</a>
                    <a href="{{ route('about') }}" class="btn btn-secondary">About Us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-info">
        <div class="container">
            <div class="section-head">
                <span>Get In Touch</span>
                <h2>Simple ways to contact our team</h2>
                <p>
                    Choose the contact method that works best for you. We’re available for project discussions, consultations, custom service requests, and partnership opportunities.
                </p>
            </div>

            <div class="contact-info-grid">
                <div class="info-card">
                    <div class="info-icon">01</div>
                    <h3>Email Us</h3>
                    <p>Send us your project details, ideas, or questions and we’ll get back to you as soon as possible.</p>
                    <a href="mailto:hello@agencyx.com">hello@agencyx.com</a>
                </div>

                <div class="info-card">
                    <div class="info-icon">02</div>
                    <h3>Call Us</h3>
                    <p>Speak directly with our team for a faster discussion about your business goals and requirements.</p>
                    <a href="tel:+8801234567890">+880 1234 567890</a>
                </div>

                <div class="info-card">
                    <div class="info-icon">03</div>
                    <h3>Visit Office</h3>
                    <p>Meet with us for strategy sessions, creative discussions, and project planning in person.</p>
                    <span>Dhaka, Bangladesh</span>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-main">
        <div class="container">
            <div class="contact-main-wrap">

                <div class="contact-form-card">
                    <h2>Send us a message</h2>
                    <p>
                        Fill out the form below and tell us about your project, goals, and the type of solution you need.
                    </p>

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    value="{{ old('name') }}"
                                    placeholder="Enter your full name"
                                >
                                @error('name')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    value="{{ old('email') }}"
                                    placeholder="Enter your email address"
                                >
                                @error('email')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input 
                                    type="text" 
                                    id="phone" 
                                    name="phone" 
                                    class="form-control @error('phone') is-invalid @enderror" 
                                    value="{{ old('phone') }}"
                                    placeholder="Enter your phone number"
                                >
                                @error('phone')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="service">Service Needed</label>
                                <select 
                                    id="service" 
                                    name="service" 
                                    class="form-control @error('service') is-invalid @enderror"
                                >
                                    <option value="">Select a service</option>
                                    <option value="Brand Strategy" {{ old('service') == 'Brand Strategy' ? 'selected' : '' }}>Brand Strategy</option>
                                    <option value="UI/UX Design" {{ old('service') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                                    <option value="Web Development" {{ old('service') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                    <option value="SEO Services" {{ old('service') == 'SEO Services' ? 'selected' : '' }}>SEO Services</option>
                                    <option value="Performance Marketing" {{ old('service') == 'Performance Marketing' ? 'selected' : '' }}>Performance Marketing</option>
                                    <option value="Custom Solution" {{ old('service') == 'Custom Solution' ? 'selected' : '' }}>Custom Solution</option>
                                </select>
                                @error('service')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label for="subject">Subject</label>
                                <input 
                                    type="text" 
                                    id="subject" 
                                    name="subject" 
                                    class="form-control @error('subject') is-invalid @enderror" 
                                    value="{{ old('subject') }}"
                                    placeholder="Write a subject"
                                >
                                @error('subject')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label for="message">Project Details</label>
                                <textarea 
                                    id="message" 
                                    name="message" 
                                    class="form-control @error('message') is-invalid @enderror" 
                                    placeholder="Tell us about your project, goals, timeline, and what you need..."
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>

                <div class="contact-side-card">
                    <h2>Why contact us?</h2>
                    <p>
                        We help brands and businesses with premium digital solutions tailored to their needs. Whether you need a full website, branding package, or a custom growth plan, we can guide you.
                    </p>

                    <div class="side-list">
                        <div class="side-item">
                            <h4>Fast response</h4>
                            <p>We aim to reply to most inquiries within 24 hours.</p>
                        </div>

                        <div class="side-item">
                            <h4>Custom strategy</h4>
                            <p>Every project gets a tailored recommendation based on your goals.</p>
                        </div>

                        <div class="side-item">
                            <h4>Clear process</h4>
                            <p>From discovery to delivery, we keep the workflow transparent and organized.</p>
                        </div>
                    </div>

                    <div class="contact-highlight">
                        <h3>Need a custom solution?</h3>
                        <p>
                            If your project requires a mix of services, a unique workflow, or a more advanced build, we can create a custom plan for you.
                        </p>

                        <ul>
                            <li>Custom branding + website packages</li>
                            <li>Landing page and marketing funnel builds</li>
                            <li>Ongoing support and growth retainers</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-card">
                <div class="cta-wrap">
                    <div class="cta-text">
                        <h2>Ready to start your custom project?</h2>
                        <p>
                            Let us know what you’re building and what kind of support you need. We’ll help you shape the right solution for your business.
                        </p>
                    </div>

                    <div class="cta-box">
                        <h3>Contact Details</h3>
                        <p>
                            Reach out directly for consultations, project quotes, and custom service discussions.
                        </p>

                        <div class="cta-list">
                            <span>Email: hello@agencyx.com</span>
                            <span>Phone: +880 1234 567890</span>
                            <span>Available: Mon - Sat, 10 AM - 6 PM</span>
                        </div>

                        <a href="mailto:hello@agencyx.com" class="btn btn-secondary">Email Us Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer-wrap">
            <p>© 2026 AgencyX. Contact page design for a modern digital agency.</p>

            <div class="footer-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('blogs') }}">Blogs</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </div>
    </footer>
</div>

@if(session('success'))
    <div class="success-modal show" id="successModal">
        <div class="success-modal-card">
            <button type="button" class="success-close" onclick="closeSuccessModal()">×</button>

            <div class="success-icon">✓</div>

            <h2>Message Sent!</h2>

            <p>
                {{ session('success') }}
            </p>

            <div class="success-modal-actions">
                <button type="button" class="btn btn-primary" onclick="closeSuccessModal()">
                    Okay, Got It
                </button>
            </div>
        </div>
    </div>
@endif

<script>
    function closeSuccessModal() {
        const modal = document.getElementById('successModal');

        if (modal) {
            modal.classList.remove('show');
        }
    }

    document.addEventListener('click', function(event) {
        const modal = document.getElementById('successModal');

        if (modal && event.target === modal) {
            closeSuccessModal();
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeSuccessModal();
        }
    });
</script>
@endsection