<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    public $timestamps = true;

    // public function roles(){
    //     return $this->belongsToMany(Roles::class);
    // }

    static public function Checklogin($username, $password) {
        return self::where('username', $username)->where('password', $password)->first();
    }

    static public function getAllUsers (){
    	return self::get();
    }

    static public function getUserById($id){
        return self::where('id',$id)->first();
    }
    static public function findUserByUsername($username) {
    	return self::where('username', $username)->first();
    }

    public static function getUserByLevel($level_id) {
        return self::where('level_id', $level_id)->paginate(12);
    }
}
