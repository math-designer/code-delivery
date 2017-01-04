<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Models\User;
use CodeDelivery\Presenters\UserPresenter;
use CodeDelivery\Validators\UserValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function getDeliverymen()
    {
        return $this->model->where('role', '=', 'deliveryman')->lists('name', 'id');
    }

    public function presenter()
    {
        return UserPresenter::class;
    }
}
