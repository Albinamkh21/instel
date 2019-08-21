<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Permission;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\PermissionsRepository;
use Corp\Http\Requests\PermissionRequest;
use Gate;

class PermissionController extends AdminController
{

    protected $permissions_repa;

    public function __construct(PermissionsRepository $permissions_repa)
    {
        parent::__construct(new \Corp\Repositories\AdminMenuRepository(new \Corp\AdminMenu));
        $this->permissions_repa = $permissions_repa;
        $this->template = env('THEME').'.admin.permissions';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkUser();
        if(Gate::denies('EDIT_USERS', $this->user)){
            abort(403, "У Вас недостаточно прав!");
        }
        $this->title = 'Управление правами пользователей.';
        $permissions = $this->getPermissions();
        $content = view(env('THEME').'.admin.permissions_content')->with(['permissions' => $permissions])->render();
        $this->data = array_add($this->data, 'content',$content);

        return $this->renderOutput();

    }
    public function getPermissions(){

        return $this->permissions_repa->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title =  'Добавление  права';
        $permissions = $this->permissions_repa->get();
        $this->content = view(config('settings.theme').'.admin.permissions_create_content')->with(['permissions' => $permissions])->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $result = $this->permissions_repa->add($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/permissions')->with($result);
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
    public function edit(Permission $permission)
    {
        $this->title =  'Редактирование права - '. $permission->name;
        $this->content = view(config('settings.theme').'.admin.permissions_create_content')->with(['permission'=>$permission])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $result = $this->permissions_repa->update($request,$permission);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/permissions')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $result = $this->permissions_repa->delete($permission);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin/permissions')->with($result);
    }
}
