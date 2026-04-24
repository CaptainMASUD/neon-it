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
        --warning:#f97316;
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

    .profile-page{
        min-height:100vh;
        padding:60px 0;
        position:relative;
        overflow:hidden;
    }

    .profile-page:before{
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

    .profile-page:after{
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

    .profile-wrap{
        position:relative;
        z-index:2;
        max-width:980px;
        margin:0 auto;
    }

    .profile-card,
    .plans-card{
        background:#fff;
        border:1px solid #e7edf6;
        border-radius:34px;
        padding:38px;
        box-shadow:var(--shadow-lg);
    }

    .plans-card{
        margin-top:28px;
    }

    .profile-header{
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        gap:20px;
        flex-wrap:wrap;
        margin-bottom:28px;
    }

    .profile-header-left{
        display:flex;
        align-items:center;
        gap:18px;
    }

    .profile-avatar{
        width:76px;
        height:76px;
        border-radius:24px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        background:var(--gradient);
        font-size:30px;
        font-weight:900;
        box-shadow:0 16px 32px rgba(37,99,235,0.20);
        flex-shrink:0;
    }

    .profile-header h1,
    .plans-header h2{
        font-size:34px;
        margin:0 0 8px;
        color:var(--text);
    }

    .profile-header p,
    .plans-header p{
        margin:0;
        color:#64748b;
        font-size:15px;
        line-height:1.8;
    }

    .role-badge{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:10px 16px;
        border-radius:999px;
        background:var(--gradient-soft);
        color:var(--primary);
        font-size:13px;
        font-weight:800;
        text-transform:capitalize;
        border:1px solid #dbeafe;
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

    .details-grid{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:16px;
        margin-bottom:24px;
    }

    .detail-box{
        padding:18px;
        border-radius:18px;
        background:#f8fbff;
        border:1px solid #e2e8f0;
    }

    .detail-label{
        display:block;
        color:#64748b;
        font-size:13px;
        font-weight:800;
        margin-bottom:8px;
        text-transform:uppercase;
        letter-spacing:0.05em;
    }

    .detail-value{
        color:#0f172a;
        font-size:16px;
        font-weight:800;
        word-break:break-word;
    }

    .detail-muted{
        color:#64748b;
        font-size:14px;
        line-height:1.7;
        margin-top:8px;
    }

    .actions{
        display:flex;
        gap:12px;
        flex-wrap:wrap;
        margin-top:8px;
    }

    .btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        padding:15px 22px;
        border-radius:14px;
        font-weight:800;
        transition:all .3s ease;
        border:1px solid transparent;
        cursor:pointer;
        font-size:14px;
        text-decoration:none;
    }

    .btn-primary{
        background:var(--gradient);
        color:#fff;
        box-shadow:0 12px 30px rgba(37,99,235,0.22);
    }

    .btn-primary:hover{
        transform:translateY(-3px);
    }

    .btn-light{
        background:#eef2f7;
        color:#334155;
        border-color:#e2e8f0;
    }

    .btn-light:hover{
        background:#e2e8f0;
    }

    .btn-danger-light{
        background:#fef2f2;
        color:#dc2626;
        border-color:#fecaca;
    }

    .btn-danger-light:hover{
        background:#fee2e2;
    }

    .plans-header{
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        gap:18px;
        flex-wrap:wrap;
        margin-bottom:24px;
    }

    .plans-grid{
        display:grid;
        gap:18px;
    }

    .plan-item{
        border-radius:24px;
        padding:22px;
        border:1px solid #e2e8f0;
        background:#f8fbff;
        position:relative;
        overflow:hidden;
    }

    .plan-item:before{
        content:"";
        position:absolute;
        width:150px;
        height:150px;
        right:-60px;
        top:-60px;
        border-radius:50%;
        background:var(--gradient-soft);
    }

    .plan-top{
        position:relative;
        z-index:2;
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        gap:16px;
        flex-wrap:wrap;
        margin-bottom:16px;
    }

    .plan-name{
        font-size:22px;
        font-weight:900;
        color:#0f172a;
        margin-bottom:6px;
    }

    .plan-meta{
        color:#64748b;
        font-size:14px;
        line-height:1.7;
    }

    .plan-price{
        font-size:24px;
        font-weight:900;
        color:#2563eb;
        white-space:nowrap;
    }

    .status-badge{
        display:inline-flex;
        align-items:center;
        gap:8px;
        padding:9px 13px;
        border-radius:999px;
        font-size:13px;
        font-weight:900;
        text-transform:capitalize;
        position:relative;
        z-index:2;
    }

    .status-active{
        background:#dcfce7;
        color:#166534;
    }

    .status-pending{
        background:#fff7ed;
        color:#c2410c;
    }

    .status-rejected{
        background:#fee2e2;
        color:#991b1b;
    }

    .plan-message{
        position:relative;
        z-index:2;
        padding:16px;
        border-radius:16px;
        font-size:14px;
        font-weight:700;
        line-height:1.7;
        margin-top:14px;
    }

    .message-active{
        background:#f0fdf4;
        color:#166534;
        border:1px solid #bbf7d0;
    }

    .message-pending{
        background:#fff7ed;
        color:#9a3412;
        border:1px solid #fed7aa;
    }

    .message-rejected{
        background:#fef2f2;
        color:#991b1b;
        border:1px solid #fecaca;
    }

    .empty-plan{
        background:#f8fbff;
        border:1px dashed #cbd5e1;
        border-radius:24px;
        padding:28px;
        text-align:center;
    }

    .empty-plan h3{
        margin:0 0 10px;
        font-size:22px;
        color:#0f172a;
    }

    .empty-plan p{
        margin:0 0 20px;
        color:#64748b;
        line-height:1.7;
    }

    .plan-actions{
        margin-top:18px;
        display:flex;
        gap:12px;
        flex-wrap:wrap;
        position:relative;
        z-index:2;
    }

    .edit-panel{
        display:none;
        margin-top:28px;
        padding-top:26px;
        border-top:1px solid var(--line);
    }

    .edit-panel.show{
        display:block;
    }

    .edit-title{
        margin:0 0 20px;
        font-size:24px;
        font-weight:900;
        color:#0f172a;
    }

    .form-grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:16px;
    }

    .form-group{
        margin-bottom:18px;
    }

    .form-group.full{
        grid-column:1 / -1;
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

    .form-control[disabled]{
        background:#eef2f7;
        color:#64748b;
        cursor:not-allowed;
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

    .hint{
        display:block;
        margin-top:8px;
        color:#64748b;
        font-size:13px;
        line-height:1.6;
    }

    @media(max-width:768px){
        .profile-page{
            padding:34px 0;
        }

        .profile-card,
        .plans-card{
            padding:28px 20px;
        }

        .profile-header-left{
            align-items:flex-start;
        }

        .profile-avatar{
            width:62px;
            height:62px;
            border-radius:20px;
            font-size:24px;
        }

        .profile-header h1,
        .plans-header h2{
            font-size:28px;
        }

        .details-grid,
        .form-grid{
            grid-template-columns:1fr;
        }

        .btn{
            width:100%;
        }
    }
</style>

<div class="profile-page">
    <div class="container profile-wrap">

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-header-left">
                    <div class="profile-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <h1>My Profile</h1>
                        <p>
                            View your account details, package status, and update your information when needed.
                        </p>
                    </div>
                </div>

                <div class="role-badge">
                    {{ auth()->user()->role }}
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="details-grid">
                <div class="detail-box">
                    <span class="detail-label">Full Name</span>
                    <div class="detail-value">{{ auth()->user()->name }}</div>
                </div>

                <div class="detail-box">
                    <span class="detail-label">Email Address</span>
                    <div class="detail-value">{{ auth()->user()->email }}</div>
                </div>

                <div class="detail-box">
                    <span class="detail-label">Account Role</span>
                    <div class="detail-value">{{ ucfirst(auth()->user()->role) }}</div>
                    <div class="detail-muted">
                        Your role cannot be changed from this page.
                    </div>
                </div>

                <div class="detail-box">
                    <span class="detail-label">Member Since</span>
                    <div class="detail-value">
                        {{ auth()->user()->created_at ? auth()->user()->created_at->format('F d, Y') : 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-primary" id="editProfileBtn" onclick="showEditForm()">
                    Edit Profile
                </button>

                <a href="{{ route('contact') }}" class="btn btn-light">
                    Contact Sales
                </a>
            </div>

            <div class="edit-panel {{ $errors->any() ? 'show' : '' }}" id="editProfilePanel">
                <h2 class="edit-title">Edit Profile Information</h2>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', auth()->user()->name) }}"
                                required
                                autocomplete="name"
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
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', auth()->user()->email) }}"
                                required
                                autocomplete="email"
                                placeholder="Enter your email"
                            >
                            @error('email')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full">
                            <label for="role">Role</label>
                            <input
                                id="role"
                                type="text"
                                class="form-control"
                                value="{{ ucfirst(auth()->user()->role) }}"
                                disabled
                            >
                            <span class="hint">
                                New registered accounts are users by default. Only an admin can change roles.
                            </span>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                autocomplete="new-password"
                                placeholder="Leave empty to keep current password"
                            >
                            @error('password')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                autocomplete="new-password"
                                placeholder="Confirm new password"
                            >
                        </div>
                    </div>

                    <div class="actions">
                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>

                        <button type="button" class="btn btn-danger-light" onclick="hideEditForm()">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="plans-card">
            <div class="plans-header">
                <div>
                    <h2>My Package Status</h2>
                    <p>
                        Only your own package requests are shown here. Track your selected package and activation status.
                    </p>
                </div>

                <a href="{{ route('contact') }}" class="btn btn-light">
                    Contact Sales
                </a>
            </div>

            @if(isset($packageRequests) && $packageRequests->count())
                <div class="plans-grid">
                    @foreach($packageRequests as $requestItem)
                        <div class="plan-item">
                            <div class="plan-top">
                                <div>
                                    <div class="plan-name">
                                        {{ $requestItem->package->name ?? 'Package Removed' }}
                                    </div>

                                    <div class="plan-meta">
                                        Requested on {{ $requestItem->created_at->format('F d, Y') }}
                                        <br>
                                        Phone: {{ $requestItem->phone }}
                                        <br>
                                        Request Email: {{ $requestItem->email }}
                                    </div>
                                </div>

                                <div>
                                    @if($requestItem->package)
                                        <div class="plan-price">
                                            ${{ number_format($requestItem->package->price, 2) }}
                                        </div>
                                        <div class="plan-meta" style="text-align:right;">
                                            {{ $requestItem->package->duration }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if($requestItem->status === 'active')
                                <span class="status-badge status-active">
                                    ● Active
                                </span>

                                <div class="plan-message message-active">
                                    Your package is active. Our team has confirmed your request and your selected plan is now enabled.
                                </div>
                            @elseif($requestItem->status === 'rejected')
                                <span class="status-badge status-rejected">
                                    ● Rejected
                                </span>

                                <div class="plan-message message-rejected">
                                    Your package request has been rejected or closed. Please contact our sales team if you need more details or want to submit a new request.
                                </div>
                            @else
                                <span class="status-badge status-pending">
                                    ● Pending Confirmation
                                </span>

                                <div class="plan-message message-pending">
                                    Please wait, our sales team will call you to confirm your package activation. Your request is currently being processed.
                                </div>
                            @endif

                            <div class="plan-actions">
                                <a href="{{ route('contact') }}" class="btn btn-light">
                                    Contact Sales
                                </a>

                                <a href="{{ route('home') }}#packages" class="btn btn-primary">
                                    View Packages
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-plan">
                    <h3>No Package Request Yet</h3>
                    <p>
                        You have not requested any package yet. Choose a package from the home page or contact our sales team for help.
                    </p>

                    <div class="plan-actions" style="justify-content:center;">
                        <a href="{{ route('home') }}#packages" class="btn btn-primary">
                            View Packages
                        </a>

                        <a href="{{ route('contact') }}" class="btn btn-light">
                            Contact Sales
                        </a>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>

<script>
    function showEditForm() {
        const panel = document.getElementById('editProfilePanel');
        const editButton = document.getElementById('editProfileBtn');

        if (panel) {
            panel.classList.add('show');
            panel.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        if (editButton) {
            editButton.style.display = 'none';
        }
    }

    function hideEditForm() {
        const panel = document.getElementById('editProfilePanel');
        const editButton = document.getElementById('editProfileBtn');

        if (panel) {
            panel.classList.remove('show');
        }

        if (editButton) {
            editButton.style.display = 'inline-flex';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const panel = document.getElementById('editProfilePanel');
        const editButton = document.getElementById('editProfileBtn');

        if (panel && panel.classList.contains('show') && editButton) {
            editButton.style.display = 'none';
        }
    });
</script>
@endsection