<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idtipo_planta
 * @property string $nombre
 * @property string $detalle
 * @property NombresPlanta[] $nombresPlantas
 */
class TipoPlanta extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipo_planta';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtipo_planta';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'detalle', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nombresPlantas()
    {
        return $this->hasMany('App\Models\NombresPlanta', 'idtipo_planta', 'idtipo_planta');
    }
}
