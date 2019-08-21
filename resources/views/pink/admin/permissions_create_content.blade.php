<div id="content-page" class="content group">
  <div class="hentry group">

{!! Form::open(['url' => (isset($permission->id)) ? route('admin.permissions.update',['permissions'=>$permission->id]) :route('admin.permissions.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<div class="form-group row required">
		<label for="title" class="col-form-label col-sm-2" > Имя </label>
		<div class="col-sm-10">
			{!! Form::text('name',isset($permission->name) ? $permission->name  : old('name'), ['placeholder'=>'Введите название роли', 'class' => 'form-control']) !!}
		</div>
	</div>
	@if(isset($permission->id))
		<input type="hidden" name="_method" value="PUT">

	@endif

	<div class="submit-button">
		{!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
	</div>

{!! Form::close() !!}

	</div>
</div>