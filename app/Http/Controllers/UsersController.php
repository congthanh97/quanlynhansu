<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

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
    	$user = new Users();
    	$users = $user::getUsers();
    	return view('admin.user.index', compact('users'));
	}
	


}
