<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;

class OrdersController extends Controller
{
    private $orderRepository;
    private $userRepository;
    
    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
    }
    
    public function index()
    {
        $orders = $this->orderRepository->paginate(10);
        
        return view('admin.orders.index', compact('orders'));
    }
    
    public function create()
    {
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $this->orderRepository->update($data, $id);
        
        return redirect()->route('admin.orders.index');
    }
    
    public function edit($id)
    {
        $order = $this->orderRepository->find($id);
        $statusDropdown = [0 => 'Pendente', 1 => 'Despachado', 2 => 'Entregue'];
        $deliverymanDropdown = $this->userRepository->getDeliverymen();
        
        return view('admin.orders.edit', compact('order', 'statusDropdown', 'deliverymanDropdown'));
    }
}
