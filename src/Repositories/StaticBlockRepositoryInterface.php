<?php

namespace Module\StaticBlock\Repositories;

use DnSoft\Core\Repositories\BaseRepositoryInterface;

interface StaticBlockRepositoryInterface extends BaseRepositoryInterface
{
    public function findBySlug($slug);
}
