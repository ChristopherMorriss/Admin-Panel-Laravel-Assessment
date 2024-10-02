<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employees extends Model{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'id',
        'first_name',
        'last_name'
    ];

    public function companies(){
        return $this->belongsTo(Companies::class); //Find with id not company_id
       
    }
}