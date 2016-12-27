<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Http\Requests\CupomRequest;

class CuponsController extends Controller
{
    private $cupomRepository;

    public function __construct(CupomRepository $repository)
    {
        $this->cupomRepository = $repository;
    }

    public function index()
    {
        $cupons = $this->cupomRepository->paginate(10);

        return view('admin.cupons.index', compact('cupons'));
    }

    public function create()
    {
        return view('admin.cupons.create');
    }

    public function store(CupomRequest $request)
    {
        $cupom = $request->all();
        $this->cupomRepository->create($cupom);

        return redirect()->route('admin.cupons.index');
    }
}
