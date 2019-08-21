<?php
namespace Corp\Repositories;
use Corp\Portfolio;
use Corp\Repositories\Repository;
use Gate;
use Image;
use Config;

class PortfoliosRepository extends Repository {

    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
    }
    public function addPortfolio($request) {


        if(Gate::denies('save', $this->model)) {
            abort(403, 'Недостаточно прав');
        }

        $data = $request->except('_token','image');

        if(empty($data)) {
            return array('error' => 'Нет данных');
        }

        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }
        else {
            $data['alias'] = $this->transliterate($data['alias']);
        }

        if($this->getOne('alias',['alias', " ' ". $data['alias']. " ' "])) {
            $request->merge(array('alias' => $data['alias']));
            $request->flash();

            return ['error' => 'Данный псевдоним уже успользуется'];
        }
        if($data['url']) {

            $img_id = $this->get_youtube_video_ID($data['url']);
            $str = $img_id;
            $obj = new \stdClass;

            $obj->mini = $str.'_mini.jpg';
            $obj->max = $str.'_max.jpg';
            $obj->path = $str.'.jpg';

            $img = Image::make("http://img.youtube.com/vi/".$img_id."/maxresdefault.jpg");
            $img->fit(Config::get('settings.image')['width'],
                Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/portfolio/'.$obj->path);

            $img->fit(Config::get('settings.portfolio_img')['max']['width'],
                Config::get('settings.portfolio_img')['max']['height'])->save(public_path().'/'.env('THEME').'/images/portfolio/'.$obj->max);

            $img->fit(Config::get('settings.portfolio_img')['mini']['width'],
                Config::get('settings.portfolio_img')['mini']['height'])->save(public_path().'/'.env('THEME').'/images/portfolio/'.$obj->mini);

            $data['img'] = json_encode($obj);
        }
        $this->model->fill($data);

        if($this->model->save()) {
            return ['status' => 'Материал добавлен'];
        }

    }
    public function updatePortfolio($request, $portfolio) {

        if(Gate::denies('edit', $this->model)) {
            abort(403, 'Недостаточно прав');
        }

        $data = $request->except('_token','image', '_method');

        if(empty($data)) {
            return array('error' => 'Нет данных');
        }


        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }
        else {
            $data['alias'] = $this->transliterate($data['alias']);
        }
        $result =  $this->getOne('alias',['alias', " ' ". $data['alias']. " ' "]);
        if(isset($result->id) && $result->id != $portfolio->id) {
            $request->merge(array('alias' => $data['alias']));
            $request->flash();

            return ['error' => 'Данный псевдоним уже успользуется'];
        }

        if($data['url']) {

            $img_id = $this->get_youtube_video_ID($data['url']);
            $str = $img_id;
            $obj = new \stdClass;

            $obj->mini = $str.'_mini.jpg';
            $obj->max = $str.'_max.jpg';
            $obj->path = $str.'.jpg';

            $img = Image::make("http://img.youtube.com/vi/".$img_id."/maxresdefault.jpg");
            $img->fit(Config::get('settings.image')['width'],
                Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/portfolio/'.$obj->path);

            $img->fit(Config::get('settings.portfolio_img')['max']['width'],
                Config::get('settings.portfolio_img')['max']['height'])->save(public_path().'/'.env('THEME').'/images/portfolio/'.$obj->max);

            $img->fit(Config::get('settings.portfolio_img')['mini']['width'],
                Config::get('settings.portfolio_img')['mini']['height'])->save(public_path().'/'.env('THEME').'/images/portfolio/'.$obj->mini);

            $data['img'] = json_encode($obj);
        }
        // dd($data);
        $portfolio->fill($data);
        if($portfolio->update()) {
            return ['status' => 'Работа обновлена!'];
        }

    }

    public function deletePortfolio($portfolio)
    {

        if (Gate::denies('destroy', $portfolio)) {
            abort(403, 'Недостаточно прав');
        }
        //$portfolio->comments()->delete();
        if($portfolio->delete())
        {
            return ['status' => 'Статья удалена!'];
        }
    }
    private function get_youtube_video_ID( $data )
    {

        // IF 11 CHARS
        if( strlen($data) == 11 )
        {
            return $data;
        }

        preg_match( "/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/", $data, $matches);

        return isset($matches[2]) ? $matches[2] : false;
    }
    /*private function get_youtube_video_ID($youtube_video_url) {


        $pattern =
            '%                 
        (?:youtube                    # Match any youtube url www or no www , https or no https
        (?:-nocookie)?\.com/          # allows for the nocookie version too.
        (?:[^/]+/.+/                  # Once we have that, find the slashes
        |(?:v|e(?:mbed)?)/|.*[?&]v=)  # Check if its a video or if embed 
        |youtu\.be/)                  # Allow short URLs
        ([^"&?/ ]{11})                # Once its found check that its 11 chars.
        %i';
        print $pattern;
        // Checks if it matches a pattern and returns the value
        if (preg_match($pattern, $youtube_video_url, $match)) {
            print_r($match);
            return $match[1];
        }

        // if no match return false.
        return false;
    }
    */

}

?>