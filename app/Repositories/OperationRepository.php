<?php

namespace App\Repositories;

use App\Models\Operation;
use App\Repositories\BaseRepository;

/**
 * Class OperationRepository
 * @package App\Repositories
 * @version September 28, 2020, 5:00 pm UTC
*/

class OperationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'compte_id',
        'montant',
        'date_operation',
        'type_operation'
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
        return Operation::class;
    }
}
