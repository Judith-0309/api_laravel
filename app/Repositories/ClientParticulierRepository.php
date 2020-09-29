<?php

namespace App\Repositories;

use App\Models\ClientParticulier;
use App\Repositories\BaseRepository;

/**
 * Class ClientParticulierRepository
 * @package App\Repositories
 * @version September 28, 2020, 4:56 pm UTC
*/

class ClientParticulierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClientParticulier::class;
    }
}
