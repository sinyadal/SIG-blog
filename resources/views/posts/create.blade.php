@extends('main')

@section('title', '| Create Posts')

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

@endsection

@section('content')

<div class="container col-md-6 col-md-offset-3">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align:center;">Create Posts</h3>
            <hr>

            <div class="panel panel-default">
                <div class="panel-body">
                 <!-- Laravel Form Helper -->
                {!! Form::open(array('route' => 'posts.store', 'files' => true)) !!} <!-- <form action="/" method="post" enctype="multipart/form-data"></form> -->

                    {{ Form::label('title', 'Title: ') }}
                    {{ Form::text('title', null, ['class' => 'form-control', 'style' => 'margin-bottom: 15px;']) }}

                    {{ Form::label('slug', 'URL Slug:') }}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'style' => 'margin-bottom: 15px;']) }}

                    {{ Form::label('category_id', 'Category:') }}
                    <select class="form-control" name="category_id" style="margin-bottom: 15px;">
                        @foreach ($categories as $category)
                            <option value='{{ $category->id }}'>{{ $category->name }}</option>
                        @endforeach
                    </select>

                    {{ Form::label('featured_image', 'Upload Featured Image') }}
                    {{ Form::file('featured_image') }}

                    {{ Form::label('body', 'Post body: ', ['style' => 'margin-top: 15px;']) }}
                    {{ Form::textarea('body', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Create post', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top: 15px;')) }}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

@endsection
