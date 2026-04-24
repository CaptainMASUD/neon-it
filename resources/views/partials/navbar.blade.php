<nav class="navbar">
    <div class="container navbar-wrap">
        <a href="{{ route('home') }}" class="logo">
            <div class="logo-mark"></div>
            <span>NEON Stack</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
            <a href="{{ route('blogs') }}" class="{{ request()->routeIs('blogs') ? 'active' : '' }}">Blogs</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
        </div>

        <div class="nav-actions">
            @guest
                <a href="{{ route('login') }}" class="btn btn-login {{ request()->routeIs('login') ? 'active-btn' : '' }}">
                    Login
                </a>
            @endguest

            @auth
                <div class="user-menu">
                    <button type="button" class="user-menu-btn" onclick="toggleUserMenu()">
                        <span class="user-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>

                        <span class="user-info">
                            <span class="user-name">{{ auth()->user()->name }}</span>
                            <span class="user-role">{{ auth()->user()->role }}</span>
                        </span>

                        <span class="user-caret">▾</span>
                    </button>

                    <div class="user-dropdown" id="userDropdown">
                        <div class="dropdown-user-box">
                            <div class="dropdown-avatar">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>

                            <div>
                                <strong>{{ auth()->user()->name }}</strong>
                                <small>{{ auth()->user()->email }}</small>
                                <span>{{ ucfirst(auth()->user()->role) }}</span>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>

                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('dashboard') }}"
                               class="dropdown-item {{ request()->routeIs('dashboard') ? 'dropdown-active' : '' }}">
                                Dashboard
                            </a>

                            <a href="{{ route('admin.blogs.index') }}"
                               class="dropdown-item {{ request()->routeIs('admin.blogs.*') ? 'dropdown-active' : '' }}">
                                Manage Blogs
                            </a>

                            <a href="{{ route('admin.contact-messages.index') }}"
                               class="dropdown-item {{ request()->routeIs('admin.contact-messages.*') ? 'dropdown-active' : '' }}">
                                Contact Messages
                            </a>

                            <div class="dropdown-divider"></div>
                        @endif

                        <a href="{{ route('profile') }}"
                           class="dropdown-item {{ request()->routeIs('profile') ? 'dropdown-active' : '' }}">
                            My Profile
                        </a>

                        <div class="dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item logout-btn">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&display=swap');

    *{
        font-family:'Manrope', sans-serif;
    }

    .navbar{
        position:sticky;
        top:0;
        z-index:1000;
        background:rgba(255,255,255,0.94);
        backdrop-filter:blur(14px);
        border-bottom:1px solid rgba(226,232,240,0.75);
        box-shadow:0 6px 24px rgba(15,23,42,0.04);
    }

    .navbar-wrap{
        display:flex;
        align-items:center;
        justify-content:space-between;
        min-height:70px;
        padding:8px 0;
        gap:24px;
    }

    .logo{
        display:flex;
        align-items:center;
        gap:12px;
        font-size:21px;
        font-weight:800;
        letter-spacing:-0.03em;
        color:#0f172a;
        flex-shrink:0;
        text-decoration:none;
    }

    .logo-mark{
        width:34px;
        height:34px;
        border-radius:11px;
        background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 55%, #2563eb 100%);
        box-shadow:0 10px 24px rgba(99,102,241,0.22);
    }

    .nav-links{
        display:flex;
        align-items:center;
        justify-content:center;
        gap:24px;
        flex:1;
    }

    .nav-links a{
        position:relative;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:8px 2px 11px;
        color:#334155;
        font-size:15px;
        font-weight:700;
        letter-spacing:-0.01em;
        text-decoration:none;
        line-height:1;
        transition:color 0.25s ease;
    }

    .nav-links a:hover{
        color:#4f46e5;
    }

    .nav-links a::after{
        content:"";
        position:absolute;
        left:50%;
        bottom:0;
        width:0;
        height:3px;
        border-radius:999px;
        background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 100%);
        transform:translateX(-50%);
        transition:width 0.28s ease, left 0.28s ease;
        pointer-events:none;
    }

    .nav-links a:hover::after{
        width:calc(100% - 4px);
    }

    .nav-links a.active{
        color:#6d28d9;
    }

    .nav-links a.active::after{
        width:calc(100% - 4px);
        left:58%;
    }

    .nav-actions{
        display:flex;
        align-items:center;
        gap:12px;
        flex-shrink:0;
    }

    .btn-login{
        background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 50%, #2563eb 100%);
        color:#fff;
        padding:10px 18px;
        font-size:13px;
        font-weight:800;
        border-radius:12px;
        border:none;
        box-shadow:0 10px 24px rgba(99,102,241,0.22);
        text-decoration:none;
        transition:all 0.25s ease;
    }

    .btn-login:hover{
        transform:translateY(-1px);
        box-shadow:0 14px 28px rgba(99,102,241,0.26);
    }

    .active-btn{
        outline:2px solid rgba(124,58,237,0.16);
        outline-offset:2px;
    }

    .user-menu{
        position:relative;
    }

    .user-menu-btn{
        display:flex;
        align-items:center;
        gap:10px;
        background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 50%, #2563eb 100%);
        color:#fff;
        border:none;
        padding:8px 12px;
        border-radius:14px;
        cursor:pointer;
        font-size:13px;
        font-weight:800;
        letter-spacing:-0.01em;
        box-shadow:0 10px 24px rgba(99,102,241,0.22);
        transition:all 0.25s ease;
    }

    .user-menu-btn:hover{
        transform:translateY(-1px);
        box-shadow:0 14px 28px rgba(99,102,241,0.26);
    }

    .user-avatar{
        width:30px;
        height:30px;
        border-radius:50%;
        background:rgba(255,255,255,0.20);
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:12px;
        font-weight:800;
        flex-shrink:0;
    }

    .user-info{
        display:flex;
        flex-direction:column;
        align-items:flex-start;
        line-height:1.1;
    }

    .user-name{
        max-width:120px;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }

    .user-role{
        margin-top:3px;
        font-size:10px;
        font-weight:800;
        text-transform:uppercase;
        color:rgba(255,255,255,0.76);
        letter-spacing:0.06em;
    }

    .user-caret{
        font-size:11px;
        opacity:0.9;
    }

    .user-dropdown{
        position:absolute;
        top:calc(100% + 10px);
        right:0;
        min-width:260px;
        background:#fff;
        border:1px solid #e2e8f0;
        border-radius:18px;
        box-shadow:0 20px 50px rgba(15,23,42,0.14);
        padding:10px;
        display:none;
        z-index:1200;
    }

    .user-dropdown.show{
        display:block;
    }

    .dropdown-user-box{
        display:flex;
        align-items:center;
        gap:12px;
        padding:12px;
        border-radius:14px;
        background:#f8fafc;
        border:1px solid #e2e8f0;
    }

    .dropdown-avatar{
        width:42px;
        height:42px;
        border-radius:50%;
        background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 55%, #2563eb 100%);
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:15px;
        font-weight:800;
        flex-shrink:0;
    }

    .dropdown-user-box strong{
        display:block;
        color:#0f172a;
        font-size:14px;
        font-weight:800;
        max-width:165px;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }

    .dropdown-user-box small{
        display:block;
        color:#64748b;
        font-size:12px;
        font-weight:600;
        max-width:165px;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
        margin-top:2px;
    }

    .dropdown-user-box span{
        display:inline-flex;
        margin-top:8px;
        padding:4px 9px;
        border-radius:999px;
        background:#eef2ff;
        color:#4f46e5;
        font-size:11px;
        font-weight:800;
    }

    .dropdown-divider{
        height:1px;
        background:#e2e8f0;
        margin:8px 0;
    }

    .dropdown-item{
        display:block;
        width:100%;
        text-align:left;
        padding:11px 13px;
        border-radius:10px;
        color:#334155;
        font-size:13px;
        font-weight:700;
        background:none;
        border:none;
        cursor:pointer;
        text-decoration:none;
        transition:all 0.2s ease;
    }

    .dropdown-item:hover,
    .dropdown-active{
        background:#f1f5ff;
        color:#4f46e5;
    }

    .logout-btn{
        color:#dc2626;
    }

    .logout-btn:hover{
        background:#fef2f2;
        color:#dc2626;
    }

    @media(max-width:900px){
        .nav-links{
            display:none;
        }

        .navbar-wrap{
            min-height:64px;
        }
    }

    @media(max-width:520px){
        .logo{
            font-size:18px;
        }

        .logo-mark{
            width:30px;
            height:30px;
            border-radius:10px;
        }

        .user-info{
            display:none;
        }

        .user-menu-btn,
        .btn-login{
            padding:8px 11px;
            border-radius:11px;
        }

        .user-dropdown{
            min-width:235px;
            right:-4px;
        }
    }
</style>

<script>
    function toggleUserMenu() {
        const dropdown = document.getElementById('userDropdown');

        if (dropdown) {
            dropdown.classList.toggle('show');
        }
    }

    window.addEventListener('click', function(e) {
        const menu = document.querySelector('.user-menu');
        const dropdown = document.getElementById('userDropdown');

        if (menu && dropdown && !menu.contains(e.target)) {
            dropdown.classList.remove('show');
        }
    });
</script>