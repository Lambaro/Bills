<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table='bills';
    protected $guarded=[];


    public function user() {
        return $this->belongsTo(User::class);
    }
      public function userDetails() {
        return $this->belongsTo(User::class)->with(UserDetails::class);

    }




}
