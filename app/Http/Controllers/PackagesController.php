<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    // Controller methods for managing investment packages will go here

    // method to store a new package
    public function store(Request $request)
{
    $validated = $request->validate([
        'name'             => 'required|string|max:255',
        'min_investment'   => 'required|numeric|min:0',
        'max_investment'   => 'nullable|numeric|min:0|gt:min_investment',
        'daily_return'     => 'required|numeric|min:0|max:100',
        'duration_days'    => 'required|integer|min:1',
        'total_return'     => 'required|numeric|min:0',
        'description'      => 'nullable|string|max:2000',
        'active'        => 'boolean',
    ]);

    Package::create([
        'name'             => $validated['name'],
        'description'      => $validated['description'] ?? null,
        'min_investment'   => $validated['min_investment'],
        'max_investment'   => $validated['max_investment'] ?? null,
        'daily_return'     => $validated['daily_return'],
        'duration_days'    => $validated['duration_days'],
        'total_return'     => $validated['total_return'],
        'active'        => $validated['active'] ?? true,
    ]);

    return redirect()->route('admin.packages')
        ->with('success', 'Package created successfully.');
}

public function update(Request $request, Package $package) {
        $request->validate([
            'name' => 'required|string|max:255',
            'min_investment' => 'required|numeric|min:0',
            'max_investment' => 'nullable|numeric|min:0|gt:min_investment',
            'daily_return' => 'required|numeric|min:0|max:100',
            'duration_days' => 'required|integer|min:1',
            'total_return' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:2000',
            'active' => 'boolean',
        ]);
        $package->update($request->all());
        return back()->with('success', 'Package Updated Successfully!');
    }

    // method to delete a package pls with a confirmation prompt in the frontend
    public function destroy(Package $package)
    {
        
        $package->delete();
        return redirect()->route('admin.packages')
            ->with('success', 'Package deleted successfully.');
    }
}
