<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function create(){
        return view('admin.permission.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'role_id'=>'required|unique:permissions'
        ]);
            Permission::create($request->all());
            return redirect()->route('permissions.index')->with('message', 'Permission updated successfully!');
    }

    public function index(){
        $permissions = Permission::get();
        return view('admin.permission.index',compact('permissions'));
    }

    public function edit($id){
        $permission = Permission::find($id);
        return view('admin.permission.edit',compact('permission'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required'
        ]);
            $permission = Permission::find($id);
            $permission->update($request->all());
            return redirect()->back()->with('message', 'Permission updated successfully!');
    }

    public function destroy(){
        Permission::find($id)->delete();
        return redirect()->route('permissions.index')->with('message', 'Permission deleted successfully!');

    }
}
