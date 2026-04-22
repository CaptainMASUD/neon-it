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

    .blog-details-page{
        padding:50px 0 90px;
        position:relative;
        overflow:hidden;
    }

    .blog-details-page:before{
        content:"";
        position:absolute;
        width:360px;
        height:360px;
        border-radius:50%;
        background:rgba(37,99,235,0.10);
        top:-100px;
        right:-80px;
        filter:blur(14px);
    }

    .blog-details-page:after{
        content:"";
        position:absolute;
        width:320px;
        height:320px;
        border-radius:50%;
        background:rgba(124,58,237,0.10);
        bottom:-100px;
        left:-80px;
        filter:blur(14px);
    }

    .details-wrap{
        position:relative;
        z-index:2;
        max-width:980px;
        margin:0 auto;
    }

    .back-link{
        display:inline-flex;
        align-items:center;
        gap:10px;
        margin-bottom:24px;
        padding:12px 16px;
        border-radius:999px;
        background:#fff;
        border:1px solid #e7edf6;
        color:#334155;
        font-size:14px;
        font-weight:700;
        box-shadow:var(--shadow-sm);
    }

    .back-link:hover{
        transform:translateY(-2px);
    }

    .article-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:34px;
        overflow:hidden;
        box-shadow:var(--shadow-lg);
    }

    .article-hero{
        position:relative;
        height:430px;
        background:#eef2f7;
    }

    .article-hero img{
        width:100%;
        height:100%;
        object-fit:cover;
        display:block;
    }

    .article-overlay{
        position:absolute;
        inset:0;
        background:linear-gradient(to top, rgba(15,23,42,0.72), rgba(15,23,42,0.12), rgba(15,23,42,0.05));
    }

    .article-top-badge{
        position:absolute;
        top:24px;
        left:24px;
        z-index:2;
        display:inline-flex;
        align-items:center;
        gap:10px;
        padding:10px 14px;
        border-radius:999px;
        background:rgba(255,255,255,0.18);
        color:#fff;
        backdrop-filter:blur(10px);
        font-size:13px;
        font-weight:700;
    }

    .article-header{
        position:absolute;
        left:0;
        right:0;
        bottom:0;
        z-index:2;
        padding:34px;
        color:#fff;
    }

    .article-meta{
        display:flex;
        flex-wrap:wrap;
        gap:12px;
        margin-bottom:14px;
    }

    .article-meta span{
        display:inline-flex;
        align-items:center;
        padding:9px 14px;
        border-radius:999px;
        background:rgba(255,255,255,0.14);
        backdrop-filter:blur(10px);
        font-size:13px;
        font-weight:700;
    }

    .article-header h1{
        font-size:46px;
        line-height:1.12;
        letter-spacing:-1.4px;
        margin:0;
        max-width:820px;
    }

    .article-body{
        padding:38px;
    }

    .article-intro{
        font-size:18px;
        line-height:1.9;
        color:#334155;
        margin-bottom:26px;
        padding:22px 24px;
        background:#f8fbff;
        border:1px solid #e2e8f0;
        border-radius:22px;
    }

    .article-content{
        color:#334155;
        font-size:16px;
        line-height:2;
    }

    .article-content p{
        margin:0 0 18px;
    }

    .article-bottom{
        margin-top:34px;
        padding-top:24px;
        border-top:1px solid #e9eef7;
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:16px;
        flex-wrap:wrap;
    }

    .author-box{
        display:flex;
        align-items:center;
        gap:14px;
    }

    .author-avatar{
        width:52px;
        height:52px;
        border-radius:50%;
        background:var(--gradient);
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:18px;
        font-weight:800;
        box-shadow:var(--shadow-sm);
    }

    .author-info h4{
        margin:0 0 4px;
        font-size:16px;
        color:var(--text);
    }

    .author-info span{
        color:var(--muted);
        font-size:13px;
    }

    .share-box{
        display:flex;
        gap:10px;
        flex-wrap:wrap;
    }

    .share-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:11px 16px;
        border-radius:12px;
        border:1px solid #e2e8f0;
        background:#fff;
        color:#334155;
        font-size:14px;
        font-weight:700;
        box-shadow:var(--shadow-sm);
    }

    .share-btn:hover{
        transform:translateY(-2px);
    }

    @media(max-width:768px){
        .blog-details-page{
            padding:34px 0 70px;
        }

        .article-hero{
            height:320px;
        }

        .article-header{
            padding:24px 20px;
        }

        .article-header h1{
            font-size:31px;
            letter-spacing:-0.8px;
        }

        .article-body{
            padding:26px 20px;
        }

        .article-intro{
            font-size:16px;
            padding:18px;
        }
    }
</style>

<div class="blog-details-page">
    <div class="container">
        <div class="details-wrap">
            <a href="{{ route('blogs') }}" class="back-link">← Back to Blogs</a>

            <article class="article-card">
                <div class="article-hero">
                    @if($blog->image)
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                    @else
                        <img src="https://via.placeholder.com/1400x900/f1f5f9/64748b?text=Blog+Image" alt="{{ $blog->title }}">
                    @endif

                    <div class="article-overlay"></div>

                    <div class="article-top-badge">
                        Featured Article
                    </div>

                    <div class="article-header">
                        <div class="article-meta">
                            <span>{{ $blog->created_at->format('F d, Y') }}</span>
                            <span>By {{ $blog->user->name ?? 'Admin' }}</span>
                            <span>{{ max(1, str_word_count(strip_tags($blog->description)) > 0 ? ceil(str_word_count(strip_tags($blog->description)) / 200) : 1) }} Min Read</span>
                        </div>

                        <h1>{{ $blog->title }}</h1>
                    </div>
                </div>

                <div class="article-body">
                    <div class="article-intro">
                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 180) }}
                    </div>

                    <div class="article-content">
                        {!! nl2br(e($blog->description)) !!}
                    </div>

                    <div class="article-bottom">
                        <div class="author-box">
                            <div class="author-avatar">
                                {{ strtoupper(substr($blog->user->name ?? 'A', 0, 1)) }}
                            </div>
                            <div class="author-info">
                                <h4>{{ $blog->user->name ?? 'Admin' }}</h4>
                                <span>Article Author</span>
                            </div>
                        </div>

                        <div class="share-box">
                            <a href="{{ route('blogs') }}" class="share-btn">More Blogs</a>
                            <a href="{{ route('contact') }}" class="share-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection