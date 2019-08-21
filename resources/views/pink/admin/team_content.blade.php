@if($team)
	<section class="section section_white">
				            <div>
				                <h2>Добавленные человека</h2>
				                <div class="">
									<table class="table table-striped table-bordered">
				                        <thead>
				                            <tr>
				                                <th class="align-left">ID</th>
				                                <th>Имя</th>
				                                <th>Позиция</th>
				                                <th>Фото</th>
				                                <th>Описание</th>
												<th>Удалить</th>

				                            </tr>
				                        </thead>
				                        <tbody>
				                            
											@foreach($team as $teammember)
											<tr>
				                                <td class="align-left">{{$teammember->id}}</td>
				                                <td class="align-left">{!! Html::link(route('admin.team.edit',['team'=>$teammember->id]),$teammember->name) !!}</td>
												<td>{{$teammember->position}}</td>

				                                <td>
													@if(isset($teammember->img->mini))
													{!! Html::image(asset(env('THEME')).'/images/content/team/'.$teammember->img->mini) !!}
													@endif
												</td>
												<td class="align-left">{!! str_limit($teammember->text,200) !!}</td>

				                                <td>
												{!! Form::open(['url' => route('admin.team.destroy',['team'=>$teammember->id]),'class'=>'form-delete','id' =>'deleteForm'.$teammember->id,'method'=>'POST']) !!}
													{{ method_field('DELETE') }}
													{!! Form::button('<i class="fa  fa-trash-o" id="deleteBtn"></i>', ['class' => 'btn btn-danger', 'id' => $teammember->id,'type'=>'button']) !!}
													{!! Form::close() !!}

												</td>
											 </tr>	
											@endforeach	
				                           
				                        </tbody>
				                    </table>
				                </div>
								
								{!! HTML::link(route('admin.team.create'),'Добавить  ',['class' => 'btn btn-primary']) !!}
                                
				                
				            </div>
				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
	</section>
@endif