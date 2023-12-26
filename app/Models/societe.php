<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gerant;
use App\Models\Associé;

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
}
