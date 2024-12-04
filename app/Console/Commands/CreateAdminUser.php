<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Usuario; // Certifique-se de que o nome do modelo está correto
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'create:admin {nome} {email} {password}';
    protected $description = 'Cria um usuário administrador no sistema';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $nome = $this->argument('nome');
        $email = $this->argument('email');
        $password = $this->argument('password');

        // Criação do administrador
        $admin = Usuario::create([
            'nome' => $nome,
            'email' => $email,
            'senha' => Hash::make($password),
            'role' => 'Administrador', // Define como administrador
        ]);

        $this->info("Usuário administrador {$admin->nome} criado com sucesso!");
    }
}
