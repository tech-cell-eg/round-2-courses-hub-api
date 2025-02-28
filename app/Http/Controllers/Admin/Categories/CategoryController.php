<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:category-store|category-list|category-create|category-edit|category-delete', 'auth:admins']);
    }


    public function index()
    {
        $categories = Category::get();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
//        if (!auth()->guard('admins')->user()->can('category-create')) {
//            abort(403, 'Unauthorized');
//        }
        return view('dashboard.categories.create');
    }

    public function store(CategoryRequest $request)
    {
//        if (!auth()->guard('admins')->user()->can('category-store')) {
//            abort(403, 'Unauthorized');
//        }
        $validated = $request->validated();
        Category::create($validated);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');

    }

    public function edit($id)
    {
        if (!auth()->guard('admins')->user()->can('category-create')) {
            abort(403, 'Unauthorized');
        }
        $category = Category::where('id',$id)->first();
        return view('dashboard.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request,$id)
    {
        $validated = $request->validated();

        Category::where('id',$id)->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');

    }

    public function destroy($id){
        Category::where('id',$id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
