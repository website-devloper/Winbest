<?php


namespace App\Models;
use App\Models\societe;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CIMR extends Model
{
    use HasFactory;

    protected $fillable = [
        'login',
        'password',
        'N_Adherant',
        'societe_id',
    ];

    public function societe()
{
    return $this->belongsTo(societe::class);
}

}
