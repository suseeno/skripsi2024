@extends('layouts.default')
@section('title','halaman kategori')


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
						<div class="card-title">Category Menu</div>
                        <a href="{{route('category.create')}}"class="btn btn-primary btn-sm ml-auto">Add Category Menu</a>
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
                                            <th  scope="col">Name Category</th>
                                            <th  scope="col">slug</th>
                                            <th  scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cat as $ct)
                                        <tr>
                                            <td  scope="row">{{$ct->id}}</td>
                                            <td>{{$ct->name_category}}</td>
                                            <td>{{$ct->slug}}</td>
                                            <td>
                                                <a href="{{route('category.edit', $ct->id)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i>edit</a>
                                                <form action="{{route('category.destroy', $ct->id)}}" method="post" class="d-inline">
                                                    @method('delete')
                                                      @csrf
                                                      <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin mau dihapus?')"><i class="fas fa-trash">delete</i></button>
                                                </form>
                                            </td>
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



