<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderPaginateRequest;
use App\Services\OrderService;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @param OrderService $orderService
     */
    public function __construct(protected OrderService $orderService)
    {
    }

    /**
     * @param OrderPaginateRequest $request
     * @return View
     */
    public function index(OrderPaginateRequest $request): View
    {
        $data = $this->orderService->paginate(
            $request->validated('per_page', 15),
            $request->validated('page', 1),
        );

        return view('orders.index', ['orders' => $data]);
    }
}
