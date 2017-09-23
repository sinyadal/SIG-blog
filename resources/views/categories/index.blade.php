@extends('main')

@section('title', '| All Categories')

@section('content')

<div class="container col-md-6 col-md-offset-3">
	<div class="row">
		<div class="col-md-12">

			<h3 style="text-align:center;">Categories</h3>
			<hr>
			
			<div class=" panel panel-default">
				<div class="panel-body">
					<form role="form" method="POST" action="{{ route('categories.store') }}">
	                    {{ csrf_field() }}
	                    <div class="col-md-8">
	                    	<input type="text" class="form-control" placeholder="New Category" name="name" value="{{ old('name') }}" required>
	                    </div>
	                    
	                    <div class="col-md-4">
	                        <button type="submit" class="btn btn-primary btn-block">
	                            Create
	                        </button>
	                    </div>
	                </form>
                </div>
            </div>
			
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th></th>
					</tr>
				</thead>

				<tbody>

					@foreach ($categories as $category)

						<tr>
							<td><a href="{{ route('categories.show', $category->id) }}" style="text-decoration: none;">{{ $category->name }}</a></td>
							<td style="text-align:right;">
								{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE', 'style' => 'margin-bottom: 5px;']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-default']) !!}
								{!! Form::close() !!}
							</td>
						</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection