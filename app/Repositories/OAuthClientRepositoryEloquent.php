<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\OAuthClientRepository;
use CodeDelivery\Models\OauthClient;
use CodeDelivery\Validators\OAuthClientValidator;

/**
 * Class OAuthClientRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OAuthClientRepositoryEloquent extends BaseRepository implements OAuthClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OauthClient::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
