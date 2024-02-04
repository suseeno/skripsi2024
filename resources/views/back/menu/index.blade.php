@extends('layouts.default')
@section('title','Menu')


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
						<div class="card-title">Listing Menu</div>
                        <a href="{{route('menu.create')}}"class="btn btn-primary btn-sm ml-auto">Add Category Menu</a>
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
                                            <th  scope="col">Name</th>
                                            <th  scope="col">slug</th>
                                            <!-- <th  scope="col">Category Menu</th> -->

                                            <th  scope="col">Price</th>
                                            <th  scope="col">Description</th>
                                            <th  scope="col">Status</th>
                                            <th  scope="col">Images</th>
                                            <th  scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($menu as $mn)
                                        <tr>
                                            <td  scope="row">{{$mn->id}}</td>
                                            <td>{{$mn->name}}</td>
                                            <td>{{$mn->slug}}</td>
                                            <!-- <td>{{$mn->category->name_category}}</td> -->
                                            <td>{{$mn->price}}</td>
                                            <td>{{$mn->description}}</td>
                                             <td>
                                                @if ($mn->is_active==1)
                                                <div class="p-3 mb-2 bg-success text-white rounded"> ada </div>                                                 
                                                 @else
                                                 <div class="p-3 mb-2 bg-warning text-white rounded">  Habis </div>
                                               @endif
                                            </td>
                                            <td>
                                        <img src="{{asset('uploads/'.$mn->image)}} "width="100" alt="">       
                                     </td>
                                            <td>
                                            <a href="{{route('menu.edit', $mn->id)}}"class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                                              <form action="{{route('menu.destroy', $mn->id)}}" method="post" class="d-inline">
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



