<?php

namespace App\Models;
use App\Models\societe;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerant extends Model
{
    protected $table = 'gerants';

    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'cin',
        'role',
    ];
    
    public function societe()
    {
        return $this->belongsTo(societe::class);
    }
}
