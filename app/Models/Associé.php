<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Associé;

class Associé extends Model
{
    use HasFactory;
    protected $table = 'associés';

    protected $fillable = [
        'fullName',
        'email',
        'cin',
        'role',
        'societe_id'
    ];

public function societe()
{
    return $this->belongsTo(societe::class, 'societe_id');
}



}
