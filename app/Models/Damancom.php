<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Damancom extends Model
{
    use HasFactory;
    protected $fillable = [
        'login',
        'password',
        'societe_Id',
    ];
}
