<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class societe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'formeJuri',
        'siegeSocial',
        'capital',
        'activiteprincipal',
        'RC',
        'patente',
        'IF',
        'CNSS',
        'ICE',
        'RIB',
        'dateexploitation',
        'dateDbDexploitatiion'
    ];
}
