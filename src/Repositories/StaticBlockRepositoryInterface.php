<?php

namespace Module\StaticBlock\Repositories;

use Dnsoft\Core\Repositories\BaseRepositoryInterface;

interface StaticBlockRepositoryInterface extends BaseRepositoryInterface
{
    public function findBySlug($slug);
}
