@extends('layouts.default')
@section('title','Listing Pengiriman')


@section('content')

<div class="">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Listing Pengiriman</h4>
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
								<a href="#">Listing Pengiriman</a>
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
						<div class="card-title">Listing Pengiriman</div>
                        <a href="{{route('pengirim.create')}}"class="btn btn-primary btn-sm ml-auto">
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
                                            <th  scope="col">No Pengiriman</th>
                                            <th  scope="col">Tanggal</th>
                                            <th  scope="col">lokasi </th>
                                            <th  scope="col">barang</th>
                                            <th  scope="col">jumlah Barang </th>
                                            <th  scope="col">Harga Barang </th>
                                            <th  scope="col">Kurir</th>
                                            <th  scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if($pengirim->count())
                                        @foreach($pengirim as $pm)
                                        <tr>
                                            <td>{{$pm->id}}</td>
                                            <td>{{$pm->no_pengiriman}}</td>
                                         <td>{{$pm->tanggal}}</td>
                                         <td>{{$pm->lokasi->nama_lokasi}}</td>
                                         
                                         <td>{{$pm->barang->nama_barang}}</td>
                                         <td>{{$pm->jumlah_barang}}</td>
                                         <td>{{$pm->harga_barang}}</td>
                                         <td>{{$pm->user->name}}</td>
                                           
                                            <td>
                                            <a href="{{route('pengirim.edit', $pm->id)}}"class="btn btn-link btn-primary"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('pengirim.destroy',$pm->id)}}" method="post" class="d-inline">
                                                    @method('delete')
                                                      @csrf
                                                      <button type="submit"class="btn btn-link btn-danger" onclick="return confirm('Yakin mau dihapus?')"><i class="fa fa-times"></i></button>
                                                
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



