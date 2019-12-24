<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\level;
use App\Models\Users;

class LevelController extends Controller
{

	public function deletelevel($id) {
    	$user = Users::getUserByLevel($id);
    	if(count($user)==0){
			level::deleteLevel($id);
			return json_encode(1);
    	}
    	else{
    		return json_encode(0);
    	}
	}

    public function editLevel($id, Request $request) {//editLevel
		$level = new level();

		if($request->name){
			$name = trim($request->name);

			if($level::getLevelByNameDifId($id, $name)!=null){
				return json_encode('0');
			}
			else {
				$level::editLevel($id, $name);
	    		$cates = $level::getLevels();
	    		return json_encode('1');
			}
			
		}
		else {
			$level = new level();
			$levels = $level->getLevelById($id);
			return view('admin/level/LevelModal', compact('levels'));
		}

	}

    public function addLevel(Request $request){
		$level = new level();
		if($request->name){
			 //postcate
			$name = $request->input('name');
			$check = $level::getLevelByName($name);
			if($check==null) {
				$level::addLevel($name);
				return json_encode('1');
			}
			else {
				return json_encode('0');
			}
		}else{
			//getcate
			return view('admin/level/addlevel');
		}
	}
    public function getlevel() {
    	$level = new level();
    	$levels = $level::getLevels();
    	return view('admin.level.index', compact('levels'));
    }
}
