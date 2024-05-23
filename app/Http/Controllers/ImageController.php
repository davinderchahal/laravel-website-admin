<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Helpers\CustomImageHelper;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.gallery', [
            'images' => Image::all(),
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
    public function store(Request $request): RedirectResponse
    {
        $validated = Validator::make(
            $request->all(),
            [
                'image.*' => 'required|image|dimensions:min_width=416,min_height=533',
            ],
            [
                'dimensions' => 'The :attribute should be minimun width :min_width and minimum height :min_height.',
            ],
            [
                'image.*' => 'Images',
            ]
        )->validate();
        $validated = array();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = Storage::disk('public')->put('gallery', $image);
                $validated[] = array('image' => $path);
            }
        }
        if (!empty($validated)) {
            Image::insert($validated);
            return redirect(route('image.index'))->with('status', 'Images successfully uploaded.');
        } else {
            return redirect(route('image.index'))->with('fail', 'Unable to upload images.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image): RedirectResponse
    {
        if (isset($image->image)) {
            if (!empty($image->image)) {
                CustomImageHelper::deleteImages($image->image);
            }
        }
        $image->delete();
        return redirect(route('image.index'))->with('status', 'Image successfully deleted.');
    }
}
