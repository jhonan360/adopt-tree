<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idnombre
 * @property integer $idtipo_planta
 * @property integer $idclimas
 * @property string $nombre_cientifico
 * @property string $nombre_comun
 * @property string $detalle
 * @property Clima $clima
 * @property TipoPlantum $tipoPlantum
 * @property Planta[] $plantas
 */
class NombrePlanta extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'nombres_plantas';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idnombre';

    /**
     * @var array
     */
    protected $fillable = ['idtipo_planta', 'idclimas', 'nombre_cientifico', 'nombre_comun', 'detalle'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clima()
    {
        return $this->belongsTo('App\Models\Clima', 'idclimas', 'idclimas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoPlanta()
    {
        return $this->belongsTo('App\Models\TipoPlanta', 'idtipo_planta', 'idtipo_planta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plantas()
    {
        return $this->hasMany('App\Models\Planta', 'idnombre', 'idnombre');
    }
}
