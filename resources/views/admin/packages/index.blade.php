@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')
<div style="padding:60px 0;">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:center; gap:20px; margin-bottom:24px; flex-wrap:wrap;">
            <div>
                <h1 style="font-size:34px; margin-bottom:6px;">Manage Packages</h1>
                <p style="color:#64748b;">Create, edit, activate, and delete packages/plans.</p>
            </div>

            <div style="display:flex; gap:12px; flex-wrap:wrap;">
                <a href="{{ route('dashboard') }}"
                   style="display:inline-block; padding:12px 20px; border-radius:12px; background:#f1f5f9; color:#334155; font-weight:700; text-decoration:none;">
                    ← Dashboard
                </a>

                <a href="{{ route('admin.packages.create') }}"
                   style="display:inline-block; padding:12px 20px; border-radius:12px; background:linear-gradient(135deg,#16a34a 0%, #0ea5e9 60%, #2563eb 100%); color:#fff; font-weight:700; text-decoration:none;">
                    + Add New Package
                </a>
            </div>
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
                        <th style="text-align:left; padding:14px;">Name</th>
                        <th style="text-align:left; padding:14px;">Price</th>
                        <th style="text-align:left; padding:14px;">Duration</th>
                        <th style="text-align:left; padding:14px;">Status</th>
                        <th style="text-align:left; padding:14px;">Created</th>
                        <th style="text-align:left; padding:14px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($packages as $package)
                        <tr style="border-bottom:1px solid #f1f5f9;">
                            <td style="padding:14px;">
                                <div style="font-weight:800; color:#0f172a;">{{ $package->name }}</div>
                                <div style="color:#64748b; font-size:13px; margin-top:5px;">
                                    {{ Str::limit(str_replace("\n", ', ', $package->features), 70) }}
                                </div>
                            </td>

                            <td style="padding:14px; font-weight:800; color:#0f172a;">
                                ${{ number_format($package->price, 2) }}
                            </td>

                            <td style="padding:14px; color:#64748b;">
                                {{ $package->duration }}
                            </td>

                            <td style="padding:14px;">
                                @if($package->is_active)
                                    <span style="display:inline-block; padding:7px 12px; border-radius:999px; background:#dcfce7; color:#166534; font-size:13px; font-weight:800;">
                                        Active
                                    </span>
                                @else
                                    <span style="display:inline-block; padding:7px 12px; border-radius:999px; background:#fee2e2; color:#991b1b; font-size:13px; font-weight:800;">
                                        Hidden
                                    </span>
                                @endif
                            </td>

                            <td style="padding:14px; color:#64748b;">
                                {{ $package->created_at->format('d M Y') }}
                            </td>

                            <td style="padding:14px;">
                                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                                    <a href="{{ route('admin.packages.edit', $package->id) }}"
                                       style="padding:8px 14px; border-radius:10px; background:#eff6ff; color:#2563eb; font-weight:700; text-decoration:none;">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this package?');">
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
                            <td colspan="6" style="padding:20px; text-align:center; color:#64748b;">
                                No packages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if(method_exists($packages, 'links'))
                <div style="margin-top:20px;">
                    {{ $packages->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection