<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idtipo_planta
 * @property string $nombre
 * @property string $detalle
 * @property NombrePlanta[] $nombrePlantas
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
    public function nombrePlantas()
    {
        return $this->hasMany('App\Models\NombrePlanta', 'idtipo_planta', 'idtipo_planta');
    }
}
