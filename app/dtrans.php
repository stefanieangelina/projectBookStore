<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class dtrans extends Model
{
    protected $table = "dtrans";

    protected $primaryKey = "id";
    protected $keyType = "integer";

    public $timestamps = false;
}
