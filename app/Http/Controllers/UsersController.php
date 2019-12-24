<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    //
     public function logOut() {
		session()->forget('UserAdmin');
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
				return redirect('admin');
			}
			else 
				
				return redirect('welcome');
			
			
		}
	}

    
    public function getLogin(){
		if(session('UserAdmin')!=null) {
			return redirect('admin');
		}
    	return view('admin/user/login');
    }

}
