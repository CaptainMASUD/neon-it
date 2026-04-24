<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageRequest;

class AdminPackageRequestController extends Controller
{
    private function authorizeAdmin(): void
    {
        abort_unless(auth()->check() && auth()->user()->isAdmin(), 403);
    }

    public function index()
    {
        $this->authorizeAdmin();

        $packageRequests = PackageRequest::with(['user', 'package'])
            ->latest()
            ->paginate(15);

        return view('admin.package-requests.index', compact('packageRequests'));
    }

    public function activate(PackageRequest $packageRequest)
    {
        $this->authorizeAdmin();

        $packageRequest->update([
            'status' => PackageRequest::STATUS_ACTIVE,
            'activated_at' => now(),
        ]);

        return redirect()
            ->route('admin.package-requests.index')
            ->with('success', 'User plan activated successfully!');
    }

    public function reject(PackageRequest $packageRequest)
    {
        $this->authorizeAdmin();

        $packageRequest->update([
            'status' => PackageRequest::STATUS_REJECTED,
            'activated_at' => null,
        ]);

        return redirect()
            ->route('admin.package-requests.index')
            ->with('success', 'Package request rejected successfully!');
    }

    public function destroy(PackageRequest $packageRequest)
    {
        $this->authorizeAdmin();

        $packageRequest->delete();

        return redirect()
            ->route('admin.package-requests.index')
            ->with('success', 'Package request deleted successfully!');
    }
}