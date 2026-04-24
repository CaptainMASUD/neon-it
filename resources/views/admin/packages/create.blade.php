@extends('layouts.app')

@section('content')
<div style="padding:60px 0;">
    <div class="container">
        <div style="max-width:900px; margin:auto; background:#fff; border-radius:24px; padding:30px; box-shadow:0 20px 45px rgba(15,23,42,0.08);">
            <h1 style="font-size:32px; margin-bottom:8px;">Create Package</h1>
            <p style="color:#64748b; margin-bottom:24px;">Add a new package/plan with name, price, duration, and features.</p>

            <form action="{{ route('admin.packages.store') }}" method="POST">
                @csrf

                <div style="margin-bottom:18px;">
                    <label style="display:block; margin-bottom:8px; font-weight:700;">Package Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Starter Package"
                        style="width:100%; padding:14px 16px; border:1px solid #cbd5e1; border-radius:14px;">
                    @error('name')
                        <div style="color:#dc2626; font-size:13px; margin-top:6px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:18px;">
                    <div style="margin-bottom:18px;">
                        <label style="display:block; margin-bottom:8px; font-weight:700;">Price</label>
                        <input type="number" step="0.01" min="0" name="price" value="{{ old('price') }}" placeholder="1200"
                            style="width:100%; padding:14px 16px; border:1px solid #cbd5e1; border-radius:14px;">
                        @error('price')
                            <div style="color:#dc2626; font-size:13px; margin-top:6px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="margin-bottom:18px;">
                        <label style="display:block; margin-bottom:8px; font-weight:700;">Duration</label>
                        <input type="text" name="duration" value="{{ old('duration') }}" placeholder="Monthly / 3 Months / Project"
                            style="width:100%; padding:14px 16px; border:1px solid #cbd5e1; border-radius:14px;">
                        @error('duration')
                            <div style="color:#dc2626; font-size:13px; margin-top:6px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div style="margin-bottom:22px;">
                    <label style="display:block; margin-bottom:8px; font-weight:700;">Features</label>
                    <textarea name="features" rows="9" placeholder="Write one feature per line..."
                        style="width:100%; padding:14px 16px; border:1px solid #cbd5e1; border-radius:14px; resize:vertical;">{{ old('features') }}</textarea>
                    <p style="color:#64748b; font-size:13px; margin-top:8px;">
                        Example: Landing page design, Basic SEO setup, Launch support. Write each feature on a new line.
                    </p>
                    @error('features')
                        <div style="color:#dc2626; font-size:13px; margin-top:6px;">{{ $message }}</div>
                    @enderror
                </div>

                <label style="display:flex; align-items:center; gap:10px; margin-bottom:24px; color:#334155; font-weight:700;">
                    <input type="checkbox" name="is_active" value="1" checked style="width:18px; height:18px; accent-color:#2563eb;">
                    Show this package on the website
                </label>

                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <button type="submit"
                        style="padding:13px 22px; border:none; border-radius:12px; background:linear-gradient(135deg,#16a34a 0%, #0ea5e9 60%, #2563eb 100%); color:#fff; font-weight:700; cursor:pointer;">
                        Create Package
                    </button>

                    <a href="{{ route('admin.packages.index') }}"
                       style="padding:13px 22px; border-radius:12px; background:#f1f5f9; color:#334155; font-weight:700; text-decoration:none;">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection