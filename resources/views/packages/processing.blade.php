@extends('layouts.app')

@section('content')
<style>
    :root{
        --bg:#f5f7fb;
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
    }

    body{
        background:var(--bg);
        color:var(--text);
    }

    *{
        box-sizing:border-box;
    }

    .order-page{
        min-height:100vh;
        padding:70px 0;
        position:relative;
        overflow:hidden;
    }

    .order-page:before{
        content:"";
        position:absolute;
        width:420px;
        height:420px;
        border-radius:50%;
        background:rgba(37,99,235,0.12);
        top:-110px;
        left:-120px;
        filter:blur(16px);
    }

    .order-page:after{
        content:"";
        position:absolute;
        width:360px;
        height:360px;
        border-radius:50%;
        background:rgba(124,58,237,0.12);
        right:-100px;
        bottom:-120px;
        filter:blur(16px);
    }

    .order-wrap{
        position:relative;
        z-index:2;
        max-width:900px;
        margin:0 auto;
    }

    .order-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:34px;
        padding:40px;
        box-shadow:var(--shadow-lg);
        overflow:hidden;
        position:relative;
    }

    .order-card:before{
        content:"";
        position:absolute;
        width:220px;
        height:220px;
        right:-70px;
        top:-70px;
        border-radius:40px;
        background:var(--gradient-soft);
        transform:rotate(22deg);
    }

    .order-header{
        position:relative;
        z-index:2;
        text-align:center;
        margin-bottom:34px;
    }

    .order-icon{
        width:86px;
        height:86px;
        border-radius:28px;
        margin:0 auto 18px;
        background:var(--gradient);
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:34px;
        font-weight:900;
        box-shadow:0 18px 35px rgba(37,99,235,0.24);
        animation:floatIcon 2s ease-in-out infinite;
    }

    @keyframes floatIcon{
        0%,100%{ transform:translateY(0); }
        50%{ transform:translateY(-8px); }
    }

    .order-header h1{
        font-size:38px;
        margin:0 0 12px;
        color:#0f172a;
    }

    .order-header p{
        max-width:620px;
        margin:0 auto;
        color:#64748b;
        line-height:1.8;
        font-size:15px;
    }

    .order-grid{
        position:relative;
        z-index:2;
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:22px;
        align-items:start;
    }

    .summary-box,
    .form-box{
        border:1px solid #e2e8f0;
        background:#f8fbff;
        border-radius:24px;
        padding:24px;
    }

    .summary-box h2,
    .form-box h2{
        margin:0 0 16px;
        font-size:22px;
        color:#0f172a;
    }

    .summary-item{
        display:flex;
        justify-content:space-between;
        gap:14px;
        padding:13px 0;
        border-bottom:1px solid #e2e8f0;
        color:#334155;
        font-weight:700;
    }

    .summary-item:last-child{
        border-bottom:none;
    }

    .summary-item span{
        color:#64748b;
        font-weight:700;
    }

    .summary-price{
        font-size:30px;
        font-weight:900;
        color:#2563eb;
        margin-top:14px;
    }

    .feature-list{
        display:grid;
        gap:10px;
        margin-top:18px;
    }

    .feature-list span{
        padding:11px 12px;
        border-radius:12px;
        background:#fff;
        border:1px solid #e2e8f0;
        color:#334155;
        font-size:14px;
        font-weight:700;
    }

    .form-group{
        margin-bottom:18px;
    }

    .form-group label{
        display:block;
        margin-bottom:8px;
        font-size:14px;
        font-weight:800;
        color:#334155;
    }

    .form-control{
        width:100%;
        padding:15px 16px;
        border-radius:16px;
        border:1px solid #dbe4f0;
        background:#fff;
        outline:none;
        font-size:14px;
        color:#0f172a;
        transition:.3s ease;
    }

    .form-control:focus{
        border-color:#93c5fd;
        box-shadow:0 0 0 4px rgba(37,99,235,0.08);
    }

    .form-control[readonly]{
        background:#eef2f7;
        color:#64748b;
    }

    .error-text{
        margin-top:8px;
        color:var(--danger);
        font-size:13px;
        font-weight:700;
    }

    .btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        width:100%;
        padding:15px 22px;
        border-radius:14px;
        font-weight:800;
        transition:all .3s ease;
        border:1px solid transparent;
        cursor:pointer;
        font-size:14px;
    }

    .btn-primary{
        background:var(--gradient);
        color:#fff;
        box-shadow:0 12px 30px rgba(37,99,235,0.22);
    }

    .btn-primary:hover{
        transform:translateY(-3px);
    }

    .processing-overlay{
        position:fixed;
        inset:0;
        background:rgba(248,250,252,0.92);
        backdrop-filter:blur(10px);
        z-index:9999;
        display:none;
        align-items:center;
        justify-content:center;
        padding:20px;
    }

    .processing-overlay.show{
        display:flex;
    }

    .processing-box{
        width:min(440px, 100%);
        background:#fff;
        border-radius:30px;
        padding:38px;
        text-align:center;
        box-shadow:0 30px 80px rgba(15,23,42,0.18);
        border:1px solid #e2e8f0;
    }

    .loader-ring{
        width:92px;
        height:92px;
        border-radius:50%;
        border:8px solid #e2e8f0;
        border-top-color:#2563eb;
        border-right-color:#7c3aed;
        margin:0 auto 24px;
        animation:spin 1s linear infinite;
    }

    @keyframes spin{
        to{ transform:rotate(360deg); }
    }

    .processing-box h2{
        margin:0 0 10px;
        font-size:26px;
        color:#0f172a;
    }

    .processing-box p{
        margin:0;
        color:#64748b;
        line-height:1.7;
    }

    .loading-dots{
        display:inline-flex;
        gap:5px;
        margin-top:18px;
    }

    .loading-dots span{
        width:9px;
        height:9px;
        border-radius:50%;
        background:#2563eb;
        animation:bounceDot .8s ease-in-out infinite alternate;
    }

    .loading-dots span:nth-child(2){
        animation-delay:.15s;
    }

    .loading-dots span:nth-child(3){
        animation-delay:.3s;
    }

    @keyframes bounceDot{
        from{ transform:translateY(0); opacity:.55; }
        to{ transform:translateY(-8px); opacity:1; }
    }

    @media(max-width:768px){
        .order-page{
            padding:40px 0;
        }

        .order-card{
            padding:26px 18px;
        }

        .order-header h1{
            font-size:30px;
        }

        .order-grid{
            grid-template-columns:1fr;
        }
    }
</style>

<div class="order-page">
    <div class="container order-wrap">
        <div class="order-card">
            <div class="order-header">
                <div class="order-icon">✓</div>
                <h1>Processing Your Order</h1>
                <p>
                    Confirm your package request below. We will use your logged-in email and phone number so our sales team can contact you.
                </p>
            </div>

            <div class="order-grid">
                <div class="summary-box">
                    <h2>Selected Package</h2>

                    <div class="summary-item">
                        <span>Package</span>
                        <strong>{{ $package->name }}</strong>
                    </div>

                    <div class="summary-item">
                        <span>Duration</span>
                        <strong>{{ $package->duration ?? 'Plan' }}</strong>
                    </div>

                    <div class="summary-item">
                        <span>Email</span>
                        <strong>{{ auth()->user()->email }}</strong>
                    </div>

                    <div class="summary-price">
                        ${{ number_format($package->price, 2) }}
                    </div>

                    <div class="feature-list">
                        @foreach($package->features_array as $feature)
                            <span>✓ {{ $feature }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="form-box">
                    <h2>Contact Information</h2>

                    <form method="POST" action="{{ route('packages.request.submit', $package->id) }}" id="packageRequestForm">
                        @csrf

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input
                                id="phone"
                                type="text"
                                name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}"
                                placeholder="Enter your phone number"
                                required
                            >
                            @error('phone')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Send Package Request
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="processing-overlay" id="processingOverlay">
    <div class="processing-box">
        <div class="loader-ring"></div>
        <h2>Processing Order</h2>
        <p>Please wait while we send your package request to our sales team.</p>
        <div class="loading-dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<script>
    const packageRequestForm = document.getElementById('packageRequestForm');
    const processingOverlay = document.getElementById('processingOverlay');

    if (packageRequestForm) {
        packageRequestForm.addEventListener('submit', function(e) {
            e.preventDefault();

            if (processingOverlay) {
                processingOverlay.classList.add('show');
            }

            setTimeout(() => {
                packageRequestForm.submit();
            }, 2200);
        });
    }
</script>
@endsection