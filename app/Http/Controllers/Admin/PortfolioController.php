<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\PortfoliosRepository;
use Gate;

use Corp\Portfoliocategory as Category;
use Corp\Http\Requests\PortfolioRequest;
use Corp\Portfolio;

class PortfolioController extends AdminController
{
    public function __construct(PortfoliosRepository $portfoliosRepository)
    {
        parent::__construct(new \Corp\Repositories\AdminMenuRepository(new \Corp\AdminMenu));
        $this->portfolio_repa = $portfoliosRepository;
        $this->template = env('THEME').'.admin.portfolios';
    }

    public function index() {
        $this->checkUser();
        if(Gate::denies('VIEW_ADMIN_PORTFOLIOS', $this->user)){
            abort(403, "У Вас недостаточно прав!");
        }

        $this->title = 'Управление портфолио';
        $portfolios = $this->getPortfolios();

        $content = view(env('THEME').'.admin.portfolios_content')->with('portfolios',$portfolios)->render();
        $this->data = array_add($this->data, 'content',$content);

        return $this->renderOutput();

    }
    public function getPortfolios(){
        return $this->portfolio_repa->get();
    }
    public function create()
    {
        if(Gate::denies('save', new Portfolio)){
            abort('403', 'У Вас недостаточно прав!');
        }
        $this->title = 'Добавление работы';
        $categories = Category::select(['title','alias','id'])->get();

        $lists = array();

        foreach($categories as $category) {
           $lists[$category->id] = $category->title;

        }
        $this->content = view(env('THEME').'.admin.portfolios_create_content')->with('categories', $lists)->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {

        $result = $this->portfolio_repa->addPortfolio($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin/portfolios')->with($result);

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
    public function edit(Portfolio $portfolio)
    {
        //$article  = Article::where('alias', $alias)->first();
        if(Gate::denies('edit', new Portfolio())){
            abort('403', 'У Вас недостаточно прав!');
        }

        $this->title = 'Редактирование портфолио '.$portfolio->name ;
        $portfolio->img = json_decode( $portfolio->img);
        $categories = Category::select(['title','alias','id'])->get();

        $lists = array();
        foreach($categories as $category) {
            $lists[$category->id] = $category->title;

        }

        $this->content = view(env('THEME').'.admin.portfolios_create_content')->with(['categories'=> $lists, 'portfolio' => $portfolio ])->render();
        return $this->renderOutput();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        // $article = Article::where('alias', $alias)->first();
        $result = $this->portfolio_repa->updatePortfolio($request, $portfolio);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin/portfolios')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {

        $result = $this->portfolio_repa->deletePortfolio($portfolio);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin/portfolios')->with($result);
    }

}
