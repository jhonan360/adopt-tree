<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idclimas
 * @property string $nombre
 * @property string $detalle
 * @property NombrePlanta[] $nombrePlantas
 */
class Clima extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idclimas';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'detalle', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nombrePlantas()
    {
        return $this->hasMany('App\Models\NombrePlanta', 'idclimas', 'idclimas');
    }
}
