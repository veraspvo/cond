<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{
    use HasFactory;
     // Indicar qual conexão com o banco de dados usar
     protected $connection = 'mysql';

     // Indicar qual tabela usar
     protected $table = 'controles';
 
     // Indicar qual chave primária usar
     protected $primaryKey = 'id';
 
     public $timestamps = true;
 
     protected $fillable = [
         'id',
         'documentos_divisoes_id',
         'con_numero_documento',
         'con_data',
         'con_observacao',
         'con_login',
         'con_setor',
     ];
     
}
