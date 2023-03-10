<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    use HasFactory;
    protected $table = "secrets";

    public function user(){
        return $this->belongsTo("App\Models\User","user_id");
    }

}
