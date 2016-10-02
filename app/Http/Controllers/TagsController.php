<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Lession;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Acme\Transformers\TagTransformer;

class TagsController extends Controller
{

    /**
     * @param TagTransformer $TagTransformer
     */
    public function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }
    /**
     * Display a listing of the resource.
     *
     * return Response
     */
    public function Index($lessionId = null)
    {
       $tags = $this->getTags($lessionId);

        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($tags->all())
        ]);
    }

    private function getTags($lessionId)
    {
       return $lessionId ? Lession::findOrFail($lessionId)->tags : Tag::all();
    }
}
