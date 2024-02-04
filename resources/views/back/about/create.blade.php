@extends('layouts.default')
@section('title','Add about')

@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			{{-- <div>
				<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
				<h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5>
			</div> --}}
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">ADD About</div>
                        <a href="{{route('about.index')}}"class="btn btn-warning btn-sm ml-auto"> BACK</a>
					</div>
				</div>
				<div class="card-body">
                        <div class="table-responsive">
                                <form action="{{route('about.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                     <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                  </div> 
                                    <div class="form-group">
                                    <label for="title">Title</label>
                                        <input type="text" class="form-control" id="text"name="title" placeholder="Enter nama kategori">
                                    </div>
                                    <div class="form-group">
                                    <label for="description">Description</label>
	                                        <textarea class="form-control" id="editor1"  name="description"rows="5">
												</textarea>
                                    </div>

                                <div class="form-group">
                                <button type="submit"class="btn btn-success">Submit</button>
                                </div>
                        </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


