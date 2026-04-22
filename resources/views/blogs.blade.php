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

    .blogs-page{
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

    .blogs-header{
        padding:52px 0 30px;
        position:relative;
        overflow:hidden;
    }

    .blogs-header:before{
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

    .blogs-header:after{
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

    .blogs-section{
        padding:26px 0 90px;
    }

    .blogs-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:24px;
    }

    .blog-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:28px;
        overflow:hidden;
        box-shadow:var(--shadow-md);
        transition:.35s ease;
    }

    .blog-card:hover{
        transform:translateY(-10px);
    }

    .blog-image{
        position:relative;
        height:250px;
        overflow:hidden;
        background:#eef2f7;
    }

    .blog-image img{
        width:100%;
        height:100%;
        object-fit:cover;
        display:block;
        transition:.45s ease;
    }

    .blog-card:hover .blog-image img{
        transform:scale(1.06);
    }

    .blog-badge{
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

    .blog-content{
        padding:24px;
    }

    .blog-meta-top{
        display:flex;
        flex-wrap:wrap;
        gap:10px;
        margin-bottom:14px;
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

    .blog-content h3{
        font-size:23px;
        line-height:1.35;
        margin:0 0 12px;
        color:var(--text);
    }

    .blog-content p{
        font-size:15px;
        color:#475569;
        line-height:1.8;
        margin:0 0 20px;
    }

    .blog-footer{
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:14px;
        flex-wrap:wrap;
        padding-top:18px;
        border-top:1px solid #e9eef7;
    }

    .read-time strong{
        display:block;
        font-size:13px;
        color:var(--primary);
        margin-bottom:4px;
    }

    .read-time span{
        font-size:12px;
        color:var(--muted);
    }

    .empty-state{
        grid-column:1/-1;
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:28px;
        padding:50px 24px;
        text-align:center;
        box-shadow:var(--shadow-md);
    }

    .empty-state h3{
        font-size:28px;
        margin-bottom:10px;
    }

    .empty-state p{
        color:#64748b;
        line-height:1.8;
        max-width:620px;
        margin:0 auto 20px;
    }

    .newsletter{
        padding:0 0 92px;
    }

    .newsletter-card{
        background:var(--gradient);
        color:#fff;
        border-radius:36px;
        padding:48px;
        position:relative;
        overflow:hidden;
        box-shadow:0 24px 60px rgba(37,99,235,0.24);
    }

    .newsletter-card:before{
        content:"";
        position:absolute;
        width:260px;
        height:260px;
        border-radius:50%;
        background:rgba(255,255,255,0.10);
        right:-70px;
        top:-70px;
    }

    .newsletter-card:after{
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

    .newsletter-wrap{
        position:relative;
        z-index:2;
        display:grid;
        grid-template-columns:1.1fr .9fr;
        gap:24px;
        align-items:center;
    }

    .newsletter-text h2{
        font-size:40px;
        line-height:1.15;
        margin:0 0 14px;
    }

    .newsletter-text p{
        margin:0;
        font-size:16px;
        line-height:1.85;
        max-width:620px;
        opacity:.96;
    }

    .newsletter-box{
        background:rgba(255,255,255,0.12);
        border:1px solid rgba(255,255,255,0.16);
        border-radius:28px;
        padding:28px;
        backdrop-filter:blur(8px);
    }

    .newsletter-box h3{
        font-size:24px;
        margin:0 0 10px;
    }

    .newsletter-box p{
        margin:0 0 18px;
        font-size:15px;
        line-height:1.75;
        opacity:.95;
    }

    .newsletter-list{
        display:grid;
        gap:12px;
        margin-bottom:20px;
    }

    .newsletter-list span{
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
        .blogs-grid{
            grid-template-columns:1fr 1fr;
        }

        .newsletter-wrap{
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

        .blogs-grid{
            grid-template-columns:1fr;
        }

        .newsletter-card{
            padding:34px 24px;
        }

        .newsletter-text h2{
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

<div class="blogs-page">

    <section class="blogs-header">
        <div class="container">
            <div class="header-card">
                <div class="mini-badge">
                    <span class="dot"></span>
                    Agency Blog
                </div>

                <h1>
                    Insights, ideas, and <span class="gradient-text">latest blogs</span><br>
                    from our creative team
                </h1>

                <p>
                    Explore our latest blog articles on design, branding, development, and growth. Discover useful content presented in a clean and modern layout.
                </p>

                <div class="header-actions">
                    <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
                    <a href="{{ route('services') }}" class="btn btn-secondary">Our Services</a>
                </div>
            </div>
        </div>
    </section>

    <section class="blogs-section">
        <div class="container">
            <div class="section-head">
                <span>Latest Articles</span>
                <h2>Read our newest blog posts</h2>
                <p>
                    Browse featured posts with rich images, clear headlines, short previews, and direct links to the full article details page.
                </p>
            </div>

            <div class="blogs-grid">
                @forelse($blogs as $blog)
                    <div class="blog-card">
                        <div class="blog-image">
                            @if($blog->image)
                                <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                            @else
                                <img src="https://via.placeholder.com/1200x800/f1f5f9/64748b?text=Blog+Image" alt="{{ $blog->title }}">
                            @endif
                            <div class="blog-badge">Blog Post</div>
                        </div>

                        <div class="blog-content">
                            <div class="blog-meta-top">
                                <span class="meta-pill">{{ $blog->created_at->format('F d, Y') }}</span>
                                <span class="meta-pill">By {{ $blog->user->name ?? 'Admin' }}</span>
                            </div>

                            <h3>{{ $blog->title }}</h3>

                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 140) }}
                            </p>

                            <div class="blog-footer">
                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Read Full Article</a>

                                <div class="read-time">
                                    <strong>{{ max(1, str_word_count(strip_tags($blog->description)) > 0 ? ceil(str_word_count(strip_tags($blog->description)) / 200) : 1) }} Min Read</strong>
                                    <span>Published {{ $blog->created_at->format('h:i A') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <h3>No blogs available yet</h3>
                        <p>
                            Blog posts will appear here once they are published from the admin dashboard.
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="newsletter">
        <div class="container">
            <div class="newsletter-card">
                <div class="newsletter-wrap">
                    <div class="newsletter-text">
                        <h2>Want more updates from our blog?</h2>
                        <p>
                            Stay connected for the latest articles on branding, design, development, digital growth, and agency insights.
                        </p>
                    </div>

                    <div class="newsletter-box">
                        <h3>Contact & Updates</h3>
                        <p>
                            Reach out for collaboration, article inquiries, or custom content requests from our team.
                        </p>

                        <div class="newsletter-list">
                            <span>Email: hello@agencyx.com</span>
                            <span>Phone: +880 1234 567890</span>
                            <span>Available: Mon - Sat, 10 AM - 6 PM</span>
                        </div>

                        <a href="{{ route('contact') }}" class="btn btn-secondary">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer-wrap">
            <p>© 2026 Portfolix. Modern blog page for your digital agency.</p>

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
@endsection