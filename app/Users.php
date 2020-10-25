<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // tabel users
    protected $table = "users";

    protected $primaryKey = "id";
    protected $keyType = "integer";

    public $timestamps = false;
}
