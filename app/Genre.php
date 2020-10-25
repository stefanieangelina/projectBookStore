<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    //
    use SoftDeletes;
    /**
     * Get the Books for the current genre.
     */
    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
