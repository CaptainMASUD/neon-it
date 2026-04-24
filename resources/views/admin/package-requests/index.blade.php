@extends('layouts.app')

@section('content')
<div style="padding:60px 0;">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:center; gap:20px; margin-bottom:24px; flex-wrap:wrap;">
            <div>
                <h1 style="font-size:34px; margin-bottom:6px;">Package Requests</h1>
                <p style="color:#64748b;">Review user package requests and activate or reject plans.</p>
            </div>

            <a href="{{ route('admin.packages.index') }}"
               style="display:inline-block; padding:12px 20px; border-radius:12px; background:#f1f5f9; color:#334155; font-weight:700; text-decoration:none;">
                Manage Packages
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
                        <th style="text-align:left; padding:14px;">User</th>
                        <th style="text-align:left; padding:14px;">Package</th>
                        <th style="text-align:left; padding:14px;">Phone</th>
                        <th style="text-align:left; padding:14px;">Status</th>
                        <th style="text-align:left; padding:14px;">Requested</th>
                        <th style="text-align:left; padding:14px;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($packageRequests as $requestItem)
                        <tr style="border-bottom:1px solid #f1f5f9;">
                            <td style="padding:14px;">
                                <div style="font-weight:800; color:#0f172a;">
                                    {{ $requestItem->name }}
                                </div>
                                <div style="color:#64748b; font-size:13px; margin-top:5px;">
                                    {{ $requestItem->email }}
                                </div>
                            </td>

                            <td style="padding:14px;">
                                <div style="font-weight:800; color:#0f172a;">
                                    {{ $requestItem->package->name ?? 'Deleted Package' }}
                                </div>

                                @if($requestItem->package)
                                    <div style="color:#64748b; font-size:13px; margin-top:5px;">
                                        ${{ number_format($requestItem->package->price, 2) }}
                                        /
                                        {{ $requestItem->package->duration }}
                                    </div>
                                @endif
                            </td>

                            <td style="padding:14px; color:#334155; font-weight:700;">
                                {{ $requestItem->phone }}
                            </td>

                            <td style="padding:14px;">
                                @if($requestItem->status === 'active')
                                    <span style="display:inline-block; padding:7px 12px; border-radius:999px; background:#dcfce7; color:#166534; font-size:13px; font-weight:800;">
                                        Active
                                    </span>
                                @elseif($requestItem->status === 'rejected')
                                    <span style="display:inline-block; padding:7px 12px; border-radius:999px; background:#fee2e2; color:#991b1b; font-size:13px; font-weight:800;">
                                        Rejected
                                    </span>
                                @else
                                    <span style="display:inline-block; padding:7px 12px; border-radius:999px; background:#fff7ed; color:#c2410c; font-size:13px; font-weight:800;">
                                        Pending
                                    </span>
                                @endif

                                @if($requestItem->activated_at)
                                    <div style="font-size:12px; color:#64748b; margin-top:6px;">
                                        Activated: {{ $requestItem->activated_at->format('d M Y') }}
                                    </div>
                                @endif
                            </td>

                            <td style="padding:14px; color:#64748b;">
                                {{ $requestItem->created_at->format('d M Y') }}
                            </td>

                            <td style="padding:14px;">
                                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                                    @if($requestItem->status !== 'active')
                                        <form action="{{ route('admin.package-requests.activate', $requestItem->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                style="padding:8px 14px; border:none; border-radius:10px; background:#dcfce7; color:#166534; font-weight:700; cursor:pointer;">
                                                Activate
                                            </button>
                                        </form>
                                    @endif

                                    @if($requestItem->status !== 'rejected')
                                        <form action="{{ route('admin.package-requests.reject', $requestItem->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                style="padding:8px 14px; border:none; border-radius:10px; background:#fff7ed; color:#c2410c; font-weight:700; cursor:pointer;">
                                                Reject
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.package-requests.destroy', $requestItem->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this request?');">
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
                                No package requests found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div style="margin-top:20px;">
                {{ $packageRequests->links() }}
            </div>
        </div>
    </div>
</div>
@endsection