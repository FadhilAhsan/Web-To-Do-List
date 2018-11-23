<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class MainController extends Controller
{
 	public function index()
    {
    	$limit = 0;
    	$offset = 0;
    	if (!request()->has('limit')) {
			$limit = 10;
		}else{
			$limit = request()->input('limit');
		}

		if (!request()->has('offset')) {
			$offset = 0;
		}else{
			$offset = request()->input('offset');
		}

        $data = Task::offset($offset)->limit($limit)->get();

        if ($data == null) {
        	$meta = $this->createMeta(200,true,'success get to do list');
        	return response()->json(array('meta'=> $meta, 'data' => null), 200);
        }
        $meta = $this->createMeta(200,true,'success get to do list');
        return response()->json(array('meta' => $meta , 'data' => $data), 200);
    }  
}
