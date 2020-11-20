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
						<li class="active">All Author</li>
					</ol>
				</div>			
			</div>

			<div class="row">
            <!-- Basic example -->
            <!-- <div class="col-md-2">
            	
            </div> -->

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Add Author</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                             
                                    <tbody>
                                        @foreach($authors as $row)
                                        <tr>
                                            <td>{{$row->fullName}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->address}}</td>
                                            <td><img src="{{$row->photo}}" style="height: 80px; width: 80px;"></td>
                                            <td>
                                                <a href="{{URL::to('/view_author/'.$row->id)}}" class="btn btn-sm btn-info">Show</a>
                                                <a href="{{URL::to('/edit_author/'.$row->id)}}" class="btn btn-sm btn-success">Update</a>
                                                <a href="{{URL::to('/delete_author/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col-->
		</div>
	</div>
</div>

@endsection