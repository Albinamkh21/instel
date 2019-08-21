<?php
namespace Corp\Repositories;
use Corp\AdminMenu;
use Corp\Repositories\Repository;
use Gate;

class AdminMenuRepository extends Repository
{

    public function __construct(AdminMenu $adminMenu)
    {
        $this->model = $adminMenu;
    }
}