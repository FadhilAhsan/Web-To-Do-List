<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function createMeta($statusCode, $status, $message){
    	$meta = array(
    		'status_code' => $statusCode,
    		'status' => $status,
    		'message' => $message
    	);

    	return $meta;
    } 
}
