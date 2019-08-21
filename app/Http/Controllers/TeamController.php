<?php

namespace Corp\Http\Controllers;

use Corp\Policies\TeamPolicy;
use Illuminate\Http\Request;
use Corp\Repositories\TeamRepository;


use Config;

class TeamController extends SiteController
{

    public function __construct(TeamRepository $team_repa)
    {

        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->team_repa = $team_repa;
        $this->sidebar = 'no';
        $this->template = env('THEME').'.team';


    }
    public function index($category = false)
    {
        $this->title = "Instel.kz - Команда";
        $this->meta_desc = "Видеореклама, корпоративные ролики, документальные фильмы, видеозаставки, видеосъемка, изготовление видеороликов в Алматы, изготовление видеорекламы ";
        $this->keywords = "Видеореклама, корпоративные ролики, документальные фильмы, видеозаставки, видеосъемка, изготовление видеороликов в Алматы, изготовление видеорекламы ";


        $team = $this->getTeam();
        $content = view(env('THEME').'.team_content')->with('team', $team)->render();
        $this->data = array_add($this->data, 'content',$content);
        return $this->renderOutput();
    }

    public function getTeam($id = false, $select = false){

        $where = array();

        if($id){
            $where = ['id',$id];
        }
        if(!$select) $select = ['*'];
        $team = $this->team_repa->get($select ,false, true, $where);

        return $team;
    }


    public function show($alias = false)
    {

        $select = ['*'];
        $teamMember = $this->getTeam(false, $select)[0];
        if(isset($team->id)){
            $this->title = $article->title;
            $this->keywords = $article->keywords;
            $this->meta_desc = $article->meta_desc;
        }

        $content = view(env('THEME').'.team_content')->with('teamMember', $teamMember)->render();
        $this->data = array_add($this->data, 'content',$content);
        return $this->renderOutput();
    }




}
