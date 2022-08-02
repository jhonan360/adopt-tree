<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property integer $idusuario
 * @property integer $idtipo_usuario
 * @property string $tipo_documento
 * @property string $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $password
 * @property string $telefono
 * @property string $email_verified_at
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Bitacora[] $bitacoras
 * @property Facturacion[] $facturacions
 * @property Planta[] $plantas
 * @property TipoUsuario $tipoUsuario
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idusuario';
    

    /**
     * @var array
     */
    protected $fillable = ['tipo_documento', 'cedula', 'nombre', 'apellido', 'email', 'password', 'telefono', 'email_verified_at', 'remember_token', 'created_at', 'updated_at'];

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bitacoras()
    {
        return $this->hasMany('App\Models\Bitacora', 'idusuario', 'idusuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturacions()
    {
        return $this->hasMany('App\Models\Facturacion', 'idusuario', 'idusuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plantas()
    {
        return $this->hasMany('App\Models\Planta', 'idusuario', 'idusuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoUsuario()
    {
        return $this->belongsTo('App\Models\TipoUsuario', 'idtipo_usuario', 'idtipo_usuario');
    }
}
