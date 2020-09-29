<?php

namespace App\Http\Requests\API;

use App\Models\ClientParticulier;
use InfyOm\Generator\Request\APIRequest;

class UpdateClientParticulierAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = ClientParticulier::$rules;
        
        return $rules;
    }
}
