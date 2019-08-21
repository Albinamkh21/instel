@foreach($items as $item)
		<tr>
			<td style="text-align: left;">{{ $paddingLeft }} {!! Html::link(route('admin.menu.edit',['menus' => $item->id]),$item->title) !!}</td>
			<td>{{ $item->url() }}</td>
			<td>{{ $item->attr('sort_order') }}</td>

			<td>
			{!! Form::open(['url' => route('admin.menu.destroy',['menus'=> $item->id]),'class'=>'form-delete','id' =>'deleteForm'.$item->id , 'method'=>'POST']) !!}
												    {{ method_field('DELETE') }}
												   {!! Form::button('<i class="fa  fa-trash-o" id="deleteBtn"></i>', ['class' => 'btn btn-danger', 'id' => $item->id,'type'=>'button']) !!}
												{!! Form::close() !!}

			</td>
		</tr>
		 @if($item->hasChildren())
		        @include(config('settings.theme').'.admin.custom-menu-items', array('items' => $item->children(),'paddingLeft' => $paddingLeft.'--'))
		 @endif

@endforeach



