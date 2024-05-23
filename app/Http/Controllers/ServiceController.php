<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicePostRequest;
use App\Models\Service;
use App\Helpers\CustomImageHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.service.index', [
            'services' => Service::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.service.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('service', $request->file('image'));
            $validated['image'] = $path;
        }
        $service = Service::create($validated);
        return redirect(route('service.index'))->with('status', 'Service successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.add', [
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicePostRequest $request, Service $service)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if (isset($service->image)) {
                if (!empty($service->image)) {
                    CustomImageHelper::deleteImages($service->image);
                }
            }
            $path = Storage::disk('public')->put('service', $request->file('image'));
            $validated['image'] = $path;
        }
        $service->update($validated);
        return redirect(route('service.index'))->with('status', 'Service successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if (isset($service->image)) {
            if (!empty($service->image)) {
                CustomImageHelper::deleteImages($service->image);
            }
        }
        $service->delete();
        return redirect(route('service.index'))->with('status', 'Service successfully deleted.');
    }
}
