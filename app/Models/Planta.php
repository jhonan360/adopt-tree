<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idplantas
 * @property integer $idusuario
 * @property integer $idnombre
 * @property string $nombre
 * @property string $mensaje
 * @property string $fecha_ingreso
 * @property string $fecha_adopcion
 * @property string $latitud
 * @property string $longitud
 * @property float $precio_mensualidad
 * @property string $created_at
 * @property string $updated_at
 * @property Bitacora[] $bitacoras
 * @property DetalleFacturacion[] $detalleFacturacions
 * @property Multimedia[] $multimedia
 * @property NombresPlanta $nombresPlanta
 * @property User $user
 */
class Planta extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idplantas';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['idusuario', 'idnombre', 'nombre', 'mensaje', 'fecha_ingreso', 'fecha_adopcion', 'latitud', 'longitud', 'precio_mensualidad', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bitacoras()
    {
        return $this->hasMany('App\Models\Bitacora', 'idplantas', 'idplantas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleFacturacions()
    {
        return $this->hasMany('App\Models\DetalleFacturacion', 'idplantas', 'idplantas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function multimedia()
    {
        return $this->hasMany('App\Models\Multimedia', 'idplantas', 'idplantas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nombresPlanta()
    {
        return $this->belongsTo('App\Models\NombresPlanta', 'idnombre', 'idnombre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'idusuario', 'idusuario');
    }
}
