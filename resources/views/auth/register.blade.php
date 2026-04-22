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
        right:-80px;
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
        left:-80px;
        filter:blur(12px);
    }

    .auth-wrap{
        position:relative;
        z-index:2;
        display:grid;
        grid-template-columns:.98fr 1.02fr;
        gap:28px;
        align-items:center;
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

    .form-grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:16px;
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

    .check-wrap{
        display:flex;
        align-items:flex-start;
        gap:10px;
        color:#475569;
        font-size:14px;
        line-height:1.6;
        margin-bottom:22px;
    }

    .check-wrap input{
        margin-top:3px;
        accent-color:#2563eb;
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

    .showcase-stats{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:14px;
        position:relative;
        z-index:2;
    }

    .stat-card{
        background:#f8fbff;
        border:1px solid #e2e8f0;
        border-radius:18px;
        padding:18px;
    }

    .stat-card h3{
        margin:0 0 6px;
        font-size:24px;
        color:#0f172a;
    }

    .stat-card p{
        margin:0;
        font-size:13px;
        line-height:1.6;
        color:#64748b;
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

        .form-grid,
        .showcase-stats{
            grid-template-columns:1fr;
        }
    }
</style>

<div class="auth-page">
    <div class="container auth-wrap">
        <div class="auth-card">
            <h2>Create Account</h2>
            <p class="subtext">Register your account to get started with your portfolio and agency workspace.</p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->has('register'))
                <div class="alert alert-danger">
                    {{ $errors->first('register') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input
                            id="name"
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus
                            placeholder="Enter your full name"
                        >
                        @error('name')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

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
                            autocomplete="new-password"
                            placeholder="Create a password"
                        >
                        @error('password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input
                            id="password_confirmation"
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password"
                        >
                    </div>
                </div>

                <label class="check-wrap" for="terms">
                    <input type="checkbox" id="terms" required>
                    I agree to the terms, privacy policy, and platform guidelines.
                </label>

                <button type="submit" class="btn btn-primary">
                    Create Account
                </button>
            </form>

            <div class="auth-footer">
                Already have an account?
                <a href="{{ route('login') }}">Sign in</a>
            </div>
        </div>

        <div class="auth-showcase">
            <div class="mini-badge">
                <span class="dot"></span>
                Join The Platform
            </div>

            <h1>
                Create your account and start building a <span class="gradient-text">stronger digital presence</span>
            </h1>

            <p>
                Register to access premium layouts, manage your pages, publish content, and build a polished online identity with a clean and modern user experience.
            </p>

            <div class="showcase-stats">
                <div class="stat-card">
                    <h3>Easy</h3>
                    <p>Simple onboarding with a clean registration flow.</p>
                </div>
                <div class="stat-card">
                    <h3>Fast</h3>
                    <p>Create your account and get started in minutes.</p>
                </div>
                <div class="stat-card">
                    <h3>Secure</h3>
                    <p>Modern account access experience for your workspace.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection