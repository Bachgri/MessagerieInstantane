<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messagesdegroupes extends Model{
    use HasFactory;
    protected $fillable = ['content', 'userId', "groupId", 'type'];
    public function user(){
        return $this->belongsTo(User::class, 'id', 'userId');
    } 
}
