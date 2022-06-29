<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idtipo_usuario
 * @property string $nombre
 * @property string $detalle
 * @property User[] $users
 */
class TipoUsuario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipo_usuario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtipo_usuario';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'detalle'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'idtipo_usuario', 'idtipo_usuario');
    }
}
