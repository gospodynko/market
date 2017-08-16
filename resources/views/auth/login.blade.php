@extends('layouts/master')

@section('page_class') wrapper-page @stop

@section('navigation')
	&nbsp;
@stop

@include('partial.message')

@section('content')
	<div class="content_wrapper_header">
		<h3>
			<a href="/" title="{{ trans('globals.go_back_label') }}">
		    	{{ trans('user.sign_in_your_account') }}
		    </a>
	    </h3>
    </div>

	<div class="content_wrapper">
	    <div class="row" ng-controller="LoginController">
	    	<div class="col-md-12">

	    		{!! Form::open(['url'=> (Route::getFacadeRoot()->current()->uri() == 'login') ? '/loginOauth' : '/login','name'=>'loginForm', 'class'=>'form-horizontal','role'=>"form",'method'=>"POST"]) !!}

				{{ csrf_field() }}

				@if((Route::getFacadeRoot()->current()->uri() == 'login'))
				<div class="form-group">
					<h6 class="black_color">{{ trans('user.phone') }}:</h6>
					<div class="input-group">
	      				<div class="input-group-addon"><span class="fa fa-phone"></span></div>
						<input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
					</div>
				</div>
				@else
					<div class="form-group">
						<h6 class="black_color">{{ trans('user.email') }}:</h6>
						<div class="input-group">
							<div class="input-group-addon"><span class="fa fa-envelope"></span></div>
							<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
						</div>
					</div>
				@endif

				<div class="form-group">
					<h6 class="black_color">{{ trans('user.password') }}:</h6>
					<div class="input-group">
	  					<div class="input-group-addon"><span class="fa fa-lock"></span></div>
						<input type="password" class="form-control" name="password">
					</div>
				</div>

				<div class="form-group">
					<hr>
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-log-in"></span>&nbsp;
						{{ trans('user.sign_in_my_account') }}
					</button>
				</div>

				{!! Form::close() !!}

	    	</div> {{-- col --}}

	    </div> {{-- row --}}

	</div> {{-- panel --}}
@endsection

@section('footer')
	&nbsp;
@endsection
