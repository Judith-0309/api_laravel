<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compte
 * @package App\Models
 * @version September 28, 2020, 4:54 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $clientparticuliers
 * @property \Illuminate\Database\Eloquent\Collection $operations
 * @property string $type_compte
 * @property string $numero_compte
 * @property string $cle_rib
 * @property string $etat_compte
 * @property number $depot_initial
 * @property string $date_ouverture
 */
class Compte extends Model
{
    use SoftDeletes;

    public $table = 'compte';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'type_compte',
        'numero_compte',
        'cle_rib',
        'etat_compte',
        'depot_initial',
        'date_ouverture'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type_compte' => 'string',
        'numero_compte' => 'string',
        'cle_rib' => 'string',
        'etat_compte' => 'string',
        'depot_initial' => 'decimal:0',
        'date_ouverture' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_compte' => 'required',
        'numero_compte' => 'required',
        'cle_rib' => 'required',
        'etat_compte' => 'required',
        'depot_initial' => 'required',
        'date_ouverture' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clientparticuliers()
    {
        return $this->hasMany(\App\Models\Clientparticulier::class, 'compte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function operations()
    {
        return $this->hasMany(\App\Models\Operation::class, 'compte_id');
    }
}
