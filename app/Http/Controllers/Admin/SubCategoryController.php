<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = Category::where('parent_id', '!=', null)
            ->orderBy('parent_id')->paginate(10);

        return view('admin.sub-categories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::where('parent_id', null)->orderBy('parent_id')->get();

        return view('admin.sub-categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'category' => ['required', 'integer', 'exists:categories,id'],
            'status' => ['required', 'integer'],
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->category,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.sub-categories.index')->with('status', trans('messages.add'));
    }

    public function edit(string $id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.sub-categories.edit', compact('category'));
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

        return redirect()->route('admin.sub-categories.index')->with('status', trans('messages.edit'));
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
