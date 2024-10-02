<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
class Companies extends Model{
    use HasFactory, Notifiable;
    protected $table="companies";
    
    // public static function find(int $id): array{
    //     $company = Arr::first(static::all(), fn($company) => $company['id'] == $id);
    //     if(! $company){
    //         dd($company);
    //         //$company is null?
    //         abort(404);
    //     }
    //     else{
    //         return $company;
    //     }

    // }
    //protected $guarded = [];
    protected $fillable = [
        'Name',
        'email',
        'logo',
        'website'
    ];
    public function employees(){
        return $this->hasMany(Employees::class); //Works perfectly (companies_id needs to match with id from Companies.php)
    }
    
}