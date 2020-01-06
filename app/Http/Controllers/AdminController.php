<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\level;
use App\Models\Admin;

class AdminController extends Controller
{
    //
    
     public function logOut() {
		session()->forget('UserAdmin');
		return redirect('admin/login');
    }

    public function postLogin(Request $request) {
		$admin = new Admin();
		$adminName = $request->username;
		$password = $request->password;
		$admins = $admin::Checklogin($adminName, $password);
		if($admins==null) {
			$alert = "Sai mật khẩu hoặc tài khoản!";
			return redirect()->back()->with('alert', $alert);
		}
		else {
			$roles = $admin::findUserByAdminName($adminName);
            $role = $roles->level_id;  //level 
			if($role == 0){
				session([
					'UserAdmin'=>$adminName,
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
    	return view('admin/login');
	}




    public function admin() {
        // $level =  new Level();
        // $levels =  $level::getLevels();
        // return view('admin/index',compact("levels"));
        return view('admin/index');
    }
}
