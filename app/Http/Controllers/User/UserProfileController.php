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

        if(Auth::user()->rid != 3 && Auth::user()->rid != 2 && Auth::id() != $id ){
            return Redirect::to('/home');
        }

        return view('user.viewprofile')->withUser(User::find($id));
    }

    public function edit($id)
    {
        if(Auth::user()->rid != 3 && Auth::user()->rid != 2 && Auth::id() != $id ){
            return Redirect::to('/home');
        }
        else if (Auth::user()->rid == 2 && (User::find($id)->rid == 3 || User::find($id)->rid == 2)  && Auth::id() != $id) {          
            return Redirect::to('/admin/users/home');
        }

        return view('user.editprofile')->withUser(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if( Auth::user()->rid != 2 && Auth::user()->rid != 3 && Auth::id() != $id && (Auth::user()->rid == 2 && ($id == 2 || $id == 3 )) ){
            return Redirect::to('/admin/users/home');
        }
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);

        $user = User::find($id);
        $user->name = Input::get('name');
        if(Input::get('rid')!=null){
            $user->rid = Input::get('rid');
        }
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->gender = Input::get('gender');
        $user->phone = Input::get('phone');
        $user->address = Input::get('address');
        $user->zip_code = Input::get('zip_code');
        $user->birth = Input::get('birth');

        if ($user->save()) {
            return Redirect::to('/user/'.$id.'/profile');
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