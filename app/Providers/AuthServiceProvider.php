<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // //Modificar el Mensaje del Email
        // VerifyEmail::toMailUsing(function($notifiable, $url){
        //     return (new MailMessage)
        //     //Agregar un Tema
        //     ->subject('Verificar Cuenta')
        //     //Agregar una linea de texto
        //     ->line('Tu Cuenta esta casi lista, solo presiona el mensaje a confirmacion')
        //     //Agregar un boton ('texto en en el boton',$url)
        //     ->action('Confirmar Cuenta',$url)
        //     ->line('Si no creaste esta cuenta, puedes ignorar este mensaje')
        //     ->salutation(" ");
        // });

        //Otra Manera de hacerlo
        VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl) {
            return (new MailMessage)
            ->subject(Lang::get('Verificar Cuenta'))
            ->greeting(Lang::get("Hola ") . $notifiable->name)
            ->line(Lang::get('Por favor haz click  en el siguiente boton para confirmar tu cuenta'))
            ->action(Lang::get('Verificar Ahora'), $verificationUrl)
            // ->line(Lang::get('O sino haz click en el siguiente enlace')) 
            // ->action(Lang::get(''),$verificationUrl)
            ->line(Lang::get('Si no creaste esta cuenta puedes ignorar este mensaje.'))
            ->salutation(new HtmlString(
            Lang::get("DevJojs").'<br>' .'<strong>'. Lang::get("2023") . '</strong>'
            ));
        };

        ResetPassword::$toMailCallback = function($notifiable, $verificationUrl){
            return (new MailMessage)
            ->subject(Lang::get('Cambiar Contraseña'))
            ->greeting(Lang::get("Hola ") . $notifiable->name)
            ->line(Lang::get('Recibiste este correo ya que deseas modificar tu contraseña'))
            ->action(Lang::get('Modificar Contraseña'), $verificationUrl)
            ->line(Lang::get('Si no deseas modificar tu contraseña puedes ignorar este mensaje.'))
            ->salutation(new HtmlString(
            Lang::get("DevJojs").'<br>' .'<strong>'. Lang::get("2023") . '</strong>'
            ));
        };
    }
}
