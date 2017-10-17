@extends('main')

@section('title', '| View Posts')

@section('stylesheets')

  {!! Html::script('js/prism.js') !!}
  {!! Html::style('css/prism.css') !!}

@endsection

<style>
	.glyphicon{
  	padding-right: 0px !important;
}
</style>

@section('content')

<div class="container">

	<div class="row">

		<div class="col-md-4">
      <div class=" panel panel-default">
				<div class="panel-body">

				<dl>
					<dt>Category: </dt>
					<dd>{{ @$post->category->name }}</dd> <!-- Added the @ sign and solve the empty categories bug-->
				</dl>

				<dl>
					<dt>URL: </dt>
					<dd><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></dd>
				</dl>

				<dl>
					<dt>Created at: </dt>
					<dd>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl>
					<dt>Last updated at: </dt>
					<dd>{{ date('M j, Y H:i a', strtotime($post->updated_at)) }}</dd>
				</dl>

				<hr>

				<div class="row">
					<div class="col-sm-12">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-success btn-block', 'style' => 'margin-bottom: 5px;')) !!}

						<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">Delete</button>

						{!! Html::linkRoute('posts.index', 'Back', array($post->id), array('class' => 'btn btn-default btn-block')) !!}
					</div>
				</div>
			</div>
    </div>

		</div>

		<div class="col-md-8">

      <div class=" panel panel-default">
				<div class="panel-body">

		@if($post->image == null)

		@else
			<img src="{{ asset('images/' . $post->image) }}" width="100%">
		@endif

			<h3>{{ $post->title }}</h3>
			<hr>
			<p>{!! $post->body !!}</p>

    </div>
  </div>

  <div class=" panel panel-default">
    <div class="panel-body">
			<div id="backend-comments" >
				<h4>Comment <small>{{ $post->comments()->count() }} total</small></h4>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comments</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-default btn-sm']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
    </div>
  </div>
		</div>

@endsection
