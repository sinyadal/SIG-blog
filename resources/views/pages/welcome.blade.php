@extends('main')

@section('title', '| Home')

@section('content')




  <div class="container">

      <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-8">

              <h1 class="page-header">
                  Welcome to SIG Blog

              </h1>

              <!-- First Blog Post -->

              @foreach($posts as $post)
              <div class="well">
              <h2>
                  <a href="#"><a style='text-decoration: none;' href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></a>
              </h2>
              <p class="lead">
                  in <a href="{{ route('categories.show', @$post->category->id) }}">{{ @$post->category->name }}</a>
              </p>
              <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('M j, Y', strtotime($post->created_at)) }}</p>
              <br>

              @if($post->image == null)
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
              @else
                <img class="img-responsive" src="{{ asset('images/' . $post->image) }}" width="100%">
              @endif

              <br>
              <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : ""}}</p>
              <a class="btn btn-primary" style="float: right;" href="{{ url('blog/'.$post->slug) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            </div>
            <br>
              @endforeach


              <!-- Pager -->
              <ul class="pager">
                  <li class="previous">
                      <a href="#">&larr; Older</a>
                  </li>
                  <li class="next">
                      <a href="#">Newer &rarr;</a>
                  </li>
              </ul>

          </div>

          <!-- Blog Sidebar Widgets Column -->
          <div class="col-md-4">

              <!-- Blog Search Well -->
              <div class="well">
                  <h4>Blog Search</h4>
                  <div class="input-group">
                    <form action="search" method="POST">
                        {{ csrf_field() }}
                        <input name="search" type="text" class="form-control" placeholder="Search..">
                    </form>
                      <span class="input-group-btn">
                          <button class="btn btn-default" type="button">
                              <span class="glyphicon glyphicon-search"></span>
                      </button>
                      </span>
                  </div>
                  <!-- /.input-group -->
              </div>

              <!-- Blog Categories Well -->
              <div class="well">
                  <h4>Blog Categories</h4>
                  <div class="row">
                      <div class="col-md-12">
                          <ul class="list-unstyled">
                            @foreach ($categories as $category)
                              <li><a href="{{ route('categories.show', $category->id) }}" style="text-decoration: none;">{{ $category->name }}</a></a>
                              </li>

                            @endforeach
                          </ul>
                      </div>
                      <!-- /.col-lg-6 -->
                  </div>
                  <!-- /.row -->
              </div>

              {{-- <!-- Side Widget Well -->
              <div class="well">
                  <h4>Recent Post</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
              </div> --}}

          </div>

      </div>
      <!-- /.row -->



@endsection
