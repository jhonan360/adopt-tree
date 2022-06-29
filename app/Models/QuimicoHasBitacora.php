<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_quimico_bitacora
 * @property integer $idquimico
 * @property integer $idbitacora
 * @property integer $idmedidas
 * @property float $cantidad
 * @property string $created_at
 * @property string $updated_at
 * @property Bitacora $bitacora
 * @property Quimico $quimico
 * @property Medida $medida
 */
class QuimicoHasBitacora extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'quimicos_has_bitacora';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_quimico_bitacora';

    /**
     * @var array
     */
    protected $fillable = ['idquimico', 'idbitacora', 'idmedidas', 'cantidad', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bitacora()
    {
        return $this->belongsTo('App\Models\Bitacora', 'idbitacora', 'idbitacora');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quimico()
    {
        return $this->belongsTo('App\Models\Quimico', 'idquimico', 'idquimico');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medida()
    {
        return $this->belongsTo('App\Models\Medida', 'idmedidas', 'idmedidas');
    }
}
