<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'parent_id' => null,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.categories.index')->with('status', trans('messages.add'));
    }

    public function edit(string $id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $validatedData['name'],
            'parent_id' => null,
            'slug' => Str::slug($validatedData['name']),
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('admin.categories.index')->with('status', trans('messages.edit'));
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if ($category->children()->exists()) {
            return redirect()->back()->with('error', 'Cannot delete this category because it has subcategories.');
        }

        $category->delete();

        return redirect()->back()->with('status', 'Category deleted successfully.');
    }
}
