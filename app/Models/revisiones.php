<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class revisiones extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ordenes(){
        return $this->belongsTo(ordenes::class, 'ordenes_id');
    }
}
