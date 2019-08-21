<?php

namespace Corp\Http\Controllers\Admin;


use Illuminate\Http\Request;

use Corp\Http\Requests;
use Corp\Http\Requests\RoleRequest;
use Corp\Role;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\RolesRepository;
use Corp\Repositories\PermissionsRepository;

use Config;
use Gate;
class RolesController extends AdminController
{
    protected $permissions_repa;
    protected $roles_repa;
    public function __construct(PermissionsRepository $permissions_repa, RolesRepository $roles_repa) {
        parent::__construct(new \Corp\Repositories\AdminMenuRepository(new \Corp\AdminMenu));
        $this->permissions_repa = $permissions_repa;
        $this->roles_repa = $roles_repa;
        $this->template = config('settings.theme').'.admin.roles';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkUser();
        if (Gate::denies('EDIT_USERS')) {
            abort(403, 'Недостаточно прав для редактирования роли');
        }
        $roles = $this->roles_repa->get();
        $this->content = view(config('settings.theme').'.admin.roles_content')->with(['roles'=>$roles ])->render();

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title =  'Новая роль';
        $permissions = $this->permissions_repa->get();
        $this->content = view(config('settings.theme').'.admin.roles_create_content')->with(['permissions' => $permissions])->render();
        return $this->renderOutput();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        //
        //dd($request->all());
        $result = $this->roles_repa->add($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/roles')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->title =  'Редактирование роли - '. $role->name;
        $permissions = $this->permissions_repa->get();
        $this->content = view(config('settings.theme').'.admin.roles_create_content')->with(['role'=>$role, 'permissions' => $permissions])->render();
        return $this->renderOutput();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        //
        $result = $this->roles_repa->update($request,$role);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/roles')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $result = $this->roles_repa->delete($role);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/roles')->with($result);
    }
}
