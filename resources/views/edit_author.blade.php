@extends('layouts.app')
@section('content')

<div class="content-page">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h4 class="pull-left page-title">Welcome!</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="#">Hacking With Ethics</a></li>
						<li class="active">Dashboard</li>
					</ol>
				</div>			
			</div>

			<div class="row">
            <!-- Basic example -->
            <!-- <div class="col-md-2">
            	
            </div> -->

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Update Author Info</h3></div>
                    <div class="panel-body">
                        <form role="form" action="{{ url('/update_author/'.$editAuthorInfo->id) }}" method="POST" enctype="multipart/form-data">
                        	@csrf
                        	<div class="form-group">
                                <label for="exampleInputFullName">Full Name</label>
                                <input type="text" class="form-control" name="fullName" value="{{$editAuthorInfo->fullName}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{$editAuthorInfo->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$editAuthorInfo->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$editAuthorInfo->address}}">
                            </div>
                            <div class="form-group">
                                <img id="image" src="#">
                                <label for="exampleInputAddress">Photo</label>
                                <input type="file" class="form-control" name="photo" accept="image/*" class="upload"  required onchange="readURL(this);">
                            </div>
                            <div class="form-group">
                                <img style="width: 80px; height: 80px;" src="{{URL::to($editAuthorInfo->photo)}}" name="oldImage">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProfileText">Profile Text</label>
                                <input type="text" class="form-control" name="profileText" value="{{$editAuthorInfo->profileText}}">
                            </div>
                      
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                        </form>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col-->
		</div>
	</div>
</div>

<script type="text/javascript">
	function readURL(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e) {
				$('image')
				.attr('src', e.target.result)
				.width(80)
				.height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@endsection