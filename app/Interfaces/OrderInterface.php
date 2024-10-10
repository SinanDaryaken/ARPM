<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

interface OrderInterface
{
    /**
     * @param int $perPage
     * @param int $page
     * @return Paginator
     */
    public function paginate(int $perPage, int $page): Paginator;
}
