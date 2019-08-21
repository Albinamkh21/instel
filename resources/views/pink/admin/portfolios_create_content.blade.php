
<div >

{!! Form::open(['url' => (isset($portfolio->id)) ? route('admin.portfolios.update',['portfolios'=>$portfolio->alias]) : route('admin.portfolios.store'),'class'=>'','method'=>'POST','enctype'=>'multipart/form-data']) !!}


	<div class="form-group row required">
		<label for="title" class="col-form-label col-sm-2" > Заголовок </label>
		<div class="col-sm-10">
			{!! Form::text('title',isset($portfolio->title) ? $portfolio->title  : old('title'), ['placeholder'=>'Введите название страницы', 'class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Псевдоним </label>
		<div class="col-sm-10">
			{!! Form::text('alias', isset($portfolio->alias) ? $portfolio->alias  : old('alias'), ['placeholder'=>'Введите псевдоним ','class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Заказчик </label>
        <div class="col-sm-10">
            {!! Form::text('customer', isset($portfolio->customer) ? $portfolio->customer  : old('customer'), ['placeholder'=>'Заказчик ','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Мета-тег Keywords </label>
        <div class="col-sm-10">
			{!! Form::text('keywords', isset($portfolio->keywords) ? $portfolio->keywords  : old('keywords'), ['placeholder'=>'Мета-тег Keywords','class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Мета-тег Description </label>
        <div class="col-sm-10">
			{!! Form::text('meta_desc', isset($portfolio->meta_desc) ? $portfolio->meta_desc  : old('meta_desc'), ['placeholder'=>'Мета-тег Description','class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" >  Адрес ссылки на видео </label>
        <div class="col-sm-10">
            {!! Form::text('url', isset($portfolio->url) ? $portfolio->url  : old('url'), ['placeholder'=>'Введите адрес ссылки','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Описание </label>
        <div class="col-sm-10">
			{!! Form::textarea('text', isset($portfolio->text) ? $portfolio->text  : old('text'), ['id'=>'editor','placeholder'=>'Описание','class' => 'form-control']) !!}
		</div>
	</div>
<!--
	@if(isset($portfolio->img->path))
        <div class="form-group row required">
            <label for="title" class="col-form-label col-sm-2" > Изображение </label>
            <div class="col-sm-10">
                {{ Html::image(asset(env('THEME')).'/images/articles/'.$portfolio->img->path,'',['style'=>'width:400px']) }}
                {!! Form::hidden('old_image',$portfolio->img->path) !!}
            </div>
		</div>
	@endif

    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Выбрать новое изображение </label>
        <div class="col-sm-10">
		    {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
        </div>
	</div>
    -->
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Категория </label>
        <div class="col-sm-10">
		    {!! Form::select('category_id', $categories,isset($portfolio->category_id) ? $portfolio->category_id  : '', [ 'class' => 'form-control']) !!}
        </div>
	</div>
	<div class="form-group required">
		{!! Form::button('Сохранить', ['class' => 'btn btn btn-primary','type'=>'submit']) !!}
	</div>

	@if(isset($portfolio->id))
		<input type="hidden" name="_method" value="PUT">

	@endif

{!! Form::close() !!}

 <script>
	CKEDITOR.replace( 'editor' );

</script>
</div>
