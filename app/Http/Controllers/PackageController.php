<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageRequest;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::where('is_active', true)
            ->latest()
            ->get();

        return view('packages.index', compact('packages'));
    }

    public function processing(Package $package)
    {
        abort_unless($package->is_active, 404);

        return view('packages.processing', compact('package'));
    }

    public function submitRequest(Request $request, Package $package)
    {
        abort_unless($package->is_active, 404);

        $request->validate([
            'phone' => 'required|string|max:30',
        ]);

        $user = auth()->user();

        PackageRequest::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $request->phone,
            'status' => PackageRequest::STATUS_PENDING,
        ]);

        return redirect()
            ->route('packages.request.success')
            ->with('success', 'Your request has been sent. Our sales team will contact you soon.');
    }

    public function success()
    {
        return view('packages.success');
    }

    public function myRequests()
    {
        $packageRequests = auth()->user()
            ->packageRequests()
            ->with('package')
            ->latest()
            ->get();

        return view('packages.my-requests', compact('packageRequests'));
    }
}