@extends('layouts.app')

@section('content')
<div style="padding:60px 0;">
    <div class="container">
        <div style="background:#fff; border-radius:24px; padding:30px; box-shadow:0 20px 45px rgba(15,23,42,0.08);">
            <h1 style="font-size:34px; margin-bottom:12px;">Admin Dashboard</h1>
            <p style="color:#64748b; margin-bottom:25px;">
                Welcome, {{ auth()->user()->name }}. Manage your blog posts from here.
            </p>

            <a href="{{ route('admin.blogs.index') }}"
               style="display:inline-block; padding:12px 20px; border-radius:12px; background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 50%, #2563eb 100%); color:#fff; font-weight:700;">
                Manage Blogs
            </a>
        </div>
    </div>
</div>
@endsection