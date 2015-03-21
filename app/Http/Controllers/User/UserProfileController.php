<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;

use Redirect, Input, Auth;

class UserProfileController extends Controller {
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function view($id){

        return view('user.viewprofile')->withUser(User::find($id));
    }

    public function edit($id)
    {
        return view('user.editprofile')->withUser(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);

        $user = User::find($id);
        $user->name = Input::get('name');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->gender = Input::get('gender');
        $user->phone = Input::get('phone');
        $user->address = Input::get('address');
        $user->zip_code = Input::get('zip_code');

        if ($user->save()) {
            return Redirect::to('/home');
        } else {
            return Redirect::back()->withInput()->withErrors('error！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return Redirect::to('/home');
    }

}