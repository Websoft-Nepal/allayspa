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
        return $this->sendResponse($data,'Blog data fetched successfully');
    }
}
