@extends('layouts.default')
@section('title',' EDIT LOKASI')

@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		     <div>
           <h1><i class="fas fa-inbox text-white my-3">EDIT</i></h1>  
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
						<div class="card-title">LOKASI</div>
                        <a href="{{route('lokasi.index')}}"class="btn btn-primary btn-sm ml-auto"> BACK  TO INDEX</a>
					</div>
				</div>
				<div class="card-body">
                        <div class="table-responsive">
                        <form action="{{route('lokasi.update',$lok->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                    <label for="nama_lokasi">Nama_lokasi </label>
                                        <input type="text" class="form-control " name="nama_lokasi"id="nama_lokasi" value="{{$lok->nama_lokasi}}" >
                                    </div>
                                    <div class="form-group">
                                    <label for="Kode_lokasi">Kode Lokasi </label>
                                        <input type="text" class="form-control" id="kode_lokasi"name="kode_lokasi" value="{{$lok->kode_lokasi}}">
                                    </div>
                                     
                                </div>
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



