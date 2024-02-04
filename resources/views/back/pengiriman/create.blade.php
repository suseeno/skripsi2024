@extends('layouts.default')
@section('title','CREATE Listing Pengiriman ')

@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		     <div>
           <h1><i class="fas fa-inbox text-white my-3">CREATE</i></h1>  
				<h5 class="text-white op-7 mb-2"></h5>
			</div> 
			<!-- <div class="ml-md-auto py-2 py-md-0">
			 <a href="#" class="btn btn-white btn-border btn-round mr-2"></a>
				<a href="#" class="btn btn-secondary btn-round"></A>
			</div> -->
		</div>
        {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                            <div class="alert alert-primary">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                           </div>
               @endif
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Pengiriman</div>
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
                        <a href="#">Pengiriman</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">create</a>
                    </li>
                </ul>
                        <a href="{{route('pengirim.index')}}"class="btn btn-primary btn-sm ml-auto"> BACK  TO INDEX</a>
					</div>
				</div>
				<div class="card-body">
                        <div class="table-responsive">
                                <form action="{{route('pengirim.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                    <label for="no_pengiriman">Nomor Pengiriman</label>
                                        <input type="text" class="form-control " name="no_pengiriman"id="text" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="tanggal">Date</label>
                                        <input type="date" class="form-control" id="text"name="tanggal"  required>
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                     <label for="lokasi">lokasi</label>
                                        <select class="form-control" name="lokasi_id">
                                            @foreach($lokasi as $lk)
                                            <option value="{{$lk->id}}">{{$lk->nama_lokasi}}</option>
                                            
                                            @endforeach
                                        </select>
                                      </div>
                                
                                <div class="form-group">
                                     <label for="barang">Barang</label>
                                        <select class="form-control" name="barang_id">
                                        @foreach($barang as $lk)
                                            <option value="{{$lk->id}}">{{$lk->nama_barang}}</option>
                                            
                                            @endforeach
                                        </select>
                                      </div>
                                
                                        <div class="form-group">
                                        <label for="jumlah_barang">Jumlah Barang </label>
                                        <input type="text" class="form-control" id="number"name="jumlah_barang" placeholder="masukan asal surat" required>
                                      </div>
                               
                                    </div>
                                        <div class="form-group">
                                        <label for="harga_barang">Harga Barang</label>
                                        <input type="text" class="form-control" id="text"name="harga_barang" placeholder="Harga Barang" required>
                                      </div>
                                    
                                    <div class="form-group">
                                     <label for="user_id">Kurir</label>
                                        <select class="form-control" name="user_id">
                                        @foreach($kurir as $lk)
                                            <option value="{{$lk->id}}">{{$lk->name}}</option>
                                            
                                            @endforeach
                                        </select>
                                      </div>
                                
                                  <!-- <div class="form-group">
                                     <label for="status">status</label>
                                        <select class="form-control" name="is_active">
                                            <option value="1">publish</option>
                                            <option value="0">draft</option>
                                        </select>
                                      </div>
                                </div> -->
                                <div class="form-group">
                                  <button type="submit"class="btn btn-primary  btn-sm ">save</button>
                                  <button type="reset"class="btn btn-danger  btn-sm ">reset</button>
                          </div>
                  </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection



