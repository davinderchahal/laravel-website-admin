<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageBannerPostRequest;
use App\Models\PageBanner;
use App\Helpers\CustomImageHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PageBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.page_banner', [
            'page_banner' => PageBanner::first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageBannerPostRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('about_banner')) {
            $path = Storage::disk('public')->put('page_banner', $request->file('about_banner'));
            $validated['about_banner'] = $path;
        }

        if ($request->hasFile('contact_banner')) {
            $path = Storage::disk('public')->put('page_banner', $request->file('contact_banner'));
            $validated['contact_banner'] = $path;
        }

        if ($request->hasFile('faqs_banner')) {
            $path = Storage::disk('public')->put('page_banner', $request->file('faqs_banner'));
            $validated['faqs_banner'] = $path;
        }

        PageBanner::create($validated);
        return redirect(route('page-banner.index'))->with('status', 'Page Banner successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PageBanner $pageBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PageBanner $pageBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageBannerPostRequest $request, PageBanner $pageBanner): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('about_banner')) {
            if (isset($pageBanner->about_banner)) {
                if (!empty($pageBanner->about_banner)) {
                    CustomImageHelper::deleteImages($pageBanner->about_banner);
                }
            }
            $path = Storage::disk('public')->put('page_banner', $request->file('about_banner'));
            $validated['about_banner'] = $path;
        }

        if ($request->hasFile('contact_banner')) {
            if (isset($pageBanner->contact_banner)) {
                if (!empty($pageBanner->contact_banner)) {
                    CustomImageHelper::deleteImages($pageBanner->contact_banner);
                }
            }
            $path = Storage::disk('public')->put('page_banner', $request->file('contact_banner'));
            $validated['contact_banner'] = $path;
        }

        if ($request->hasFile('faqs_banner')) {
            if (isset($pageBanner->faqs_banner)) {
                if (!empty($pageBanner->faqs_banner)) {
                    CustomImageHelper::deleteImages($pageBanner->faqs_banner);
                }
            }
            $path = Storage::disk('public')->put('page_banner', $request->file('faqs_banner'));
            $validated['faqs_banner'] = $path;
        }

        $pageBanner->update($validated);
        return redirect(route('page-banner.index'))->with('status', 'Page Banner successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PageBanner $pageBanner)
    {
        //
    }
}
