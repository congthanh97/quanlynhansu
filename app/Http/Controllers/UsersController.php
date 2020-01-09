<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Level;

class UsersController extends Controller
{
    //
     public function logOut() {
		session()->forget('User');
		return redirect('admin/login');
    }

    public function postLogin(Request $request) {
		$user = new Users();
		$username = $request->username;
		$password = $request->password;
		$users = $user::Checklogin($username, $password);
		if($users==null) {
			$alert = "Sai mật khẩu hoặc tài khoản!";
			return redirect()->back()->with('alert', $alert);
		}
		else {
			$roles = $user::findUserByUsername($username);
            $role = $roles->level_id;  //level 
			if($role == 1){
				session([
					'UserAdmin'=>$username,
                    'Role'=>$roles->level_id,
                    
				]);
				return redirect('users');
			}
			else 
				
				return redirect('welcome');
			
			
		}
	}

    
    public function getLogin(){
		if(session('User')!=null) {
			return redirect('admin');
		}
    	return view('admin/user/login');
	}
	

	//User
	 public function addUser(Request $request){
		$user = new Users();
		if($request->name){
			 //postcate
			// $name = $request->input('name');
			// //$check = $user::getLevelByName($name);
			// if($check==null) {
			// 	$level::addLevel($name);
			// 	return json_encode('1');
			// }
			// else {
			// 	return json_encode('0');
			// }
		}else{
			//getcate
			return view('admin/user/addUser');
		}
	}

	//
    public function getUsers() {
		$users = Users::with('level')->latest()->get();

    	return view('admin.user.index', compact('users'));
	}

	public function userCreate()
	{
		$levels = Level::get();

		return view('admin.user.create', compact('levels'));
	}

	public function userCreateSave(Request $request)
	{
		$validatedData = $request->validate([
			'username' => 'required|string|min:4|max:32|unique:users',
			'email' => 'required|string|email|unique:users',
			'fullname' => 'required',
			'mobile' => 'required',
			'workplace' => 'required',
			'level' => 'required|numeric|exists:levels,id',
			'password' => 'required|min:6',
			'password_confirmation' => 'required|same:password',
		]);

		$user = Users::create([
			'username' => $request->username,
			'email' => $request->email,
			'fullname' => $request->fullname,
			'mobile' => $request->mobile,
			'workplace' => $request->workplace,
			'level_id' => $request->level,
			'password' => $request->password,
		]);

		return redirect()->route('users.index')->with('success', 'Create user success!');
	}

	public function userEdit($id)
	{
		$user = Users::where('id', $id)->with('level')->first();
		$levels = Level::get();

		return view('admin.user.edit', compact('user', 'levels'));
	}

	public function userEditSave(Request $request, $id)
	{
		$validatedData = $request->validate([
			'fullname' => 'required',
			'mobile' => 'required',
			'workplace' => 'required',
			'level' => 'required|numeric|exists:levels,id',
		]);

		Users::find($id)->update([
			'fullname' => $request->fullname,
			'mobile' => $request->mobile,
			'workplace' => $request->workplace,
			'level_id' => $request->level,
		]);

		return redirect()->route('users.index')->with('success', 'Edit user success!');
	}

	public function userDelete($id)
	{
		$user = Users::find($id)->first();
		$user->delete();

		return redirect()->route('users.index')->with('success', 'Delete user success!');
	}
	


}
