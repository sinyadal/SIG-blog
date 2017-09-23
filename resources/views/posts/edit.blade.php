@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')

  {!! Html::script('js/tinymce/tinymce.min.js') !!}

  {!! Html::script('js/prism.js') !!}
  {!! Html::style('css/prism.css') !!}

<!-- TinyMCE ******************************************************************************************************************************** -->

<script>

tinymce.init({
    selector: 'textarea',
    plugins: 'link  codesample emoticons textcolor colorpicker image preview fullscreen table lists',
    toolbar: "fontselect fontsizeselect | forecolor backcolor | styleselect | removeformat | bold italic underline |  aligncenter alignjustify | bullist numlist | outdent indent | table | lists | link | code | codesample | image | preview | fullscreen ",
    menubar: false,
    codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
        {text: 'Ruby', value: 'ruby'},
        {text: 'Python', value: 'python'},
        {text: 'Java', value: 'java'},
        {text: 'C', value: 'c'},
        {text: 'C#', value: 'csharp'},
        {text: 'SQL', value: 'sql'}
    ],
});

tinyMCE.triggerSave(); // This shit save the item zzzzz

</script>

<!-- TinyMCE ******************************************************************************************************************************** -->

<style>
    label{
        font-weight: bold !important;
    }

</style>

@section('content')

{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!} 

<div class="container col-md-6 col-md-offset-3">

	<div class="row">

		<div class="col-md-4">
			<div class="well">

				<dl >
					<dt>Created at: </dt>
					<dd>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl >
					<dt>Last updated at: </dt>
					<dd>{{ date('M j, Y H:i a', strtotime($post->updated_at)) }}</dd>
				</dl>

				<hr>

				<div class="row">
					<div class="col-sm-12"><!-- Model Form Binding --> <!-- PATCH or PUT method for update -->
						
						{{ Form::submit('Save', ['class' => 'btn btn-success btn-block']) }}
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-default btn-block')) !!}
					</div>
				</div>
			</div>
		</div>
		

    	<div class="col-md-8">
	    	<div class="panel panel-default">
	    		<div class="panel-body">
		    		{{ Form::label('title', 'Title:') }}
			    	{{ Form::text('title', null, ['class' => 'form-control', 'style' => 'margin-bottom: 15px;']) }} <!-- Form helper -->

			    	{{ Form::label('slug', 'URL Slug:') }}
			    	{{ Form::text('slug', null, ['class' => 'form-control ', 'style' => 'margin-bottom: 15px;']) }} <!-- Form helper -->

			    	{{ Form::label('category_id', 'Category:') }}
			    	{{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'style' => 'margin-bottom: 15px;']) }} <!-- Form helper -->

			    	{{ Form::label('featured_image', 'Update Featured Images: ', ['style' => 'margin-top: 15px;']) }}
			    	{{ Form::file('featured_image') }}

			    	{{ Form::label('body', 'Body:', ['style' => 'margin-top: 15px;']) }}
			    	{{ Form::textarea('body', null, ['class' => 'form-control']) }} <!-- Form helper -->
					{!! Form::close() !!}
	    		</div>
	    	</div>
		</div>
	</div>
</div>

@endsection

@section('script')

@endsection