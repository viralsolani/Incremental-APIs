<?php
namespace App\Http\Acme\Transformers;

use App\Http\Acme\Transformers;

class LessionTransformer extends Transformer
{

	public function transform($lession)
    {
    	return [
    		'title' => $lession['title'],
    		'body'  => $lession['body']
    	];
    }
}