<?php

namespace App\Http\Controllers\API\Category;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return ApiResponse::sendResponse(Response::HTTP_OK, 'All categories retrieved successfully',CategoryResource::collection($categories));
    }
}
