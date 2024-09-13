<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CityDataTable;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(CityDataTable $dataTable)
    {
        return $dataTable->render('admin.cities.index');
    }

    public function create()
    {
        $states = State::all();
        return view('admin.cities.create', compact('states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state' => 'required|exists:states,id',
            'name' => 'required',
        ]);

        City::create([
            'name' => $request->name,
            'state_id' => $request->state,
        ]);

        return redirect()->route('admin.cities.index')->with('status', trans('messages.add'));
    }

    public function edit(string $id)
    {
        $city = City::where('id', $id)->first();
        $states = State::all();
        return view('admin.cities.edit', compact('states', 'city'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'state' => 'required|exists:states,id',
            'name' => 'required',
        ]);

        $city = City::findOrFail($id);

        $city->update([
            'name' => $request->name,
            'state_id' => $request->state,
        ]);

        return redirect()->route('admin.cities.index')->with('status', trans('messages.edit'));
    }

    public function destroy(string $id)
    {
        $city = City::findOrFail($id);

        if ($city->towns()->exists()) {
            return response(['status' => 'error', 'message' => 'Cannot delete this city because it has towns.']);
        }

        $city->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully.!']);
    }
}
