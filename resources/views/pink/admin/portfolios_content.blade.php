<section class="section section_white">
				            <div>
				                <h2>Работы</h2>
				                <div class="">
									<table class="table table-striped table-bordered">
				                        <thead>
				                            <tr>
				                                <th class="align-left">ID</th>
				                                <th>Заголовок</th>
				                                <th>Текст</th>
				                                <th>Изображение</th>
				                                <th>Категория</th>
				                                <th>Псевдоним</th>
				                                <th>Дествие</th>
				                            </tr>
				                        </thead>
				                        <tbody>
										@if($portfolios)
											@foreach($portfolios as $portfolio)
											<tr>
				                                <td class="align-left">{{$portfolio->id}}</td>
				                                <td class="align-left">{!! Html::link(route('admin.portfolios.edit',['portfolios'=>$portfolio->alias]),$portfolio->title) !!}</td>
				                                <td class="align-left">{!!str_limit($portfolio->text,200) !!}</td>
				                                <td>
													@if(isset($portfolio->img->mini))
													{!! Html::image(asset(env('THEME')).'/images/portfolio/'.$portfolio->img->mini) !!}
													@endif
												</td>
				                                <td>{{$portfolio->category->title}}</td>
				                                <td>{{$portfolio->alias}}</td>
				                                <td>
												{!! Form::open(['url' => route('admin.portfolios.destroy',['portfolios'=>$portfolio->alias]),'class'=>'form-delete','id' =>'deleteForm'.$portfolio->id,'method'=>'POST']) !!}
													{{ method_field('DELETE') }}
													{!! Form::button('<i class="fa  fa-trash-o" id="deleteBtn"></i>', ['class' => 'btn btn-danger', 'id' => $portfolio->id,'type'=>'button']) !!}
													{!! Form::close() !!}

												</td>
											 </tr>	
											@endforeach
										@endif
				                        </tbody>
				                    </table>
				                </div>
								
								{!! HTML::link(route('admin.portfolios.create'),'Добавить  материал',['class' => 'btn btn-primary']) !!}
                                
				                
				            </div>
				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
</section>
