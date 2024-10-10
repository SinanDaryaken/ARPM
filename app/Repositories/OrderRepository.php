<?php

namespace App\Repositories;

use App\Interfaces\OrderInterface;
use App\Models\Order;
use Illuminate\Contracts\Pagination\Paginator;

class OrderRepository implements OrderInterface
{
    /**
     * @param Order $order
     */
    public function __construct(protected Order $order)
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
        return $this->order->query()
            ->with(['customer', 'items'])
            ->orderByDesc('completed_at')
            ->orderByDesc('created_at')
            ->paginate($perPage, ['*'], 'page', $page);
    }
}
