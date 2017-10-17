@extends('main')

@section('title', '| Contact')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h3 class="text-center">Contact</h3>


            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ url('contact') }}" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <input id="email" name="email" placeholder="Email" class="form-control">
                            </div>

                            <div class="form-group">
                                <input id="subject" name="subject" placeholder="Subject" class="form-control">
                            </div>

                            <div class="form-group">
                                <textarea id="message" placeholder="Message" name="message" class="form-control"></textarea>
                            </div>

                            <input type="submit" value="Send" class="btn btn-success pull-right">
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-5"><div class="panel panel-default">
                <div class="panel-body">
                <dl>
                    <dt><p>Contact us and we'll get back to you within 24 hours.</p></dt>
                    <dd><p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Kolej Universiti Islam Antarabangsa Selangor, Malaysia.</p></dd>
                    <dd><p><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> +00 1515151515</p></dd>
                    <dd><p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> kuistakdeair@gmail.com</p></dd>
                </dl>
              </div>
            </div>
                
            </div>
        </div>
    </div>
</div><!-- End (Content) -->

@endsection
