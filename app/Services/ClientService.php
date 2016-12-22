<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\ClientRepository;

class ClientService
{
    
    private $clientRepository;
    private $userRepository;
    
    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }
    
    public function update(array $data, $id)
    {
        $client = $this->clientRepository->find($id);
        
        $client->update($data);
        $client->user->update($data['user']);
    }
    
    public function create(array $data)
    {
        $user = $this->userRepository->create($data['user']);
        $user->client()->create($data);
    }
}