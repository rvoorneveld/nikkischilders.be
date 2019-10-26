<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index(string $categorySlug)
    {
        if (0 === ($category = Category::where('slug', $categorySlug))->count()) {
            abort(404);
        }

        return view('category.index', [
            'category' => $category->first(),
            'categories' => Category::all(),
        ]);
    }

}
