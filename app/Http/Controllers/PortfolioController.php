<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\PortfoliosRepository;
use Corp\Portfoliocategory as Category;
use Collective\Html;

class PortfolioController extends SiteController
{
    public function __construct(PortfoliosRepository $portfolio_repa)
    {

        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->portfolio_repa = $portfolio_repa;
        $this->template = env('THEME').'.portfolio';


    }
    public function index($category = false)
    {

        $this->title = "Instel.kz - Портфолио";
        $this->meta_desc = "Видеореклама, корпоративные ролики, документальные фильмы, видеозаставки, видеосъемка, изготовление видеороликов в Алматы, изготовление видеорекламы ";
        $this->keywords = "Видеореклама, корпоративные ролики, документальные фильмы, видеозаставки, видеосъемка, изготовление видеороликов в Алматы, изготовление видеорекламы ";


       $portfolios = $this->getPortfolios($category);
       $categories = Category::select(['title','alias','id'])->get();

       $content = view(env('THEME').'.portfolio_content')->with(['portfolios'=> $portfolios, 'categories'=> $categories])->render();
       $this->data = array_add($this->data, 'content',$content);



        return $this->renderOutput();
    }

    public function show($alias = false)
    {
      //  $select = ['title', 'alias', 'created_at', 'img', 'desc', 'userId', 'categoryId','id', 'text', 'meta_desc', 'keywords'];
        $where = array();
        if($alias) {
            $where = ['alias', $alias ];
        }
        $portfolio = $this->portfolio_repa->getOne('*', $where);
        $otherPortfolios =  $this->getPortfolios(false,config('settings.portfolio_recent_projects_count'), false);
        $this->title = $portfolio->title;
        $this->keywords = $portfolio->keywords;
        $this->meta_desc = $portfolio->meta_desc;
        $content = view(env('THEME').'.portfolio_show')->with(['portfolio' => $portfolio, 'otherPortfolios' => $otherPortfolios,])->render();
        $this->data = array_add($this->data, 'content',$content);



        return $this->renderOutput();
    }
    public function getPortfolios($category = false, $take = false, $pagination = true){
        $where = array();
        if($category){
            $id = Category::select('id')->where('alias', $category)->first()->id;
            $where = ['category_id',$id];
        }
        $portfolios  = $this->portfolio_repa->get('*', $take, $pagination, $where);
       /*if($portfolios){
            $portfolios->load('Portfoliocategory');
        }
*/
        return  $portfolios;
    }
}
