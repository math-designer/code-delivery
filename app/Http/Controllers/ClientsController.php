<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\ClientRequest;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ClientRepository;

class ClientsController extends Controller
{
    private $clientRepository;

    public function __construct(ClientRepository $repository)
    {
        $this->clientRepository = $repository;
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

    public function store(ClientRequest $request, UserRepository $userRepository)
    {
        $clientForm = $request->all();
        
        $user = $userRepository->create($clientForm['user']);
        $user->client()->create($clientForm);

        return redirect()->route('admin.clients.index');
    }

    public function edit($id)
    {
        $client = $this->clientRepository->find($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id)
    {
        $clientForm = $request->all();
        
        $client = $this->clientRepository->find($id);
        $client->update($clientForm);
        $client->user->update($clientForm['user']);

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
