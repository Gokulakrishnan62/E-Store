<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories as CategoriesRequest;
use App\Models\Categories as CategoriesModel;

class Categories extends Controller
{
    public function create(CategoriesRequest $request)
    {
        try {
            $request->validated();
            CategoriesModel::create([
                'category_name' => $request['category_name'],
                'category_slug' => $request['category_slug'],
                'category_description' => !empty($request['category_description']) ? $request['category_description'] : '',
            ]);
            return redirect()->back()->with('success', 'Category created successfully!');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
    }

    public function listCategories()
    {
        $categories = CategoriesModel::all(['id', 'category_name', 'category_slug', 'category_description']);
        return view('Admin.Categories.List-categories', compact('categories'));
    }

    public function showCategory($id)
    {
        if (empty($id)) {
            return redirect()->back();
        }

        $category = CategoriesModel::find($id);
        if (!empty($category)) {
            return view('Admin.Categories.Show-category', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function updateCategory(CategoriesRequest $request)
    {
        try {
            $validate_data = $request->validated();
            $category = CategoriesModel::find($request['id']);
            $category->update([
                'category_name' => $validate_data['category_name'],
                'category_slug' => $validate_data['category_slug'],
                'category_description' => $validate_data['category_description'],
            ]);
            return redirect()->back()->with('success', 'Category updated successfully!');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
    }

    public function deleteCategory($id)
    {
        try {
            $category = CategoriesModel::find($id);
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully!');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
    }
}
