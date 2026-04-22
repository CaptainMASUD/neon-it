@extends('layouts.app')

@section('content')
<div style="padding:60px 0;">
    <div class="container">
        <div style="max-width:900px; margin:auto; background:#fff; border-radius:24px; padding:30px; box-shadow:0 20px 45px rgba(15,23,42,0.08);">
            <h1 style="font-size:32px; margin-bottom:8px;">Edit Blog</h1>
            <p style="color:#64748b; margin-bottom:24px;">Update your blog content.</p>

            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom:18px;">
                    <label style="display:block; margin-bottom:8px; font-weight:700;">Blog Title</label>
                    <input type="text" name="title" value="{{ old('title', $blog->title) }}"
                        style="width:100%; padding:14px 16px; border:1px solid #cbd5e1; border-radius:14px;">
                    @error('title')
                        <div style="color:#dc2626; font-size:13px; margin-top:6px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; margin-bottom:8px; font-weight:700;">Image URL</label>
                    <input type="url" name="image" value="{{ old('image', $blog->image) }}"
                        style="width:100%; padding:14px 16px; border:1px solid #cbd5e1; border-radius:14px;">
                    @error('image')
                        <div style="color:#dc2626; font-size:13px; margin-top:6px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-bottom:22px;">
                    <label style="display:block; margin-bottom:8px; font-weight:700;">Description</label>
                    <textarea name="description" rows="10"
                        style="width:100%; padding:14px 16px; border:1px solid #cbd5e1; border-radius:14px; resize:vertical;">{{ old('description', $blog->description) }}</textarea>
                    @error('description')
                        <div style="color:#dc2626; font-size:13px; margin-top:6px;">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit"
                    style="padding:13px 22px; border:none; border-radius:12px; background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 50%, #2563eb 100%); color:#fff; font-weight:700; cursor:pointer;">
                    Update Blog
                </button>
            </form>
        </div>
    </div>
</div>
@endsection