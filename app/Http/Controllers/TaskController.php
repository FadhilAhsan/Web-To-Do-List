<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function create(Request $request)
    {	
    	if ($request->task == '') {
    		$meta =  $this->createMeta(500,false,'task is required');
			return response()->json(array('meta'=>$meta, 'data' => null), 500);
		}

    	$data = new Task;
    	$data->task = $request->task;

        if (!$data->save()) {
        	$meta =  $this->createMeta(500,false,'add task failed');
        	return response()->json(array('meta'=>$meta, 'data' => null), 500);
        }

		$meta = $this->createMeta(200,true,'success add task');
        return response()->json(array('meta'=>$meta, 'data' => $data), 200);
    }

    public function edit(Request $request)
    {	
    	if ($request->task == '' || $request->id == '' ) {
    		$meta =  $this->createMeta(500,false,'task and id is required');
			return response()->json(array('meta'=>$meta, 'data' => null), 500);
		}

    	$data = Task::find($request->id);
    	
    	if ($data == null) {
    		$meta =  $this->createMeta(400,true,'data not found');
        	return response()->json(array('meta'=>$meta, 'data' => null), 400);
    	}

    	$data->task = $request->task;

        if (!$data->save()) {
        	$meta =  $this->createMeta(500,false,'edit task failed');
        	return response()->json(array('meta'=>$meta, 'data' => null), 500);
        }

		$meta = $this->createMeta(200,true,'success edit task');
        return response()->json(array('meta'=>$meta, 'data' => $data), 200);
    }

    public function updateStatus(Request $request)
    {	
    	if ($request->id == '' ) {
    		$meta =  $this->createMeta(500,false,'id is required');
			return response()->json(array('meta'=>$meta, 'data' => null), 500);
		}

    	$data = Task::find($request->id);
    	
    	if ($data == null) {
    		$meta =  $this->createMeta(400,true,'data not found');
        	return response()->json(array('meta'=>$meta, 'data' => null), 400);
    	}

    	if ($data->status == false) {
    		$data->status = 1;
    	}else{
    		$data->status = 0;
    	}

        if (!$data->save()) {
        	$meta =  $this->createMeta(500,false,'update status failed');
        	return response()->json(array('meta'=>$meta, 'data' => null), 500);
        }

		$meta = $this->createMeta(200,true,'success update status');
        return response()->json(array('meta'=>$meta, 'data' => $data), 200);
    }

    public function delete($id)
    {	

    	$data = Task::find($id);

    	if ($data == null) {
    		$meta =  $this->createMeta(400,true,'data not found');
        	return response()->json(array('meta'=>$meta, 'data' => null), 400);
    	}

        if (!$data->delete()) {
        	$meta =  $this->createMeta(500,false,'delete task failed');
        	return response()->json(array('meta'=>$meta, 'data' => null), 500);
        }

		$meta = $this->createMeta(200,true,'success delete task');
        return response()->json(array('meta'=>$meta, 'data' => $data), 200);
    }

    public function deleteAll()
    {	

    	Task::truncate();

		$meta = $this->createMeta(200,true,'success delete all task');
        return response()->json(array('meta'=>$meta, 'data' => null), 200);
    }
}
