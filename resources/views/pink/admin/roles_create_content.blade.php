<div id="content-page" class="content group">
				            <div class="hentry group">

{!! Form::open(['url' => (isset($role->id)) ? route('admin.roles.update',['roles'=>$role->id]) :route('admin.roles.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<div class="form-group row required">
		<label for="title" class="col-form-label col-sm-2" > Имя </label>
		<div class="col-sm-10">
			{!! Form::text('name',isset($role->name) ? $role->name  : old('name'), ['placeholder'=>'Введите название роли', 'class' => 'form-control']) !!}
		</div>
	</div>
	<div>
			<table style="width:100%">
				<tbody>
				@if(!$permissions->isEmpty())

					@foreach($permissions as $val)
						<tr>

							<td>{{ $val->name }}</td>

								<td>
									@if(isset($role) && $role->hasPermission($val->name))
										<input checked name="role_id[]"  type="checkbox" value="{{ $val->id }}">
									@else
										<input name="role_id[]"  type="checkbox" value="{{ $val->id }}">
									@endif
								</td>

						</tr>
					@endforeach

				@endif

				</tbody>


			</table>
	</div>






	@if(isset($role->id))
		<input type="hidden" name="_method" value="PUT">

	@endif

	<div class="submit-button">
		{!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
	</div>
		 

	
    
    
    
    
{!! Form::close() !!}

</div>
</div>