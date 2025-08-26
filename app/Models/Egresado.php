<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Egresado extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'documento',
        'email',
        'password',
        'sexo',
        'fecha_nacimiento',
        'nivel_educacion',
        'direccion_postal',
        'telefono',
        'fax_laboral',
        'empresa',
        'cargo',
        'programa',
        'ano_graduacion',
        'foto_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guard = 'web';

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the login identifier for the egresado.
     */
    public function getAuthIdentifier()
    {
        return $this->getAttribute('id');
    }

    /**
     * Get the login credentials for authentication.
     */
    public function getAuthCredentials()
    {
        return [
            'email' => $this->email,
            'documento' => $this->documento,
        ];
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        // No se usa remember_token
    }

    public function getRememberTokenName()
    {
        return null;
    }

    // Ejemplo de relación (si usas notificaciones personalizadas)
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function unreadNotifications()
    {
        return $this->notifications()->where('read', false);
    }

    public function isJefeEgresados()
    {
        return $this->role === 'jefe_egresados';
    }

    public function isEgresado()
    {
        return $this->role === 'egresado';
    }
}
