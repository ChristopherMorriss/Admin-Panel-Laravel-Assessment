<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employees extends Model{
    use HasFactory, Notifiable;
    // public static function all(): array{
    //     return[
    //         [
    //             'id' => 1,
    //             'first_name' => 'Johnathan',
    //             'last_name' => 'Monathan',
    //         ]

    //     ];
    // }
    protected $fillable = [
        'id',
        'first_name',
        'last_name'
    ];
    public function company(){
        return $this->belongsTo(Companies::class);
    }
}