@extends('main')

@section('title', '| Blog')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 style="text-align:center;">Blog</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="well">

				@foreach ($posts as $post)

				<dl>
					<h4>{{ $post->title }}</h4>
					<dd>{{ date('M j, Y', strtotime($post->created_at)) }}</dd>

					<dd>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</dd> <!-- Truncating -->
					<br>
					<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-default btn-sm">Read More</a>
					<hr>
				</dl>

				@endforeach

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>

</div>

@endsection
