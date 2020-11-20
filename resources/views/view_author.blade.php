@extends('layouts.app')
@section('content')

<div class="content-page">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="pull-left page-title">Welcome!</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="#">Hacking With Ethics</a></li>
						<li class="active">Author Info</li>
					</ol>
				</div>			
			</div>

			<div class="row">
            <!-- Basic example -->
            <!-- <div class="col-md-2">
            	
            </div> -->

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1 class="">Author Info</h1></div>
                    <div class="panel-body">
                    	<div class="form-group">
                            <label for="exampleInputFullName">Full Name</label>
                            <p>{{$viewAuthorInfo->fullName}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <p>{{$viewAuthorInfo->email}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone">Phone</label>
                            <p>{{$viewAuthorInfo->phone}}</p>                        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress">Address</label>
                            <p>{{$viewAuthorInfo->address}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress">Photo</label>
                            <div>
                                <img style="width: 80px; height: 80px;" src="{{URL::to($viewAuthorInfo->photo)}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputProfileText">Profile Text</label>
                            <p>{{$viewAuthorInfo->profileText}}</p>
                        </div>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col-->
		</div>
	</div>
</div>
@endsection