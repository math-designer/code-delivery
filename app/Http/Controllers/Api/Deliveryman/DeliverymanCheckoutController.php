<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $orderService;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, OrderService $orderService)
    {

        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderRepository->with('items')->scopeQuery(function ($query) {
            return $query->where('user_deliveryman_id', '=', Authorizer::getResourceOwnerId());
        })->paginate();

        return $orders;
    }

    public function create()
    {
        $products = $this->productRepository->all(['id', 'name', 'price']);

        return view('costumer.order.create', compact('products'));
    }


    public function show($id)
    {
        $order = $this->orderRepository->with(['items', 'client', 'cupom'])->find($id);
        $order->items->each(function ($item) {
            $item->product;
        });
        return $order;
    }
}
