@extends('layouts.app')

@section('content')
<style>
    :root{
        --bg:#f5f7fb;
        --text:#0f172a;
        --muted:#64748b;
        --primary:#2563eb;
        --secondary:#7c3aed;
        --accent:#06b6d4;
        --gradient:linear-gradient(135deg,#2563eb 0%,#7c3aed 55%,#06b6d4 100%);
        --shadow-lg:0 25px 60px rgba(15,23,42,0.12);
    }

    body{
        background:var(--bg);
    }

    .success-page{
        min-height:100vh;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:60px 0;
        position:relative;
        overflow:hidden;
    }

    .success-page:before{
        content:"";
        position:absolute;
        width:420px;
        height:420px;
        border-radius:50%;
        background:rgba(37,99,235,0.12);
        top:-120px;
        left:-120px;
        filter:blur(16px);
    }

    .success-page:after{
        content:"";
        position:absolute;
        width:360px;
        height:360px;
        border-radius:50%;
        background:rgba(124,58,237,0.12);
        right:-120px;
        bottom:-120px;
        filter:blur(16px);
    }

    .success-card{
        position:relative;
        z-index:2;
        width:min(720px, 100%);
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:34px;
        padding:48px;
        text-align:center;
        box-shadow:var(--shadow-lg);
    }

    .success-icon{
        width:110px;
        height:110px;
        border-radius:50%;
        background:var(--gradient);
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:48px;
        font-weight:900;
        margin:0 auto 24px;
        box-shadow:0 20px 40px rgba(37,99,235,0.22);
        animation:successPop .7s ease forwards;
    }

    @keyframes successPop{
        0%{
            transform:scale(.4);
            opacity:0;
        }
        70%{
            transform:scale(1.1);
            opacity:1;
        }
        100%{
            transform:scale(1);
            opacity:1;
        }
    }

    .success-card h1{
        font-size:40px;
        margin:0 0 14px;
        color:#0f172a;
    }

    .success-card p{
        color:#64748b;
        font-size:16px;
        line-height:1.8;
        max-width:560px;
        margin:0 auto 28px;
    }

    .success-steps{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:14px;
        margin:30px 0;
    }

    .success-step{
        background:#f8fbff;
        border:1px solid #e2e8f0;
        border-radius:18px;
        padding:18px;
    }

    .success-step strong{
        display:block;
        color:#0f172a;
        margin-bottom:6px;
        font-size:15px;
    }

    .success-step span{
        color:#64748b;
        font-size:13px;
        line-height:1.6;
    }

    .btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        padding:15px 24px;
        border-radius:14px;
        font-weight:800;
        text-decoration:none;
        transition:all .3s ease;
    }

    .btn-primary{
        background:var(--gradient);
        color:#fff;
        box-shadow:0 12px 30px rgba(37,99,235,0.22);
    }

    .btn-primary:hover{
        transform:translateY(-3px);
    }

    @media(max-width:768px){
        .success-card{
            padding:34px 20px;
        }

        .success-card h1{
            font-size:30px;
        }

        .success-steps{
            grid-template-columns:1fr;
        }
    }
</style>

<div class="success-page">
    <div class="container">
        <div class="success-card">
            <div class="success-icon">✓</div>

            <h1>Your Request Has Been Sent</h1>

            <p>
                Our sales team will contact you soon using your submitted phone number and logged-in email address.
            </p>

            <div class="success-steps">
                <div class="success-step">
                    <strong>Request Sent</strong>
                    <span>Your package request is now pending review.</span>
                </div>

                <div class="success-step">
                    <strong>Sales Contact</strong>
                    <span>Our team will reach out to confirm the details.</span>
                </div>

                <div class="success-step">
                    <strong>Plan Activation</strong>
                    <span>Admin will activate your plan after confirmation.</span>
                </div>
            </div>

            <a href="{{ route('home') }}" class="btn btn-primary">
                Back To Home
            </a>
        </div>
    </div>
</div>
@endsection