<?php

namespace App\Http\Requests;

use App\DTO\Paginate;
use Illuminate\Foundation\Http\FormRequest;

class PaginationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'orderBy'   => 'string',
            'direction' => 'string',
            'page'      => 'integer',
            'perPage'   => 'integer',
        ];
    }

    public function getPaginationDto(): Paginate
    {
        $dto = new Paginate();
        $dto->setOrderByRow($this->input('orderBy', Paginate::DEFAULT_ORDER_BY_ROW));
        $dto->setDirection($this->input('direction', Paginate::DEFAULT_DIRECTION));
        $dto->setPage($this->input('page', Paginate::DEFAULT_PAGE));
        $dto->setPerPage($this->input('perPage', Paginate::DEFAULT_PER_PAGE));

        return $dto;
    }
}
