<section class="section section_white">
	<h3 class="section__title">Меню</h3>


	<div class="">
		<table class="table table-striped table-bordered" id="menuTable">
		<thead>

			<th>Название</th>
			<th>Url</th>
			<th>Порядок сортировки</th>

			<th>Удалить</th>
		</thead>
		@if($menus)
			@include(config('settings.theme').'.admin.custom-menu-items', array('items' => $menus->roots(),'paddingLeft' => ''))

		@endif
		</table>
		</div>
		{!! HTML::link(route('admin.menu.create'),'Добавить  пункт',['class' => 'btn btn-primary']) !!}

</section>


