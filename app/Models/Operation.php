<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operation
 * @package App\Models
 * @version September 28, 2020, 5:00 pm UTC
 *
 * @property \App\Models\Compte $compte
 * @property integer $compte_id
 * @property number $montant
 * @property string $date_operation
 * @property string $type_operation
 */
class Operation extends Model
{
    use SoftDeletes;

    public $table = 'operation';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'compte_id',
        'montant',
        'date_operation',
        'type_operation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'compte_id' => 'integer',
        'montant' => 'decimal:0',
        'date_operation' => 'string',
        'type_operation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'compte_id' => 'required',
        'montant' => 'required',
        'date_operation' => 'required',
        'type_operation' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function compte()
    {
        return $this->belongsTo(\App\Models\Compte::class, 'compte_id');
    }
}
