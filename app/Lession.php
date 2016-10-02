<?php

namespace App;

use App\Tag;
use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    /**
     * fillable property of Lession Model
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];

    /**
     * Tags Has many relation
     *
     * @return mix
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
