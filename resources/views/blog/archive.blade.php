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


				@foreach ($posts as $post)
					<div class="well">

					<!-- Two ways to link - 1.  (Curl) url('blog/'.$post->slug) (Curl) or 2. (Curl) route('blog.single', $post->slug) (Curl) -->
							<h4><a style='text-decoration: none;' href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></h4>
							<p>{{ date('M j, Y', strtotime($post->created_at)) }}</p>
							<p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : ""}}</p>
							<!-- strip_tag function strip all tag, giving plain text -->
							<a href="{{ route('blog.single', $post->slug) }}" style="float: right;" class="btn btn-default">Read More</a>

				</div>
				<br>

				@endforeach


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
