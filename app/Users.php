<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes;

    // tabel users
    protected $table = "users";

    protected $primaryKey = "id";
    protected $keyType = "integer";

    public $timestamps = false;
}
