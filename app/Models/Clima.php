<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idclimas
 * @property string $nombre
 * @property string $detalle
 * @property NombresPlanta[] $nombresPlantas
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
    protected $fillable = ['nombre', 'detalle'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nombresPlantas()
    {
        return $this->hasMany('App\Models\NombresPlanta', 'idclimas', 'idclimas');
    }
}
