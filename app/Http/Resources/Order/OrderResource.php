<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\CartItem\CartItemResource;
use App\Http\Resources\Customer\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer' => CustomerResource::make($this->customer),
            'items' => CartItemResource::collection($this->items),
            'items_count' => $this->items->count(),
            'completed_order_exists' => $this->status == 'completed',
            'total_amount' => $this->items->sum(function ($item) {
                return $item->price * $item->quantity;
            }),
            'created_at' => $this->created_at
        ];
    }
}
