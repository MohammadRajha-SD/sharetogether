<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StateDataTable;
use App\DataTables\TownDataTable;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    public function index(TownDataTable $dataTable)
    {
        return $dataTable->render('admin.towns.index');
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.towns.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|exists:cities,id',
            'name' => 'required',
        ]);

        Town::create([
            'name' => $request->name,
            'city_id' => $request->city,
        ]);

        return redirect()->route('admin.towns.index')->with('status', trans('messages.add'));
    }

    public function edit(string $id)
    {
        $town = Town::where('id', $id)->first();
        $cities = City::all();
        return view('admin.towns.edit', compact('town', 'cities'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'city' => 'required|exists:cities,id',
            'name' => 'required',
        ]);

        $town = Town::findOrFail($id);

        $town->update([
            'name' => $request->name,
            'city_id' => $request->city,
        ]);

        return redirect()->route('admin.towns.index')->with('status', trans('messages.edit'));
    }

    public function destroy(string $id)
    {
        $town = Town::findOrFail($id);
        $town->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully.!']);
    }
}
