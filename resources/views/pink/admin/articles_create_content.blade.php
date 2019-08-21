
<div >

{!! Form::open(['url' => (isset($article->id)) ? route('admin.articles.update',['articles'=>$article->alias]) : route('admin.articles.store'),'class'=>'','method'=>'POST','enctype'=>'multipart/form-data']) !!}


	<div class="form-group row required">
		<label for="title" class="col-form-label col-sm-2" > Название статьи </label>
		<div class="col-sm-10">
			{!! Form::text('title',isset($article->title) ? $article->title  : old('title'), ['placeholder'=>'Введите название страницы', 'class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Псевдоним </label>
		<div class="col-sm-10">
			{!! Form::text('alias', isset($article->alias) ? $article->alias  : old('alias'), ['placeholder'=>'Введите псевдоним ','class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Мета-тег Keywords </label>
        <div class="col-sm-10">
			{!! Form::text('keywords', isset($article->keywords) ? $article->keywords  : old('keywords'), ['placeholder'=>'Мета-тег Keywords','class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Мета-тег Description </label>
        <div class="col-sm-10">
			{!! Form::text('meta_desc', isset($article->meta_desc) ? $article->meta_desc  : old('meta_desc'), ['placeholder'=>'Мета-тег Description','class' => 'form-control']) !!}
		</div>
	</div>

    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Краткое описание </label>
        <div class="col-sm-10">
			{!! Form::textarea('desc', isset($article->desc) ? $article->desc  : old('desc'), ['id'=>'editor', 'placeholder'=>'Краткое описание','class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Описание </label>
        <div class="col-sm-10">
			{!! Form::textarea('text', isset($article->text) ? $article->text  : old('text'), ['id'=>'editor2','placeholder'=>'Описание','class' => 'form-control']) !!}
		</div>
	</div>
	@if(isset($article->img->path))
        <div class="form-group row required">
            <label for="title" class="col-form-label col-sm-2" > Изображение </label>
            <div class="col-sm-10">
                {{ Html::image(asset(env('THEME')).'/images/articles/'.$article->img->path,'',['style'=>'width:400px']) }}
                {!! Form::hidden('old_image',$article->img->path) !!}
            </div>
		</div>
	@endif
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Выбрать новое изображение </label>
        <div class="col-sm-10">
		    {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
        </div>
	</div>

    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Категория </label>
        <div class="col-sm-10">
		    {!! Form::select('categoryId', $categories,isset($article->category_id) ? $article->category_id  : '', [ 'class' => 'form-control']) !!}
        </div>
	</div>
	<div class="form-group required">
		{!! Form::button('Сохранить', ['class' => 'btn btn btn-primary','type'=>'submit']) !!}
	</div>

	@if(isset($article->id))
		<input type="hidden" name="_method" value="PUT">

	@endif

{!! Form::close() !!}

 <script>
	CKEDITOR.replace( 'editor' );
	CKEDITOR.replace( 'editor2' );
</script>
</div>
