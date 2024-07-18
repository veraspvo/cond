<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoDivisao extends Model
{
    use HasFactory;

    // Indicar qual conexão com o banco de dados usar
    protected $connection = 'mysql';

    // Indicar qual tabela usar
    protected $table = 'documentos_divisoes';

    // Indicar qual chave primária usar
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'documento_id',
        'divisao_id',
        'abrangencia',
        'ativo', 
    ];


}
