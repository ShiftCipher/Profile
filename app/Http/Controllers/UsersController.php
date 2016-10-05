<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\User;
use File;

class UsersController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      return view('users.edit', compact('user'));
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
      $user = User::findOrFail($id);

      $validator = Validator::make($request->all(), $this->rules());
      if ($validator->fails()) {
        Flash('Validation Fails!', 'danger');
        return redirect('users/' . $user->id . '/edit')
          ->withErrors($validator)
          ->withInput();
      } else {
        $request->photo = '/img/users/profile.png';
      }
      $user->name = $request->name;
      $user->photo = $request->photo;
      $user->email = $request->email;
      $user->nickname = $request->nickname;
      $user->address = $request->address;
      $user->telephone = $request->telephone;
      $user->cellphone = $request->cellphone;
      $user->save();

      Flash('Update Complete!', 'success');
      return redirect('users/' . $user->id . '/edit');
    }

    public function rules()
    {
      return [
        'name' => 'string|required|max:255',
        'email' => 'email|max:125',
        'photo' => 'image|optional',
        'nickname' => 'string|max:255',
        'address' => 'string|max:255',
        'telephone' => 'string|max:20',
        'cellphone' => 'string|max:20',
      ];
    }

}
