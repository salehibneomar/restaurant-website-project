<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('backend.profile.profile', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('backend.profile.profile_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $validated = $request->validate([
            'name' => 'min:3|max:200',
            'email' => 'email|unique:users,email,'.$user->id,
            'phone' => 'unique:users,phone,'.$user->id
        ]);

        $user->update($request->all());

        if($user->wasChanged()){
            return redirect()
            ->route('profile.read')
            ->with(['type'=>'success', 'msg'=>'Updated!']);
        }

        return redirect()
                ->route('profile.read')
                ->with(['type'=>'info', 'msg'=>'No Change!']);
    }

    public function editPassword()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('backend.profile.password_edit', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $validated = $request->validate([
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if(!Hash::check($request->current_password, $user->password)){
           return back()->with(['type'=>'danger', 'msg'=>'Incorrect current password!']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()
        ->route('profile.pass.edit')
        ->with(['type'=>'success', 'msg'=>'Updated!']);
    }

 //
}
