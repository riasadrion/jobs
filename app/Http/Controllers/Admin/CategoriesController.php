<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $cat = new Category();
        $cat->name = request('name');
        $cat->save();
        return redirect("/controller-categories")->with('success','Category created successfully!');
    }

    public function update(Request $request, Category $controller_category)
    {
        $controller_category->name = $request->input('name');
        $controller_category->save();
        return back();
    }


    public function destroy(Category $controller_category)
    {
        $controller_category->delete();
        return back();
    }
}
