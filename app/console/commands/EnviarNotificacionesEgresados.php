<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Egresado;
use App\Notifications\EgresadoAniversarioNotification;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertaEmail;

class EnviarNotificacionesEgresados extends Command
{
    protected $signature = 'egresados:enviar-notificaciones';
    protected $description = 'Enviar notificaciones a egresados que no han actualizado su información en un año';

    public function handle()
    {
        $egresados = Egresado::where('updated_at', '<=', now()->subYear())
                            ->orWhere('updated_at', null)
                            ->get();

        foreach ($egresados as $egresado) {
            // aqui se crea la notiificacion para que actualice la info
            $notification = Notification::create([
                'egresado_id' => $egresado->id,
                'title' => 'Actualización de Información Requerida',
                'message' => 'Ha pasado un año desde tu última actualización de información. Por favor, accede a tu perfil y verifica que tus datos estén al día.',
            ]);

            // se envia al correo electronico
            $messageContent = [
                'title' => 'Actualización de Información Requerida',
                'message' => 'Ha pasado un año desde tu última actualización de información. Por favor, accede a tu perfil y verifica que tus datos estén al día.',
                'egresado' => $egresado
            ];

            Mail::to($egresado->email)->send(new AlertaEmail($messageContent));
        }

        $this->info('Se han enviado ' . $egresados->count() . ' notificaciones a egresados.');
    }
}