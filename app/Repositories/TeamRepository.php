<?php
namespace Corp\Repositories;
use Corp\Team;
use Corp\Repositories\Repository;
use Gate;
use Image;
use Config;

class TeamRepository extends Repository {

    public function __construct(Team $team)
    {
        $this->model = $team;
    }

    public function addTeamMember($request) {

        if(Gate::denies('save', $this->model)) {
            abort(403, 'Недостаточно прав');
        }

        $data = $request->except('_token','image');

        if(empty($data)) {
            return array('error' => 'Нет данных');
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');

            if($image->isValid()) {

                $str = str_random(8);

                $obj = new \stdClass;

                $obj->mini = $str.'_mini.jpg';
                $obj->path = $str.'.jpg';

                $img = Image::make($image);

                $img->fit(Config::get('settings.image')['width'],
                    Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/content/team/'.$obj->path);
               
                $img->fit(Config::get('settings.team_img')['mini']['width'],
                    Config::get('settings.team_img')['mini']['height'])->save(public_path().'/'.env('THEME').'/images/content/team/'.$obj->mini);


                $data['img'] = json_encode($obj);

            }

        }
        $this->model->fill($data);

        if($this->model->save()) {
            return ['status' => 'Материал добавлен'];
        }

    }
    public function updateTeamMember($request, $team) {

        if(Gate::denies('edit', $this->model)) {
            abort(403, 'Недостаточно прав');
        }

        $data = $request->except('_token','image', '_method');

        if(empty($data)) {
            return array('error' => 'Нет данных');
        }
        if($request->hasFile('image')) {
            $image = $request->file('image');

            if($image->isValid()) {

                $str = str_random(8);

                $obj = new \stdClass;

                $obj->mini = $str.'_mini.jpg';
                $obj->max = $str.'_max.jpg';
                $obj->path = $str.'.jpg';

                $img = Image::make($image);

                $img->fit(Config::get('settings.image')['width'],
                    Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/content/team/'.$obj->path);

                $img->fit(Config::get('settings.team_img')['mini']['width'],
                    Config::get('settings.team_img')['mini']['height'])->save(public_path().'/'.env('THEME').'/images/content/team/'.$obj->mini);


                $data['img'] = json_encode($obj);

            }

        }
       // dd($data);
        $team->fill($data);
        if($team->update()) {
            return ['status' => 'Данные обновлены!'];
        }

    }

    public function deleteTeamMember($team)
    {

        if (Gate::denies('destroy', $team)) {
            abort(403, 'Недостаточно прав');
        }

        if($team->delete())
        {
            return ['status' => 'Данные удалены!'];
        }
    }

}