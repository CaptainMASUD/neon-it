<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Agency</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        :root{
            --bg:#f8fbff;
            --white:#ffffff;
            --dark:#0f172a;
            --text:#475569;
            --line:#e2e8f0;
            --primary:#2563eb;
            --primary-2:#7c3aed;
            --accent:#06b6d4;
            --shadow:0 20px 45px rgba(15, 23, 42, 0.08);
            --shadow-2:0 10px 25px rgba(37, 99, 235, 0.12);
            --grad:linear-gradient(135deg,#2563eb 0%, #7c3aed 55%, #06b6d4 100%);
            --grad-btn:linear-gradient(135deg,#4f46e5 0%, #7c3aed 50%, #2563eb 100%);
        }

        body{
            background:
                radial-gradient(circle at top left, rgba(37,99,235,0.08), transparent 28%),
                radial-gradient(circle at top right, rgba(124,58,237,0.08), transparent 26%),
                #f8fbff;
            color:var(--dark);
            overflow-x:hidden;
        }

        a{
            text-decoration:none;
            color:inherit;
        }

        .container{
            width:90%;
            max-width:1240px;
            margin:auto;
        }

        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            padding:14px 24px;
            border-radius:14px;
            font-size:15px;
            font-weight:700;
            transition:0.3s ease;
            border:none;
        }

        .btn-primary{
            background:var(--grad);
            color:#fff;
            box-shadow:0 14px 35px rgba(37,99,235,0.25);
        }

        .btn-primary:hover{
            transform:translateY(-2px);
            box-shadow:0 18px 42px rgba(37,99,235,0.30);
        }

        .btn-secondary{
            background:#fff;
            color:var(--dark);
            border:1px solid var(--line);
        }

        .btn-secondary:hover{
            background:#f8fafc;
        }

        /* Updated login button */
        .btn-login{
            background:var(--grad-btn);
            color:#fff;
            padding:10px 18px;
            font-size:14px;
            font-weight:600;
            border-radius:10px;
            box-shadow:0 10px 22px rgba(124,58,237,0.20);
            border:1px solid rgba(255,255,255,0.18);
        }

        .btn-login:hover{
            transform:translateY(-2px);
            box-shadow:0 14px 28px rgba(79,70,229,0.26);
        }

        .active-btn{
            outline:2px solid rgba(124,58,237,0.18);
            outline-offset:2px;
        }

        /* Navbar */
        .navbar{
            position:sticky;
            top:0;
            z-index:1000;
            background:rgba(255,255,255,0.92);
            backdrop-filter:blur(12px);
            border-bottom:1px solid rgba(226,232,240,0.8);
        }

        .navbar-wrap{
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:18px 0;
            gap:20px;
        }

        .logo{
            display:flex;
            align-items:center;
            gap:10px;
            font-size:28px;
            font-weight:800;
            color:var(--dark);
            flex-shrink:0;
        }

        .logo-mark{
            width:40px;
            height:40px;
            border-radius:12px;
            background:var(--grad);
            box-shadow:var(--shadow-2);
        }

        .nav-links{
            display:flex;
            align-items:center;
            gap:28px;
            flex:1;
            justify-content:center;
        }

        .nav-links a{
            color:#334155;
            font-size:15px;
            font-weight:600;
            transition:0.3s;
            position:relative;
            padding:8px 0;
        }

        .nav-links a:hover{
            color:var(--primary);
        }

        .nav-links a.active{
            color:var(--primary-2);
            font-weight:700;
        }

        .nav-links a.active::after{
            content:"";
            position:absolute;
            left:0;
            bottom:-2px;
            width:100%;
            height:3px;
            border-radius:999px;
            background:var(--grad-btn);
        }

        .nav-actions{
            display:flex;
            align-items:center;
            gap:14px;
            flex-shrink:0;
        }

        @media(max-width:900px){
            .nav-links{
                display:none;
            }

            .navbar-wrap{
                justify-content:space-between;
            }
        }

        @media(max-width:520px){
            .logo{
                font-size:22px;
            }

            .logo-mark{
                width:34px;
                height:34px;
            }

            .btn{
                padding:12px 18px;
                font-size:14px;
            }

            .btn-login{
                padding:9px 15px;
                font-size:13px;
                border-radius:9px;
            }
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    @yield('content')

</body>
</html>