<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
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
        return $this->orderRepository->getByDeliveryman($id, Authorizer::getResourceOwnerId());
    }

    public function updateStatus(Request $request, $id)
    {
        $order = $this->orderService->updateStatus($id, Authorizer::getResourceOwnerId(), $request->status);
        if ($order) {
            return $order;
        }

        abort(400, 'Order not found');

    }
}
