<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
//extends Model
class Companies{
    use HasFactory, Notifiable;
    public static function all(): array{
        return[
            [
                'id' => 1,
                'Name' => 'Johnathan',
            ]

        ];
    }
    // protected $fillable = [
    //     'Name'
    // ];

    protected $table="companies";

    // public static function find(int $id): array{
    //     $company = Arr::first(static::all(), fn($company) => $company['id'] == $id);
    //     if(! $company){
    //         abort(404);
    //     }
    //     else{
    //         return $company;
    //     }

    // }
    
}