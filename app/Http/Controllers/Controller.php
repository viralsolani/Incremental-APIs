<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $statusCode = 200;

    public function getStatusCode()
    {
    	return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
    	$this->statusCode = $statusCode;

    	return $this;
    }

    public function respondNotFound($message = "Not Found")
    {
    	return $this->setStatusCode('404')->respondWithError($message);
    }

    public function respondInternalError($message = "Internal Error")
    {
    	return $this->setStatusCode('500')->respondWithError($message);
    }

    public function respond($data, $headers = [])
    {
    	return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message)
    {
    	return $this->respond([
    			'error' => [
    				'message' => $message,
    				'status_code' => $this->getStatusCode(),
    			] 
    		]);
    }
}
