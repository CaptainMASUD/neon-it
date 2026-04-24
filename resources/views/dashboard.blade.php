@extends('layouts.app')

@section('content')
<div style="padding:70px 0; background:#f8fafc; min-height:calc(100vh - 80px);">
    <div class="container">

        {{-- Dashboard Header --}}
        <div style="margin-bottom:35px;">
            <span style="display:inline-block; padding:8px 14px; border-radius:999px; background:#eef2ff; color:#4f46e5; font-weight:700; font-size:14px; margin-bottom:14px;">
                Admin Panel
            </span>

            <h1 style="font-size:38px; line-height:1.2; margin-bottom:10px; color:#0f172a;">
                Welcome, {{ auth()->user()->name }}
            </h1>

            <p style="color:#64748b; font-size:17px; max-width:720px;">
                Choose what you want to manage from your dashboard. You can update blog posts, review contact messages, create packages, and activate user plans.
            </p>
        </div>

        {{-- Dashboard Cards --}}
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:25px;">

            {{-- Blog Management Card --}}
            <div style="background:#fff; border-radius:26px; padding:30px; box-shadow:0 20px 45px rgba(15,23,42,0.08); border:1px solid #e2e8f0; position:relative; overflow:hidden;">
                <div style="position:absolute; top:-40px; right:-40px; width:130px; height:130px; background:linear-gradient(135deg,#4f46e5,#7c3aed); border-radius:50%; opacity:0.12;"></div>

                <div style="width:62px; height:62px; border-radius:18px; background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 50%, #2563eb 100%); display:flex; align-items:center; justify-content:center; color:#fff; font-size:28px; margin-bottom:22px;">
                    📝
                </div>

                <h2 style="font-size:24px; margin-bottom:10px; color:#0f172a;">
                    Manage Blogs
                </h2>

                <p style="color:#64748b; line-height:1.7; margin-bottom:25px;">
                    Create, edit, update, and delete blog posts displayed on your website.
                </p>

                <a href="{{ route('admin.blogs.index') }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:13px 20px; border-radius:14px; background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 50%, #2563eb 100%); color:#fff; font-weight:700; text-decoration:none;">
                    Manage Blogs
                    <span>→</span>
                </a>
            </div>

            {{-- Contact Messages Card --}}
            <div style="background:#fff; border-radius:26px; padding:30px; box-shadow:0 20px 45px rgba(15,23,42,0.08); border:1px solid #e2e8f0; position:relative; overflow:hidden;">
                <div style="position:absolute; top:-40px; right:-40px; width:130px; height:130px; background:linear-gradient(135deg,#06b6d4,#2563eb); border-radius:50%; opacity:0.12;"></div>

                <div style="width:62px; height:62px; border-radius:18px; background:linear-gradient(135deg,#06b6d4 0%, #2563eb 60%, #4f46e5 100%); display:flex; align-items:center; justify-content:center; color:#fff; font-size:28px; margin-bottom:22px;">
                    📩
                </div>

                <h2 style="font-size:24px; margin-bottom:10px; color:#0f172a;">
                    Contact Messages
                </h2>

                <p style="color:#64748b; line-height:1.7; margin-bottom:25px;">
                    View and manage messages submitted through your website contact form.
                </p>

                <a href="{{ route('admin.contact-messages.index') }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:13px 20px; border-radius:14px; background:linear-gradient(135deg,#06b6d4 0%, #2563eb 60%, #4f46e5 100%); color:#fff; font-weight:700; text-decoration:none;">
                    View Messages
                    <span>→</span>
                </a>
            </div>

            {{-- Packages Card --}}
            <div style="background:#fff; border-radius:26px; padding:30px; box-shadow:0 20px 45px rgba(15,23,42,0.08); border:1px solid #e2e8f0; position:relative; overflow:hidden;">
                <div style="position:absolute; top:-40px; right:-40px; width:130px; height:130px; background:linear-gradient(135deg,#16a34a,#0ea5e9); border-radius:50%; opacity:0.12;"></div>

                <div style="width:62px; height:62px; border-radius:18px; background:linear-gradient(135deg,#16a34a 0%, #0ea5e9 60%, #2563eb 100%); display:flex; align-items:center; justify-content:center; color:#fff; font-size:28px; margin-bottom:22px;">
                    📦
                </div>

                <h2 style="font-size:24px; margin-bottom:10px; color:#0f172a;">
                    Packages / Plans
                </h2>

                <p style="color:#64748b; line-height:1.7; margin-bottom:25px;">
                    Create, edit, activate, and remove pricing packages shown on your home page.
                </p>

                <a href="{{ route('admin.packages.index') }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:13px 20px; border-radius:14px; background:linear-gradient(135deg,#16a34a 0%, #0ea5e9 60%, #2563eb 100%); color:#fff; font-weight:700; text-decoration:none;">
                    Manage Packages
                    <span>→</span>
                </a>
            </div>

            {{-- Package Requests Card --}}
            <div style="background:#fff; border-radius:26px; padding:30px; box-shadow:0 20px 45px rgba(15,23,42,0.08); border:1px solid #e2e8f0; position:relative; overflow:hidden;">
                <div style="position:absolute; top:-40px; right:-40px; width:130px; height:130px; background:linear-gradient(135deg,#f97316,#dc2626); border-radius:50%; opacity:0.12;"></div>

                <div style="width:62px; height:62px; border-radius:18px; background:linear-gradient(135deg,#f97316 0%, #ef4444 55%, #dc2626 100%); display:flex; align-items:center; justify-content:center; color:#fff; font-size:28px; margin-bottom:22px;">
                    ✅
                </div>

                <h2 style="font-size:24px; margin-bottom:10px; color:#0f172a;">
                    Plan Requests
                </h2>

                <p style="color:#64748b; line-height:1.7; margin-bottom:25px;">
                    Review user package requests and activate or reject plans.
                </p>

                <a href="{{ route('admin.package-requests.index') }}"
                   style="display:inline-flex; align-items:center; gap:8px; padding:13px 20px; border-radius:14px; background:linear-gradient(135deg,#f97316 0%, #ef4444 55%, #dc2626 100%); color:#fff; font-weight:700; text-decoration:none;">
                    View Requests
                    <span>→</span>
                </a>
            </div>

        </div>

        {{-- Quick Info Section --}}
        <div style="margin-top:30px; background:#fff; border-radius:24px; padding:25px 30px; box-shadow:0 15px 35px rgba(15,23,42,0.06); border:1px solid #e2e8f0;">
            <h3 style="font-size:20px; color:#0f172a; margin-bottom:10px;">
                Quick Actions
            </h3>

            <p style="color:#64748b; margin-bottom:18px;">
                Use the options below to quickly access your admin tools.
            </p>

            <div style="display:flex; flex-wrap:wrap; gap:12px;">
                <a href="{{ route('admin.blogs.create') }}"
                   style="padding:11px 17px; border-radius:12px; background:#eef2ff; color:#4f46e5; font-weight:700; text-decoration:none;">
                    + Add New Blog
                </a>

                <a href="{{ route('admin.packages.create') }}"
                   style="padding:11px 17px; border-radius:12px; background:#ecfdf5; color:#16a34a; font-weight:700; text-decoration:none;">
                    + Add New Package
                </a>

                <a href="{{ route('admin.package-requests.index') }}"
                   style="padding:11px 17px; border-radius:12px; background:#fff7ed; color:#f97316; font-weight:700; text-decoration:none;">
                    Check Plan Requests
                </a>

                <a href="{{ route('admin.contact-messages.index') }}"
                   style="padding:11px 17px; border-radius:12px; background:#ecfeff; color:#0891b2; font-weight:700; text-decoration:none;">
                    Check Contact Messages
                </a>

                <a href="{{ route('home') }}"
                   style="padding:11px 17px; border-radius:12px; background:#f1f5f9; color:#334155; font-weight:700; text-decoration:none;">
                    View Website
                </a>
            </div>
        </div>

    </div>
</div>
@endsection