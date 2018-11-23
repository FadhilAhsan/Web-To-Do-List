<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class MainController extends Controller
{
 	public function index()
    {

        $data = Task::all();

        if ($data == null) {
        	$meta = $this->createMeta(200,true,'success get to do list');
        	return response()->json(array('meta'=> $meta, 'data' => null), 200);
        }
        $meta = $this->createMeta(200,true,'success get to do list');
        return response()->json(array('meta' => $meta , 'data' => $data), 200);
    }  
}
