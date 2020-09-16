<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table = "menu";
    public $timestamps = false;

    protected $fillable = ['name_menu', 'type', 'price', 'stock'];
}