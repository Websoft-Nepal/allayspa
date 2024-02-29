<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use Illuminate\Support\Facades\URL;

class GalleryController extends BaseController
{
    public function index()
    {
        $images = Gallery::paginate(10);
        return view('pages.gallery.index', compact('images'));
    }
    public function store(Request $request)
    {
        dd(config('APP_NAME'));
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);
        // Check if the request has a file uploaded with the key 'image'
        if ($request->hasFile('image')) {
            // Get the file from the request
            $image = $request->file('image');
            dd(config('APP_IP'));
            // Generate a unique filename for the image
            $filename = uniqid('image_') . '.' . $image->getClientOriginalExtension();
            $filename = $this->url . '/gallery/' . uniqid('image_') . '.' . $image->getClientOriginalExtension();

            // Store the image in the 'uploads/gallery' directory within the public folder
            $image->move(('uploads/gallery'), $filename);

            //Store name in database
            Gallery::create([
                'image' => $filename
            ]);

            // Redirect to the gallery index route with a success message
            return redirect()->route('admin.gallery.index')->with('status', 'Image stored successfully');
        }

        // If the request doesn't have a file uploaded, redirect back with an error message
        return redirect()->back()->with('error', 'No image uploaded.');
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);
        $gallery = Gallery::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique filename for the new image
            $filename = uniqid('image_') . '.' . $image->getClientOriginalExtension();

            // For server
            // $uploadsDirectory = __DIR__ . '/uploads/gallery/';

            // For laravel package
            $uploadsDirectory = public_path('uploads/gallery/');

            // Move the uploaded file to the desired directory
            $image->move($uploadsDirectory, $filename);

            // Unlink the previous image if it exists
            if ($gallery->image) {
                $previousImage = $uploadsDirectory . $gallery->image;
                if (file_exists($previousImage)) {
                    unlink($previousImage);
                }
            }
        }
        return redirect()->route('admin.gallery.index')->with('status', 'Password updated successfully');
    }
    public function destroy(int $id)
    {
        // Find the gallery item by ID
        $gallery = Gallery::findOrFail($id);

        // For server
        // $uploadsDirectory = __DIR__ . '/uploads/gallery/';

        // For laravel package
        $uploadsDirectory = public_path('uploads/gallery/');

        // Delete the image file from the server if it exists
        if ($gallery->image) {
            $imagePath = $uploadsDirectory . $gallery->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the gallery item from the database
        $gallery->delete();

        // Redirect back with a success message
        return redirect()->route('admin.gallery.index')->with('status', 'Image deleted successfully');
    }
}
