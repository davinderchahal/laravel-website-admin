<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Helpers\CustomImageHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $aboutRec = About::first();
        if (empty($aboutRec)) {
            $aboutRec = About::create([
                'tagline' => 'About Us',
            ]);
        }
        return view('admin.about', [
            'about' => $aboutRec,
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
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about): RedirectResponse
    {

        $validated = Validator::make(
            $request->all(),
            [
                'tagline' => 'required|string|max:100',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'box_title' => 'required|string|max:255',
                'box_description' => 'required|string',
                'service_list.title1' => 'string|max:50|nullable',
                'service_list.description1' => 'required_with:service_list.title1|string|nullable',
                'service_list.title2' => 'string|max:50|nullable',
                'service_list.description2' => 'required_with:service_list.title2|string|nullable',
                'service_list.title3' => 'string|max:50|nullable',
                'service_list.description3' => 'required_with:service_list.title3|string|nullable',
                'thumb_one' => 'image|dimensions:min_width=451,min_height=652',
                'thumb_two' => 'image|dimensions:min_width=305,min_height=441',
            ],
            [
                'dimensions' => 'The :attribute should be minimun width :min_width and minimum height :min_height.',
            ],
            [
                'service_list.title1' => 'Sub Title 1',
                'service_list.description1' => 'Sub Description 1',
                'service_list.title2' => 'Sub Title 2',
                'service_list.description2' => 'Sub Description 2',
                'service_list.title3' => 'Sub Title 3',
                'service_list.description3' => 'Sub Description 3',
            ]
        )->validate();

        if ($request->hasFile('thumb_one')) {
            if (isset($about->thumb_one)) {
                if (!empty($about->thumb_one)) {
                    CustomImageHelper::deleteImages($about->thumb_one);
                }
            }
            $path = Storage::disk('public')->put('about', $request->file('thumb_one'));
            $validated['thumb_one'] = $path;
        }
        if ($request->hasFile('thumb_two')) {
            if (isset($about->thumb_two)) {
                if (!empty($about->thumb_two)) {
                    CustomImageHelper::deleteImages($about->thumb_two);
                }
            }
            $path = Storage::disk('public')->put('about', $request->file('thumb_two'));
            $validated['thumb_two'] = $path;
        }
        $about->update($validated);
        return redirect(route('about.index'))->with('status', 'About successfully updated.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
