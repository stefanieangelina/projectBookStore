<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    // tabel genres
    protected $table = "genres";

    protected $primaryKey = "id";
    protected $keyType = "integer";

    public $timestamps = false;
}
