<?php

namespace App\Http\Requests\Garage;

use App\DTO\Garage\Filter;
use App\Http\Requests\PaginationRequest;
use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends PaginationRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'longitude' => 'required_with:latitude|string',
            'latitude'  => 'required_with:longitude|string'
        ];
    }

    public function getDto(): Filter
    {
        $dto = new Filter();
        $dto->setLatitude($this->input('latitude'));
        $dto->setLongitude($this->input('longitude'));
        $dto->setCountry($this->input('country'));
        $dto->setOwnerName($this->input('ownerName'));

        return $dto;
    }
}
