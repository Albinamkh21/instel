<div id="content-page" class="content group">
				            <div class="hentry group">
<h3 class="title_page">Пользователи</h3>


<div class="short-table white">
	<table class="table table-striped table-bordered" id="usersTable">
	<thead>
		<th>ID</th>
		<th>имя</th>
		<th>Email</th>
		<th>Логин</th>
		<th>Роль</th>
		<th></th>
	</thead>
	@if($users)
		
		
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{!! Html::link(route('admin.users.edit',['users' => $user->id]),$user->name) !!}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->login }}</td>
			<td>{{ $user->roles->implode('name', ', ') }}</td>


			<td>
			{!! Form::open(['url' => route('admin.users.destroy',['users'=> $user->id]),'class'=>'form-delete','id' =>'deleteForm'.$user->id ,'method'=>'POST']) !!}
				{{ method_field('DELETE') }}
				{!! Form::button('<i class="fa  fa-trash-o" id="deleteBtn"></i>', ['class' => 'btn btn-danger', 'id' => $user->id,'type'=>'button']) !!}
			{!! Form::close() !!}

			</td>
		</tr>										
		@endforeach
		
	@endif
	</table>
	</div>
	{!! Html::link(route('admin.users.create'),'Добавить  пользователя', ['class' => 'btn btn-primary']) !!}
	
</div></div>