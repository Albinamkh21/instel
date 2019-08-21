<div id="content-page" class="content group">
	<div class="hentry group">
		<h3 class="title_page">Привилегии</h3>


		<div class="short-table white">
			<table class="table table-striped table-bordered" id="usersTable">
				<thead>
				<th>ID</th>
				<th>имя</th>
				<th></th>
				</thead>
				@if(!$permissions->isEmpty())
					@foreach($permissions as $permission)
						<tr>
							<td>{{ $permission->id }}</td>
							<td>{!! Html::link(route('admin.permissions.edit',['permissions' => $permission->id]),$permission->name) !!}</td>
							<td>
								{!! Form::open(['url' => route('admin.permissions.destroy',['permissions'=> $permission->id]),'class'=>'form-delete','id' =>'deleteForm'.$permission->id ,'method'=>'POST']) !!}
								{{ method_field('DELETE') }}
								{!! Form::button('<i class="fa  fa-trash-o" id="deleteBtn"></i>', ['class' => 'btn btn-danger', 'id' => $permission->id,'type'=>'button']) !!}
								{!! Form::close() !!}

							</td>
						</tr>
					@endforeach

				@endif
			</table>
		</div>
		{!! Html::link(route('admin.permissions.create'),'Добавить право', ['class' => 'btn btn-primary']) !!}

	</div>
</div>

