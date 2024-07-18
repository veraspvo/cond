<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizacaoMilitar extends Model
{
    use HasFactory;

    // Indicar qual conexão com o banco de dados usar
    protected $connection = 'mysql_2';

    // Indicar qual tabela usar
    protected $table = 'organizacao_militar';

    // Indicar qual chave primária usar
    //protected $primaryKey = 'omi_codigo';

    public $timestamps = false;

    protected $fillable = [
        'omi_codigo',
    ];


}
