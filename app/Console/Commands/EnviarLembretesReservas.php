<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reserva;
use App\Models\Notificacao;

class EnviarLembretesReservas extends Command
{
    protected $signature = 'reservas:enviar-lembretes';
    protected $description = 'Enviar lembretes de reservas próximas';

    public function handle()
    {
        $reservasProximas = Reserva::where('horario_inicio', '>=', now())
            ->where('horario_inicio', '<=', now()->addHour())
            ->get();

        foreach ($reservasProximas as $reserva) {
            Notificacao::create([
                'usuario_id' => $reserva->usuario_id,
                'mensagem' => 'Lembrete: sua reserva começará em menos de 1 hora.',
                'tipo' => 'lembrete',
                'criado_em' => now(),
            ]);
        }

        $this->info('Lembretes enviados com sucesso.');
    }
}
