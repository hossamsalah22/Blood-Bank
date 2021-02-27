<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = City::paginate(10);
        return view('cities.index', compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorate = Governorate::all()
            ->sortBy('name')->pluck('name', 'id');
        return view('cities.create', compact('governorate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'governorate_id' => 'required|exists:governorates,id'
        ];
        $this->validate($request, $rules);

        $record = City::create($request->all());
        flash('Success')->success();
        return redirect(route('city.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = City::findOrFail($id);
        $record = $model->clients;
        $donation = $model->donation_requests;
        return view('cities.show', compact('model', 'record', 'donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = City::findOrFail($id);
        return view('cities.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = City::findOrFail($id);
        $record->update($request->all());
        flash('Success')->success();
        return redirect(route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = City::findOrFail($id);
        $record->delete();
        flash('Deleted')->success();
        return back();
    }
}
