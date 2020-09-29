<?php

namespace App\Repositories;

use App\Models\Compte;
use App\Repositories\BaseRepository;

/**
 * Class CompteRepository
 * @package App\Repositories
 * @version September 28, 2020, 4:54 pm UTC
*/

class CompteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_compte',
        'numero_compte',
        'cle_rib',
        'etat_compte',
        'depot_initial',
        'date_ouverture'
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
        return Compte::class;
    }
}
