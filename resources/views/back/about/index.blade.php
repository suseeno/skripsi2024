@extends('layouts.default')
@section('title','About')


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
						<div class="card-title">Listing about</div>
                        <a href="{{route('about.create')}}"class="btn btn-primary btn-sm ml-auto">Add About</a>
					</div>
				</div>
				<div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-primary">
                      {{ session('success')}}
                    </div>
                    @endif
					<div class="table-responsive">
                        <div class="card-body">
                            <div class="table-responsive">
                               
										<table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th  scope="col">id</th>
                                            <th  scope="col">Title</th>
                                            <th  scope="col">Description</th>
                                            <th  scope="col">Images</th>
                                            <th scope> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $dt)
                                        <tr>
                                            <td scope="row">{{$dt->id}}</td>
                                            <td>{{$dt->title}}</td>
                                            <td>{{$dt->description}}</td>
                                            
                                            
                                            
                                            <td>
                                                <img src="{{asset('uploads/'.$dt->image)}} "width="100" alt="">       
                                     </td>
                                            <td>
                                            <a href="{{route('about.edit',$dt->id)}}"class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                                              <form action="{{route('about.destroy',$dt->id)}}" method="post" class="d-inline">
                                                    @method('delete')
                                                      @csrf
                                                      <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin mau dihapus?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                       </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection



