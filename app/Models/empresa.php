<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ordenes(){
        return $this->hasMany(ordenes::class, 'id');
    }
}
