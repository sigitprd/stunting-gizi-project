<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kms extends Model
{
    protected $fillable = ['id_balita', 'umur', 'berat_badan', 'id_antopometri', 'z_score', 'status_gizi'];
}
