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
                        <span class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-caret">▾</span>
                    </button>

                    <div class="user-dropdown" id="userDropdown">
                        <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item logout-btn">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>

<style>
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
        padding:9px 14px;
        border-radius:12px;
        cursor:pointer;
        font-size:14px;
        font-weight:600;
        box-shadow:0 10px 22px rgba(124,58,237,0.20);
    }

    .user-avatar{
        width:28px;
        height:28px;
        border-radius:50%;
        background:rgba(255,255,255,0.18);
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:13px;
        font-weight:700;
    }

    .user-name{
        max-width:120px;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }

    .user-caret{
        font-size:12px;
    }

    .user-dropdown{
        position:absolute;
        top:calc(100% + 10px);
        right:0;
        min-width:190px;
        background:#fff;
        border:1px solid #e2e8f0;
        border-radius:14px;
        box-shadow:0 18px 40px rgba(15, 23, 42, 0.12);
        padding:8px;
        display:none;
        z-index:1200;
    }

    .user-dropdown.show{
        display:block;
    }

    .dropdown-item{
        display:block;
        width:100%;
        text-align:left;
        padding:12px 14px;
        border-radius:10px;
        color:#334155;
        font-size:14px;
        font-weight:600;
        background:none;
        border:none;
        cursor:pointer;
        text-decoration:none;
    }

    .dropdown-item:hover{
        background:#f8fafc;
        color:#2563eb;
    }

    .logout-btn{
        color:#dc2626;
    }

    .logout-btn:hover{
        background:#fef2f2;
        color:#dc2626;
    }

    @media(max-width:520px){
        .user-name{
            display:none;
        }

        .user-menu-btn{
            padding:8px 10px;
        }
    }
</style>

<script>
    function toggleUserMenu() {
        document.getElementById('userDropdown').classList.toggle('show');
    }

    window.addEventListener('click', function(e) {
        const menu = document.querySelector('.user-menu');
        const dropdown = document.getElementById('userDropdown');

        if (menu && !menu.contains(e.target)) {
            dropdown.classList.remove('show');
        }
    });
</script>