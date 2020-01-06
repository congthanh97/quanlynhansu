<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
     //
    protected $table = "levels" ;
    // public $timestamps = true;
    
    //get all levels
    public function Users(){
        return $this->hasMany('App/Models/Users');
    }

    public static function getLevels() {
    	return self::select('*')->get(); 	
    }
    
    // //get level active
    // public static function getlevelActive() {
    // 	return self::where('status', 1)->get();
    // }

    //select Level by id
    public static function getLevelById($id) {
        return self::where('id', $id)->first();
    }


    //select Level by name
    public static function getLevelByName($name) {
        return self::where('name', $name)->first();
    }

    public static function getLevelByNameDifId($id,$name) {
        return self::where('name', $name)->where('id','!=',$id)->first();
    }


    public static function addLevel($name) {
        self::insert([
            'name'=>$name
        ]);
    }


    public static function deleteLevel($id) {
        self::where('id', $id)->delete();
    }

    public static function editLevel($id, $name) {
        self::where('id', $id)->update([
                'name'=>$name,
            ]);
    }
}
