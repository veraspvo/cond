<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetorOrganizacaoMilitar extends Model
{
    use HasFactory;

    // Indicar qual conexão com o banco de dados usar
    protected $connection = 'mysql_2';

    // Indicar qual tabela usar
    protected $table = 'setor_organizacao_militar';

    public $timestamps = false;

    protected $fillable = [
        'set_codigo',
        'omi_codigo',
        'som_eh_divisao',
    ];
}
