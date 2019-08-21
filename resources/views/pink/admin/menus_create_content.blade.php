<section class="section section_white">
	<h3 class="section__title">Меню</h3>

{!! Form::open(['url' => (isset($menu->id)) ? route('admin.menu.update',['menus'=>$menu->id]) : route('admin.menu.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    

	<div class="form-group">
		<label for="menuTitle"> Заголовок </label>
		<span class="input-prepend">
		{!! Form::text('title',isset($menu->title) ? $menu->title  : old('title'), ['placeholder'=>'Введите название пункта меню', 'class' => 'form-control']) !!}
		 </span>
	 </div>

	<div class="form-group">
		<label for="menuTitle"> Порядок сортировки </label>
		<span class="input-prepend">
		{!! Form::text('sort_order',isset($menu->sort_order) ? $menu->sort_order  : old('sort_order'), ['placeholder'=>'Введите порядок сортировки', 'class' => 'form-control']) !!}
		 </span>
	</div>


	<div class="form-group">
		<label for="menuParent"> Родительский пункт меню </label>
		<span class="input-prepend">
			{!! Form::select('parentId', $menus, isset($menu->parentId) ? $menu->parentId : null, [ 'class' => 'form-control']) !!}
		</span>
	</div>
	<label for="accordion">Тип меню </label>
	<div id="accordion">
		
		<div>{!! Form::radio('type', 'customLink',(isset($type) && $type == 'customLink') ? TRUE : FALSE,['class'=>"",  'checked' => 'checked']) !!}
		<span class="label">Пользовательская ссылка:</span></div>
			<ul class = "menu-type-list" style="display: block">

				<li class="text-field">
					<div class="form-group">
						<label for="custom_link"> Путь ссылки </label>
						{!! Form::text('custom_link',(isset($menu->path) && $type=='customLink') ? $menu->path  : old('custom_link'), ['placeholder'=>'Введите путь ','class' => 'form-control']) !!}

					</div>

				</li>
				<div style="clear: both;"></div>
			</ul>


		<div>{!! Form::radio('type', 'blogLink',(isset($type) && $type == 'blogLink') ? TRUE : FALSE,['class'=>""]) !!}
		<span class="label">Раздел Блог:</span></div>

		<ul class = "menu-type-list">


		<li class="text-field">
					<label for="name-contact-us">
						<span class="label">Ссылка на категорию блога:</span>


					</label>
					<span class="input-prepend">
						
						@if($categories)
						{!! Form::select('category_alias',$categories,(isset($option) && $option) ? $option :FALSE) !!}
						@endif
					</span>
				</li>
			
				
				<li class="text-field">
					<label for="name-contact-us">
						<span class="label">Ссылка на материал блога:</span>


					</label>
					<span class="input-prepend">
					{!! Form::select('article_alias', $articles, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Не используется']) !!}
			
					</span>
					 
				</li>	 
			<div style="clear: both;"></div>
			</ul>
			
			
			
		<div>{!! Form::radio('type', 'portfolioLink', (isset($type) && $type == 'portfolioLink') ? TRUE : FALSE, ['class' => '']) !!}
		<span class="label">Раздел портфолио:</span></div>
		<ul class = "menu-type-list">
			
				<li class="text-field">
					<label for="name-contact-us">
						<span class="label">Ссылка на запись портфолио:</span>

					</label>
					<span class="input-prepend">
					{!! Form::select('portfolio_alias', $portfolios, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Не используется']) !!}
			
					</span>
					 
				</li>
				
				<li class="text-field">
					<label for="name-contact-us">
						<span class="label">Портфолио:</span>

					</label>
					<span class="input-prepend">
					{!! Form::select('filter_alias', $filters, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Не используется']) !!}
			
					</span>
					 
				</li>
				
			
			</ul>
			
			
			
	</div>
		
		<br />
		
		@if(isset($menu->id))
			<input type="hidden" name="_method" value="PUT">		
		
		@endif

			<div class="">
						{!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}			
			</div>

		 
{!! Form::close() !!}

</section>
