<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    
    public function create()
    {
        return view('user.create');
    }

   
    public function store(StoreRequest $request)
    {        
        $data = $request->validated();
        User::FirstOrCreate($data);
        return redirect()->route('users.index');
    }

    
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

  
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    
    public function update(UpdateRequest $request, $id)
    {
        $user = User::find($id);
        $data = $request->validated();
        $user->update($data);
        return view('user.show', compact('user'));
    }

    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
