<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idbitacora
 * @property integer $idusuario
 * @property integer $idplantas
 * @property string $hora_riego
 * @property boolean $poda
 * @property string $created_at
 * @property string $updated_at
 * @property Planta $planta
 * @property User $user
 * @property QuimicosHasBitacora[] $quimicosHasBitacoras
 */
class Bitacora extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bitacora';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idbitacora';

    /**
     * @var array
     */
    protected $fillable = ['idusuario', 'idplantas', 'hora_riego', 'poda', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function planta()
    {
        return $this->belongsTo('App\Models\Planta', 'idplantas', 'idplantas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'idusuario', 'idusuario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quimicosHasBitacoras()
    {
        return $this->hasMany('App\Models\QuimicosHasBitacora', 'idbitacora', 'idbitacora');
    }
}
