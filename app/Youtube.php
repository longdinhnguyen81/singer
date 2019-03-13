<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $table = "youtube";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $fillable = ['link'];
}
