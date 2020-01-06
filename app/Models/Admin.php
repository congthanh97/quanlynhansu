<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     protected $table = "admins";
    public $timestamps = true;

    // public function roles(){
    //     return $this->belongsToMany(Roles::class);
    // }

    static public function Checklogin($adminName, $password) {
        return self::where('adminName', $adminName)->where('password', $password)->first();
    }

    static public function getAllAdmin (){
    	return self::get();
    }

    static public function getAdminById($id){
        return self::where('id',$id)->first();
    }
    static public function findUserByAdminName($adminName) {
    	return self::where('adminName', $adminName)->first();
    }

    // public static function getUserByLevel($level_id) {
    //     return self::where('level_id', $level_id)->paginate(12);
    // }

    public static function addAdmin($adminName,$password,$mobile,$workplace,$level_id) {
        self::insert([
            'adminName'=>$adminName,
            'password'=>$password,
            'mobile'=>$mobile,
            'workplace'=>$workplace,
            'level_id'=>$level_id
        ]);
    }
}
