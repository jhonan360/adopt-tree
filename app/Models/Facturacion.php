<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idfacturacion
 * @property integer $idusuario
 * @property float $precio_total
 * @property boolean $pagado
 * @property string $created_at
 * @property string $updated_at
 * @property DetalleFacturacion[] $detalleFacturacions
 * @property User $user
 */
class Facturacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'facturacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idfacturacion';

    /**
     * @var array
     */
    protected $fillable = ['idusuario', 'precio_total', 'pagado', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleFacturacions()
    {
        return $this->hasMany('App\Models\DetalleFacturacion', 'idfacturacion', 'idfacturacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'idusuario', 'idusuario');
    }
}
