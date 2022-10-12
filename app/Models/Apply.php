<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table;
    protected $guarded= [];


    public function __construct()
    {
       $this->table="user_data";
    }
}
