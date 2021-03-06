<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class essai
 * @package App\Models
 * @version September 28, 2020, 4:30 pm UTC
 *
 * @property string $nom
 */
class essai extends Model
{
    use SoftDeletes;

    public $table = 'essais';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required'
    ];

    
}
