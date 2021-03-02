<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = User::all();
        return view('users.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all()->sortBy('name')->pluck('name', 'id');
        return view('users.create', compact('role'));
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
            'password' => 'required|confirmed',
            'email' => 'required',
            'list_roles' => 'required' 
        ];
        $this->validate($request, $rules);
        $request->merge(['password' => bcrypt($request->password)]);
        $user = User::create($request->except('list_roles'));
        $user->assignRole($request->input('list_roles'));
        flash('Success')->success();
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::findOrFail($id);
        $role = Role::all()->pluck('name', 'id');
        return view('users.edit', compact('model', 'role'));
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
        $rules = [
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required',
            'list_roles' => 'required' 
        ];
        $this->validate($request, $rules);
        $model = User::findOrFail($id);
        $request->merge(['password' => bcrypt($request->password)]);
        $model->syncRoles($request->input('list_roles'));
        $model->update($request->all());
        flash('Updated')->success();
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = User::findOrFail($id);
        $model->delete();
        flash('deleted')->success();
        return back();
    }
}
