<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    // tabel books
    protected $table = "books";

    protected $primaryKey = "id";
    protected $keyType = "integer";

    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
}
