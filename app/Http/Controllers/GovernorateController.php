<?php

namespace App\Http\Controllers;

use App\Http\Requests\Web\GovernorateRequest;
use App\Models\Governorate;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = Governorate::paginate(10);
        return view('governorates.index', compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GovernorateRequest $request)
    {
        $record = Governorate::create($request->all());
        flash('Success')->success();
        return redirect(route('governorate.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Governorate::findOrFail($id);
        return view('governorates.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Governorate::findOrFail($id);
        return view('governorates.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GovernorateRequest $request, $id)
    {
        $record = Governorate::findOrFail($id);
        $record->update($request->all());
        flash('Updated')->success();
        return redirect(route('governorate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Governorate::findOrFail($id);
        $record->delete();
        flash('Deleted')->success();
        return back();
    }
}
