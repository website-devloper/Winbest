<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gerant;
use App\Models\Associé;
use App\Models\Damancom;
use App\Models\Impot;
use App\Models\Regus;
use App\Models\Cimr;

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
    
    public function associés()
    {
        return $this->hasMany(Associé::class, 'societe_id');
    }

    public function gerant()
    {
        return $this->hasMany(Gerant::class, 'societe_id');
    }

    public function damancom()
    {
        return $this->hasMany(Damancom::class, 'societe_id');
    }

    public function impot()
    {
        return $this->hasMany(Impot::class, 'societe_id');
    }
    
    public function regus()
    {
        return $this->hasMany(Regus::class, 'societe_id');
    }

    public function cimr()
    {
        return $this->hasMany(Cimr::class, 'societe_id');
    }
}
