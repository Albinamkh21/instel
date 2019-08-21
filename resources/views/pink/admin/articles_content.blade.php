@if($articles)
	<section class="section section_white">
				            <div>
				                <h2>Добавленные статьи</h2>
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
				                            
											@foreach($articles as $article)
											<tr>
				                                <td class="align-left">{{$article->id}}</td>
				                                <td class="align-left">{!! Html::link(route('admin.articles.edit',['articles'=>$article->alias]),$article->title) !!}</td>
				                                <td class="align-left">{{str_limit($article->text,200)}}</td>
				                                <td>
													@if(isset($article->img->mini))
													{!! Html::image(asset(env('THEME')).'/images/articles/'.$article->img->mini) !!}
													@endif
												</td>
				                                <td>{{$article->category->title}}</td>
				                                <td>{{$article->alias}}</td>
				                                <td>
												{!! Form::open(['url' => route('admin.articles.destroy',['articles'=>$article->alias]),'class'=>'form-delete','id' =>'deleteForm'.$article->id,'method'=>'POST']) !!}
													{{ method_field('DELETE') }}
													{!! Form::button('<i class="fa  fa-trash-o" id="deleteBtn"></i>', ['class' => 'btn btn-danger', 'id' => $article->id,'type'=>'button']) !!}
													{!! Form::close() !!}

												</td>
											 </tr>	
											@endforeach	
				                           
				                        </tbody>
				                    </table>
				                </div>
								
								{!! HTML::link(route('admin.articles.create'),'Добавить  материал',['class' => 'btn btn-primary']) !!}
                                
				                
				            </div>
				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
	</section>
@endif