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
        --danger:#dc2626;
        --success:#16a34a;
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

    .auth-page{
        min-height:100vh;
        padding:60px 0;
        position:relative;
        overflow:hidden;
    }

    .auth-page:before{
        content:"";
        position:absolute;
        width:360px;
        height:360px;
        border-radius:50%;
        background:rgba(37,99,235,0.12);
        top:-80px;
        left:-80px;
        filter:blur(12px);
    }

    .auth-page:after{
        content:"";
        position:absolute;
        width:320px;
        height:320px;
        border-radius:50%;
        background:rgba(124,58,237,0.10);
        bottom:-100px;
        right:-80px;
        filter:blur(12px);
    }

    .auth-wrap{
        position:relative;
        z-index:2;
        display:grid;
        grid-template-columns:1.02fr .98fr;
        gap:28px;
        align-items:center;
    }

    .auth-showcase{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:34px;
        padding:42px;
        box-shadow:var(--shadow-lg);
        position:relative;
        overflow:hidden;
    }

    .auth-showcase:before{
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

    .auth-showcase h1{
        font-size:54px;
        line-height:1.04;
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

    .auth-showcase p{
        margin:0 0 26px;
        max-width:600px;
        color:#475569;
        font-size:17px;
        line-height:1.9;
        position:relative;
        z-index:2;
    }

    .showcase-points{
        display:grid;
        gap:14px;
        position:relative;
        z-index:2;
    }

    .showcase-points span{
        display:flex;
        align-items:center;
        gap:12px;
        padding:14px 16px;
        border-radius:16px;
        background:#f8fbff;
        border:1px solid #e2e8f0;
        color:#334155;
        font-size:14px;
        font-weight:700;
    }

    .showcase-points span i{
        width:28px;
        height:28px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        background:var(--gradient-soft);
        color:var(--primary);
        font-style:normal;
        font-size:14px;
        font-weight:800;
    }

    .auth-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:34px;
        padding:38px;
        box-shadow:var(--shadow-lg);
    }

    .auth-card h2{
        font-size:34px;
        margin:0 0 10px;
        color:var(--text);
    }

    .auth-card .subtext{
        margin:0 0 24px;
        color:#64748b;
        font-size:15px;
        line-height:1.8;
    }

    .alert{
        padding:14px 16px;
        border-radius:14px;
        margin-bottom:18px;
        font-size:14px;
        font-weight:600;
    }

    .alert-danger{
        background:#fef2f2;
        color:var(--danger);
        border:1px solid #fecaca;
    }

    .alert-success{
        background:#f0fdf4;
        color:var(--success);
        border:1px solid #bbf7d0;
    }

    .form-group{
        margin-bottom:18px;
    }

    .form-group label{
        display:block;
        margin-bottom:8px;
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
        background:#fff;
    }

    .error-text{
        margin-top:8px;
        color:#dc2626;
        font-size:13px;
        font-weight:600;
    }

    .form-row{
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:14px;
        flex-wrap:wrap;
        margin-bottom:22px;
    }

    .check-wrap{
        display:flex;
        align-items:center;
        gap:10px;
        color:#475569;
        font-size:14px;
    }

    .check-wrap input{
        accent-color:#2563eb;
    }

    .forgot-link{
        font-size:14px;
        font-weight:700;
        color:var(--primary);
    }

    .btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        width:100%;
        padding:15px 22px;
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

    .auth-footer{
        text-align:center;
        margin-top:18px;
        font-size:14px;
        color:#64748b;
    }

    .auth-footer a{
        color:var(--primary);
        font-weight:700;
    }

    @media(max-width:1100px){
        .auth-wrap{
            grid-template-columns:1fr;
        }
    }

    @media(max-width:768px){
        .auth-page{
            padding:34px 0;
        }

        .auth-showcase,
        .auth-card{
            padding:28px 20px;
        }

        .auth-showcase h1{
            font-size:38px;
            letter-spacing:-1px;
        }

        .auth-card h2{
            font-size:28px;
        }
    }
</style>

<div class="auth-page">
    <div class="container auth-wrap">
        <div class="auth-showcase">
            <div class="mini-badge">
                <span class="dot"></span>
                Welcome Back
            </div>

            <h1>
                Sign in and manage your <span class="gradient-text">digital workspace</span>
            </h1>

            <p>
                Access your account to manage portfolios, explore services, publish content, and keep your brand presence moving forward with a polished platform experience.
            </p>

            <div class="showcase-points">
                <span><i>✓</i> Secure login experience with clean modern UI</span>
                <span><i>✓</i> Manage your projects, content, and brand pages</span>
                <span><i>✓</i> Faster access to your account dashboard</span>
            </div>
        </div>

        <div class="auth-card">
            <h2>Login</h2>
            <p class="subtext">Enter your email and password to access your account.</p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->has('login'))
                <div class="alert alert-danger">
                    {{ $errors->first('login') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                        placeholder="Enter your email"
                    >
                    @error('email')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    >
                    @error('password')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <label class="check-wrap" for="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    Sign In
                </button>
            </form>

            <div class="auth-footer">
                Don’t have an account?
                <a href="{{ route('register') }}">Create one</a>
            </div>
        </div>
    </div>
</div>
@endsection