<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\ClientRequest;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller
{
    private $clientRepository;
    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService)
    {
        $this->clientRepository = $repository;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->clientRepository->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(ClientRequest $request)
    {
        $client = $request->all();
        
        $this->clientService->create($client);
        return redirect()->route('admin.clients.index');
    }

    public function edit($id)
    {
        $client = $this->clientRepository->find($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id)
    {
        $client = $request->all();
        
        $this->clientService->update($client, $id);

        return redirect()->route('admin.clients.index');
    }
    
    public function destroy($id)
    {
        $client = $this->clientRepository->find($id);
        $client->user()->delete();
        $client->delete();
        return redirect()->route('admin.clients.index');
    }
}
