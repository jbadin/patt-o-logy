<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Pets extends Model
{
    use Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference', 'fullName', 'nickname', 'birthdate', 'deceaseDate', 'identificationNumber', 'picture', 'id_users', 'id_bloodTypes', 'id_petsCategories', 'id_countries', 'id_sexes', 'id_breeds'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
