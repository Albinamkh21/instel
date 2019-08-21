<div id="content-page" class="content group">
				            <div class="hentry group">

{!! Form::open(['url' => (isset($user->id)) ? route('admin.users.update',['users'=>$user->id]) :route('admin.users.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<div class="form-group row required">
		<label for="title" class="col-form-label col-sm-2" > Имя </label>
		<div class="col-sm-10">
			{!! Form::text('name',isset($user->name) ? $user->name  : old('name'), ['placeholder'=>'Введите имя пользователя', 'class' => 'form-control']) !!}
		</div>
	</div>

	<div class="form-group row required">
		<label for="login" class="col-form-label col-sm-2" > Логин </label>
		<div class="col-sm-10">
			{!! Form::text('login',isset($user->login) ? $user->login  : old('login'), ['placeholder'=>'Введите логин', 'class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group row required">
		<label for="email" class="col-form-label col-sm-2" > Email </label>
		<div class="col-sm-10">
			{!! Form::text('email',isset($user->email) ? $user->email  : old('email'), ['placeholder'=>'Введите Email', 'class' => 'form-control']) !!}
		</div>
	</div>

	<div class="form-group row required">
		<label for="login" class="col-form-label col-sm-2" > Роль </label>
		<div class="col-sm-10">
			{!! Form::select('role_id', $roles, (isset($user)) ? $user->roles()->first()->id : null, [ 'class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group row required">
		<label for="title" class="col-form-label col-sm-2" > Пароль </label>
		<div class="col-sm-10">
			{!! Form::password('password' , ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="form-group row required">
		<label for="login" class="col-form-label col-sm-2" > Подтверждение пароля </label>
		<div class="col-sm-10">
			{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
		</div>
	</div>

	@if(isset($user->id))
		<input type="hidden" name="_method" value="PUT">

	@endif

	<div class="submit-button">
		{!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
	</div>
		 

	
    
    
    
    
{!! Form::close() !!}

</div>
</div>