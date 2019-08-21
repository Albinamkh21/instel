@if($menu)
	<nav class="menu ">
		<ul id="nav" class="menu">
			@include(env('THEME').'.admin.navigation_item', ['items' => $menu->roots()])
		</ul>
	</nav>
@endif

