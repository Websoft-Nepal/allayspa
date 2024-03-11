<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function index()
    {
        $data = Blog::latest()->paginate(10);
        return $this->sendResponse($data, 'Blog data fetched successfully');
    }
    public function show(string $slug)
    {
        try {
            $data = Blog::where('slug', $slug)->first();
            return $this->sendResponse($data, 'Blog fetched successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError(throw $th,"Can fetch blog data",404);
        }
    }
}
