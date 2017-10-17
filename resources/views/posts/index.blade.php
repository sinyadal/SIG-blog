@extends('main')

@section('title', '| All posts')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="text-align:center;">DASHBOARD</h3>

			</div>

			<div class="col-md-12">
				<div class=" panel panel-default">
					<div class="panel-body">
						<div class="col-md-4 ">
							<a href="{{ route('blog.archive') }}" class="btn btn-block btn-default">Go to Blog</a>
						</div>
						<div class="col-md-4 ">
							<a href="{{ route('categories.index') }}" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> Add Categories</a>
						</div>
						<div class="col-md-4 ">
							<a href="{{ route('posts.create') }}" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add Post</a>
						</div>
	                </div>
                </div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<div class=" panel panel-default">
					<div class="panel-body">
				<table  class="table table-striped">
					<thead>
						<th>Title</th>
						<th>Body</th>
						<th>Created at</th>
						<th></th>
					</thead>

					<tbody>
						<!-- Loops to view each post in the table rowwwwwwwwww -->
						@foreach ($posts as $post)

							<tr>
								<td>{{ substr($post->title, 0, 25) }}{{ strlen($post->title) > 25 ? "..." : "" }}</td>
								<td>{{ substr(strip_tags($post->body), 0, 30) }}{{ strlen(strip_tags($post->body)) > 30 ? "..." : "" }}</td> <!-- truncating string using substr/ and also a loop (Conditional ? if true : if false) -->
								<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td> <!-- strtotime to convert current format to unix timestamp-->

								<td style="text-align:right;">
									<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
								</td>
								</tr>

						@endforeach

					</tbody>
				</table>
				<div class="row text-center">
					{!! $posts->links(); !!} <!-- Pagination button -->
					<!-- <p>Page doublecurl $posts->currentPage() }} of {doublecurl $posts->lastPage() }}</p>  -->
				</div>
			</div>
		</div>

			</div>
		</div>
	</div>



@endsection
