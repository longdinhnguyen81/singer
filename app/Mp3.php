<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mp3 extends Model
{
    protected $table = "mp3";
    protected $primaryKey = "id";
    public $timestamps = true;
    public $fillable = ['title', 'artist', 'src', 'length'];
}
