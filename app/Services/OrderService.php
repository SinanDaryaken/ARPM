<?php

namespace App\Services;

use App\Interfaces\OrderInterface;
use Illuminate\Contracts\Pagination\Paginator;

class OrderService
{
    /**
     * @param OrderInterface $orderInterface
     */
    public function __construct(protected OrderInterface $orderInterface)
    {
        //
    }

    /**
     * @param int $perPage
     * @param int $page
     * @return Paginator
     */
    public function paginate(int $perPage, int $page): Paginator
    {
        return $this->orderInterface->paginate($perPage, $page);
    }
}
