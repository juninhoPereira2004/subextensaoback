<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissao extends Model
{
    use HasFactory;

    // Definir o nome da tabela (caso seja diferente do padrão)
    protected $table = 'profissoes';

    // Definir os campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = ['nome', 'descricao', 'salario', 'empresa'];

    // Definir os campos de data (caso haja datas na tabela)
    protected $dates = ['created_at', 'updated_at'];

    // Se necessário, pode definir relacionamentos com outras tabelas
    // Exemplo de um relacionamento com um usuário (caso exista)
    // public function usuario()
    // {
    //     return $this->belongsTo(Usuario::class);
    // }
}
