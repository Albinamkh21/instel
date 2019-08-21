<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\TeamRepository;
use Gate;

use Corp\Http\Requests\TeamRequest;
use Corp\Team;

class TeamController extends AdminController
{
    public function __construct(TeamRepository $teamRepository)
    {
        parent::__construct(new \Corp\Repositories\AdminMenuRepository(new \Corp\AdminMenu));
        $this->team_repa = $teamRepository;
        $this->template = env('THEME').'.admin.team';
    }

    public function index() {
        $this->checkUser();
        if(Gate::denies('VIEW_ADMIN', $this->user)){
            abort(403, "У Вас недостаточно прав!");
        }

        $this->title = 'Управление статьями';
        $team = $this->getTeam();
        $content = view(env('THEME').'.admin.team_content')->with('team',$team)->render();
        $this->data = array_add($this->data, 'content',$content);

        return $this->renderOutput();

    }
    public function getTeam(){
        return $this->team_repa->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('save', new Team)){
            abort('403', 'У Вас недостаточно прав!');
        }
        $this->title = 'Добавление нового члена команды';

        $this->content = view(env('THEME').'.admin.team_create_content')->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {

        $result = $this->team_repa->addTeamMember($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin/team')->with($result);

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
    public function edit(Team $team)
    {
        //$article  = Team::where('alias', $alias)->first();
        if(Gate::denies('edit', new Team)){
            abort('403', 'У Вас недостаточно прав!');
        }

        $this->title = 'Редактирование данных по  '.$team->name ;
        $team->img = json_decode( $team->img);

        $this->content = view(env('THEME').'.admin.team_create_content')->with(['team' => $team ])->render();
        return $this->renderOutput();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        // $article = Team::where('alias', $alias)->first();
        $result = $this->team_repa->updateTeamMember($request, $team);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin/team')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {

        $result = $this->team_repa->deleteTeamMember($team);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin/team')->with($result);
    }
}
