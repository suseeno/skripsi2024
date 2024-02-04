@extends('layouts.default')
@section('title','Lokasi')


@section('content')

<div class="">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Listing Lokasi</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Lokasi</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#"></a>
							</li>
						</ul>
					</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Listing Lokasi</div>
                        <a href="{{route('lokasi.create')}}"class="btn btn-primary btn-sm ml-auto">
                        <i class="fa fa-plus"></i>
                                CREATE
                        </a>
					</div>
				</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"></h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th  scope="col">id</th>
                                            <th  scope="col">Nama_lokasi</th>
                                            <th  scope="col">Kode_lokasi</th>
                                            <th  scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@if($lok->count())
                                        @foreach($lok as $lk)
                                        <tr>
                                            <td>{{$lk->id}}</td>
                                            <td class="text-center">{{$lk->nama_lokasi}}</td>
                                            <td>{{$lk->kode_lokasi}}</td>
                                          
                                            
                                           
                                            <td>
                                            <a href="{{route('lokasi.edit', $lk->id)}}"class="btn btn-link btn-primary"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('category.destroy', $ct->id)}}" method="post" class="d-inline">
                                                    @method('delete')
                                                      @csrf
                                                      <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')"><i class="fas fa-trash">delete</i></button>
                                                </form>
                                            </td>
                                        </tr>
                            
                                        @endforeach
                                      @endif
                                    </tbody>
                                </table>
                                <div>
                                   
                               
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection



