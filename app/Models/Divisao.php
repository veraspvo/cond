<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisao extends Model
{
    use HasFactory;

    // Indicar qual conexão com o banco de dados usar
    protected $connection = 'mysql';

    // Indicar qual tabela usar
    protected $table = 'divisoes';

    // Indicar qual chave primária usar
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'om',
        'divisao',
    ];

}
