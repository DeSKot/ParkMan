<?php

namespace App\DTO;

class Paginate
{
    const DEFAULT_ORDER_BY_ROW = 'id';
    const DEFAULT_DIRECTION = 'asc';
    const DEFAULT_PER_PAGE = 15;
    const DEFAULT_PAGE = 1;

    private string $orderByRow = self::DEFAULT_ORDER_BY_ROW;
    private string $direction = self::DEFAULT_DIRECTION;
    private int $perPage = self::DEFAULT_PER_PAGE;
    private int $page = self::DEFAULT_PAGE;

    public function setOrderByRow(string $orderByRow): void
    {
        $this->orderByRow = $orderByRow;
    }

    public function getOrderByRow(): string
    {
        return $this->orderByRow;
    }

    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setPerPage(int $perPage): void
    {
        $this->perPage = $perPage;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    public function getPage(): int
    {
        return $this->page;
    }
}
