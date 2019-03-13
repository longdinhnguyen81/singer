<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = "picture";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $fillable = ['picture', 'description'];
}
