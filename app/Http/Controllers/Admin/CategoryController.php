<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function save(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->description = $data['description'];

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->status = $request-> status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully!');
    }
}
