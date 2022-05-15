<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model{
    use HasFactory;
    public function administrateur(){
        return $this->belongsTo(User::class);
    }
    public function Messagesdegroupes(){
        return $this->hasMany(Messagesdegroupes::class);
    }
    public function archive(){
        return $this->belongsTo(archive::class);
    }
    
}
