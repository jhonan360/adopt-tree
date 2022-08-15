<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idmedidas
 * @property string $nombre
 * @property string $created_at
 * @property string $updated_at
 * @property QuimicoHasBitacora[] $quimicosHasBitacoras
 */
class Medida extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idmedidas';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quimicosHasBitacoras()
    {
        return $this->hasMany('App\Models\QuimicoHasBitacora', 'idmedidas', 'idmedidas');
    }
}
