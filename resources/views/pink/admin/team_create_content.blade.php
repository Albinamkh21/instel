
<div >

{!! Form::open(['url' => (isset($team->id)) ? route('admin.team.update',['team'=>$team->id]) : route('admin.team.store'),'class'=>'','method'=>'POST','enctype'=>'multipart/form-data']) !!}


	<div class="form-group row required">
		<label for="title" class="col-form-label col-sm-2" > Имя </label>
		<div class="col-sm-10">
			{!! Form::text('name',isset($team->name) ? $team->name  : old('name'), ['placeholder'=>'Введите имя', 'class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Позиция </label>
		<div class="col-sm-10">
			{!! Form::text('position', isset($team->position) ? $team->position  : old('position'), ['placeholder'=>'Введите позицию ','class' => 'form-control']) !!}
		</div>
	</div>
    <!--
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Мета-тег Keywords </label>
        <div class="col-sm-10">
			{!! Form::text('keywords', isset($team->keywords) ? $team->keywords  : old('keywords'), ['placeholder'=>'Мета-тег Keywords','class' => 'form-control']) !!}
		</div>
	</div>
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Мета-тег Description </label>
        <div class="col-sm-10">
			{!! Form::text('meta_desc', isset($team->meta_desc) ? $team->meta_desc  : old('meta_desc'), ['placeholder'=>'Мета-тег Description','class' => 'form-control']) !!}
		</div>
	</div>
    -->
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Описание </label>
        <div class="col-sm-10">
			{!! Form::textarea('text', isset($team->text) ? $team->text  : old('text'), ['id'=>'editor', 'placeholder'=>'Описание','class' => 'form-control']) !!}
		</div>
	</div>
    @if(isset($team->img->path))
        <div class="form-group row required">
            <label for="title" class="col-form-label col-sm-2" > Фото </label>
            <div class="col-sm-10">
                {{ Html::image(asset(env('THEME')).'/images/content/team/'.$team->img->path,'',['style'=>'width:400px']) }}
                {!! Form::hidden('old_image',$team->img->path) !!}
            </div>
		</div>
	@endif
    <div class="form-group row required">
        <label for="title" class="col-form-label col-sm-2" > Выбрать новое фото </label>
        <div class="col-sm-10">
		    {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Выберите фото','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
        </div>
	</div>


	<div class="form-group required">
		{!! Form::button('Сохранить', ['class' => 'btn btn btn-primary','type'=>'submit']) !!}
	</div>

	@if(isset($team->id))
		<input type="hidden" name="_method" value="PUT">

	@endif

{!! Form::close() !!}

 <script>
	CKEDITOR.replace( 'editor' );

</script>
</div>
