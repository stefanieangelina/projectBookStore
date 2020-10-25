<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
    use SoftDeletes;
    /**
     * Get the genre that owns the book.
     */
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
}
