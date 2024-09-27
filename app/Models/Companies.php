<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Companies extends Model{
    use HasFactory, Notifiable;
    // public static function all(): array{
    //     return[
    //         [
    //             'id' => 1,
    //             'Name' => 'Johnathan',
    //         ]

    //     ];
    // }
    protected $fillable = [
        'id',
        'Name'
    ];

    protected $table="companies";
}