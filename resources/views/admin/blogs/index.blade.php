@extends('layouts.app')

@section('content')
<div style="padding:60px 0;">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:center; gap:20px; margin-bottom:24px; flex-wrap:wrap;">
            <div>
                <h1 style="font-size:34px; margin-bottom:6px;">Manage Blogs</h1>
                <p style="color:#64748b;">Create, edit, and delete blog posts.</p>
            </div>

            <a href="{{ route('admin.blogs.create') }}"
               style="display:inline-block; padding:12px 20px; border-radius:12px; background:linear-gradient(135deg,#4f46e5 0%, #7c3aed 50%, #2563eb 100%); color:#fff; font-weight:700;">
                + Add New Blog
            </a>
        </div>

        @if(session('success'))
            <div style="background:#dcfce7; color:#166534; padding:14px 16px; border-radius:12px; margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background:#fff; border-radius:20px; padding:24px; box-shadow:0 20px 45px rgba(15,23,42,0.08); overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="border-bottom:1px solid #e2e8f0;">
                        <th style="text-align:left; padding:14px;">Image</th>
                        <th style="text-align:left; padding:14px;">Title</th>
                        <th style="text-align:left; padding:14px;">Created</th>
                        <th style="text-align:left; padding:14px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr style="border-bottom:1px solid #f1f5f9;">
                            <td style="padding:14px;">
                                @if($blog->image)
                                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}" style="width:80px; height:60px; object-fit:cover; border-radius:10px;">
                                @else
                                    <span style="color:#94a3b8;">No image</span>
                                @endif
                            </td>
                            <td style="padding:14px; font-weight:700;">{{ $blog->title }}</td>
                            <td style="padding:14px; color:#64748b;">{{ $blog->created_at->format('d M Y') }}</td>
                            <td style="padding:14px;">
                                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                       style="padding:8px 14px; border-radius:10px; background:#eff6ff; color:#2563eb; font-weight:700;">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="padding:8px 14px; border:none; border-radius:10px; background:#fef2f2; color:#dc2626; font-weight:700; cursor:pointer;">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding:20px; text-align:center; color:#64748b;">
                                No blogs found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection