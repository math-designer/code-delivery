<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Client;

/**
 * Class ClientTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{

    /**
     * Transform the \Client entity
     * @param Client $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'name' => $model->name,
            'email' => $model->email,
            'phone' => $model->phone,
            'adress' => $model->adress,
            'zipcode' => $model->zipcode,
            'city' => $model->city,
            'state' => $model->state
        ];
    }
}
