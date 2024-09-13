<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CountryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    public function index(CountryDataTable $dataTable)
    {
        return $dataTable->render('admin.countries.index');
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|string|max:3',
        ]);
        Country::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('admin.countries.index')->with('status', trans('messages.add'));
    }

    public function edit(string $id)
    {
        $country = Country::where('id', $id)->first();
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:3',
        ]);

        $category = Country::findOrFail($id);

        $category->update([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
        ]);

        return redirect()->route('admin.countries.index')->with('status', trans('messages.edit'));
    }

    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);

        if ($country->states()->exists()) {
            return response(['status' => 'error', 'message' => 'Cannot delete this country because it has states.']);
        }

        $country->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully.!']);
    }
}
