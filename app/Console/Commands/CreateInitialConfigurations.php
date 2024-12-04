<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateInitialConfigurations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'configurations:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserir as configurações iniciais no sistema';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $configurations = [
            [
                'nome_configuracao' => 'limite_reservas_usuario',
                'valor_configuracao' => '5', // Valor padrão
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_configuracao' => 'horario_funcionamento',
                'valor_configuracao' => '08:00 - 18:00', // Valor padrão
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($configurations as $config) {
            $exists = DB::table('configuracoes_sistema')
                ->where('nome_configuracao', $config['nome_configuracao'])
                ->exists();

            if (!$exists) {
                DB::table('configuracoes_sistema')->insert($config);
                $this->info("Configuração '{$config['nome_configuracao']}' inserida com sucesso.");
            } else {
                $this->warn("Configuração '{$config['nome_configuracao']}' já existe e foi ignorada.");
            }
        }

        $this->info('Configurações iniciais processadas com sucesso.');
    }
}
