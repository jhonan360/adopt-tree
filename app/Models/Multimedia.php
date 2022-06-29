<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idmultimedia
 * @property integer $idplantas
 * @property string $nombre
 * @property string $tipo
 * @property string $enlace
 * @property string $created_at
 * @property string $updated_at
 * @property Planta $planta
 */
class Multimedia extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idmultimedia';

    /**
     * @var array
     */
    protected $fillable = ['idplantas', 'nombre', 'tipo', 'enlace', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function planta()
    {
        return $this->belongsTo('App\Models\Planta', 'idplantas', 'idplantas');
    }
}
