<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consegna extends Model
{
    use HasFactory;
    protected $table = 'luoghi_consegna';
    protected $fillable = [
        'soprannome',
        'nome',
        'indirizzo',
        'cap',
        'luogo',
        'provincia',
        'numero',
        'stato',
        'telefono1',
        'telefono2',
        'mobile',
        'fax',
        'mail',
        'piva'
    ];
}
