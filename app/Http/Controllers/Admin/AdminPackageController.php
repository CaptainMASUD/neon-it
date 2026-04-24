<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    private function authorizeAdmin(): void
    {
        abort_unless(auth()->check() && auth()->user()->isAdmin(), 403);
    }

    public function index()
    {
        $this->authorizeAdmin();

        $packages = Package::latest()->paginate(10);

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $this->authorizeAdmin();

        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
            'features' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'features' => $request->features,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package created successfully!');
    }

    public function edit(Package $package)
    {
        $this->authorizeAdmin();

        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $this->authorizeAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
            'features' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        $package->update([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'features' => $request->features,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package updated successfully!');
    }

    public function destroy(Package $package)
    {
        $this->authorizeAdmin();

        $package->delete();

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package deleted successfully!');
    }
}