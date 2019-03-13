<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $table = "counter";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $fillable = ['page', 'author', 'day', 'month'];
}
