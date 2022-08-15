<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idquimico
 * @property string $nombre
 * @property string $detalle
 * @property string $created_at
 * @property string $updated_at
 * @property QuimicoHasBitacora[] $quimicosHasBitacoras
 */
class Quimico extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idquimico';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'detalle', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quimicosHasBitacoras()
    {
        return $this->hasMany('App\Models\QuimicoHasBitacora', 'idquimico', 'idquimico');
    }
}
