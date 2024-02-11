<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('pages.service.index', [
            'services' => Service::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:3|max:255',
        ]);

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('status', 'Service created successfully');
    }
    
    public function edit(Request $request, $id)
    {
        $service = Service::find($id);
        return view('pages.service.edit', [
            'service' => $service,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:3|max:255',
        ]);

        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->update();

        return redirect()->back()->with('status', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('services.index')->with('status', 'Service deleted successfully');
    }
}
