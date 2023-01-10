<?php

namespace Module\StaticBlock\Repositories\Eloquents;

use Module\StaticBlock\Repositories\StaticBlockRepositoryInterface;
use Dnsoft\Core\Repositories\BaseRepository;

class StaticBlockRepository extends BaseRepository implements StaticBlockRepositoryInterface
{
    public function findBySlug($slug)
    {
       return $this->model->where('is_active', true)->where('slug', $slug)->first();
    }
}
