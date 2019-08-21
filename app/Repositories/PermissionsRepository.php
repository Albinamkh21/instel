<?php
namespace Corp\Repositories;
use Corp\Permission;
use Corp\Repositories\Repository;
use Corp\Repositories\RolesRepository;
use Gate;
class PermissionsRepository extends Repository {

    protected $roles_repa;
    public function __construct(Permission $permission, RolesRepository $roles_repa)
    {
        $this->model = $permission;
        $this->roles_repa = $roles_repa;
    }
    public function changePermissions ($request) {

        if(Gate::denies('change', $this->model)) {
            abort(403);
        }

        $data = $request->except('_token');

        $roles = $this->roles_repa->get();



        foreach($roles as $value) {
            if(isset($data[$value->id])) {
                $value->savePermissions($data[$value->id]);
            }

            else {
                $value->savePermissions([]);
            }
        }

        return ['status' => 'Права обновлены'];
    }

    public function add($request) {
        if (Gate::denies('create',$this->model)) {
            abort(403, 'Нет прав на сохранение');
        }

        $data = $request->all();
        $permission = $this->model->create([
            'name' => strtoupper($data['name']),
        ]);
        return ['status' => 'Право добавлено'];

    }
    public function update($request, $permission) {


        if (Gate::denies('edit',$this->model)) {
            abort(403);
        }

        $data = $request->all();
        $permission->fill($data)->update();


        return ['status' => 'Право обновлено'];

    }

    public function delete($role) {

        if (Gate::denies('edit',$this->model)) {
            abort(403);
        }
        if($role->delete()) {

            return ['status' => 'Право удалено'];
        }
    }


}

?>