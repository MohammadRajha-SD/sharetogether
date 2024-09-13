<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StateDataTable;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(StateDataTable $dataTable)
    {
        return $dataTable->render('admin.states.index');
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.states.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required|exists:countries,id',
            'name' => 'required',
        ]);

        State::create([
            'name' => $request->name,
            'country_id' => $request->country,
        ]);

        return redirect()->route('admin.states.index')->with('status', trans('messages.add'));
    }

    public function edit(string $id)
    {
        $state = State::where('id', $id)->first();
        $countries = Country::all();
        return view('admin.states.edit', compact('state', 'countries'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'country' => 'required|exists:countries,id',
            'name' => 'required',
        ]);

        $state = State::findOrFail($id);

        $state->update([
            'name' => $request->name,
            'country_id' => $request->country,
        ]);

        return redirect()->route('admin.states.index')->with('status', trans('messages.edit'));
    }

    public function destroy(string $id)
    {
        $state = State::findOrFail($id);

        if ($state->cities()->exists()) {
            return response(['status' => 'error', 'message' => 'Cannot delete this state because it has cities.']);
        }

        $state->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully.!']);
    }
}
