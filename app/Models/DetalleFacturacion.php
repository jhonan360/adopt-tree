<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $iddetalle_facturacion
 * @property integer $idplantas
 * @property integer $idfacturacion
 * @property float $precio
 * @property string $created_at
 * @property string $updated_at
 * @property Facturacion $facturacion
 * @property Planta $planta
 */
class DetalleFacturacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detalle_facturacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddetalle_facturacion';

    /**
     * @var array
     */
    protected $fillable = ['idplantas', 'idfacturacion', 'precio', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facturacion()
    {
        return $this->belongsTo('App\Models\Facturacion', 'idfacturacion', 'idfacturacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function planta()
    {
        return $this->belongsTo('App\Models\Planta', 'idplantas', 'idplantas');
    }
}
