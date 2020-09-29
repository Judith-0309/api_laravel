<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClientParticulier
 * @package App\Models
 * @version September 28, 2020, 4:56 pm UTC
 *
 * @property \App\Models\Compte $compte
 * @property integer $compte_id
 * @property string $nom
 * @property string $prenom
 * @property string $telephone
 * @property string $genre
 * @property string $email
 * @property string $adresse
 * @property string $profession
 * @property string $salarie
 * @property number $salaire_actuel
 * @property string $nom_employeur
 * @property string $cni
 */
class ClientParticulier extends Model
{
    use SoftDeletes;

    public $table = 'clientparticulier';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'compte_id',
        'nom',
        'prenom',
        'telephone',
        'genre',
        'email',
        'adresse',
        'profession',
        'salarie',
        'salaire_actuel',
        'nom_employeur',
        'cni'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'compte_id' => 'integer',
        'nom' => 'string',
        'prenom' => 'string',
        'telephone' => 'string',
        'genre' => 'string',
        'email' => 'string',
        'adresse' => 'string',
        'profession' => 'string',
        'salarie' => 'string',
        'salaire_actuel' => 'decimal:3',
        'nom_employeur' => 'string',
        'cni' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'compte_id' => 'required',
        'nom' => 'required',
        'prenom' => 'required',
        'telephone' => 'required',
        'genre' => 'required',
        'email' => 'required',
        'adresse' => 'required',
        'profession' => 'required',
        'salarie' => 'required',
        'salaire_actuel' => 'required',
        'nom_employeur' => 'required',
        'cni' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function compte()
    {
        return $this->belongsTo(\App\Models\Compte::class, 'compte_id');
    }
}
