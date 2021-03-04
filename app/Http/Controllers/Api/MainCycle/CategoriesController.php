<?php

namespace App\Http\Controllers\Api\MainCycle;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return responseJson(1, 'success', $categories);
    }
}
