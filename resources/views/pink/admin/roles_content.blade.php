<div id="content-page" class="content group">
				            <div class="hentry group">
<h3 class="title_page">Роли</h3>


<div class="short-table white">
	<table class="table table-striped table-bordered" id="usersTable">
	<thead>
		<th>ID</th>
		<th>имя</th>
		<th></th>
	</thead>
	@if($roles)
		
		
		@foreach($roles as $role)
		<tr>
			<td>{{ $role->id }}</td>
			<td>{!! Html::link(route('admin.roles.edit',['roles' => $role->id]),$role->name) !!}</td>
			<td>
			{!! Form::open(['url' => route('admin.roles.destroy',['roles'=> $role->id]),'class'=>'form-delete','id' =>'deleteForm'.$role->id ,'method'=>'POST']) !!}
				{{ method_field('DELETE') }}
				{!! Form::button('<i class="fa  fa-trash-o" id="deleteBtn"></i>', ['class' => 'btn btn-danger', 'id' => $role->id,'type'=>'button']) !!}
			{!! Form::close() !!}

			</td>
		</tr>										
		@endforeach
		
	@endif
	</table>
	</div>
	{!! Html::link(route('admin.roles.create'),'Добавить  роль', ['class' => 'btn btn-primary']) !!}
	
</div></div>