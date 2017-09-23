
<!-- Messages for Posts -->

@if (Session::has('success'))
<div class="container col-md-6 col-md-offset-3">
	<div class="alert alert-success" role="alert">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Success!</strong> {{ Session::get('success') }}
	</div>	
</div>


@endif 

@if (count($errors) > 0)
<div class="container col-md-6 col-md-offset-3">
	<div class="alert alert-danger" role="alert">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Errors!</strong> 
		<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li> 
		@endforeach			
		</ul>
	</div>	
	
</div>


@endif