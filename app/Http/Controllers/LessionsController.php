<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Lession;
use Response;
use App\Http\Acme\Transformers\LessionTransformer;


class LessionsController extends Controller
{
	/**
     * @var Acme\Transformers\LessionTransformer
     */
    protected $lessionTransformer;

    /**
     * @param LessionTransformer $lessionTransformer
     */
	public function __construct(LessionTransformer $lessionTransformer)
	{
		$this->lessionTransformer = $lessionTransformer;
	}

    /**
     * Display a listing of the resource.
     *
     * return Response
     */
    public function Index()
    {
    	$lessions =  Lession::all();

    	return $this->respond([
    		'data' => $this->lessionTransformer->transformCollection($lessions->all())
    	]);
    }

    /**
     * Display the specified resource
     *
     * @param  $id
     * @return Response
     */
    public function show($id)
    {
    	$lession = Lession::find($id);

    	if(!$lession)
    	{
            return $this->respondNotFound('Lession does not exist.');
    	}

    	return $this->respond([
    		'data' => $this->lessionTransformer->transform($lession)
    	]);
    }

    public function store()
    {
        dd('store');
    }
}
