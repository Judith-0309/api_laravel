<?php

namespace App\Repositories;

use App\Models\essai;
use App\Repositories\BaseRepository;

/**
 * Class essaiRepository
 * @package App\Repositories
 * @version September 28, 2020, 4:30 pm UTC
*/

class essaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom'
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
        return essai::class;
    }
}
