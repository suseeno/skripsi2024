@extends('layouts.default')
@section('title','CREATE    LOKASI ')

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
						<div class="card-title">Menu</div>
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
                        <a href="#">Menu</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">create</a>
                    </li>
                </ul>
                        <a href="{{route('menu.index')}}"class="btn btn-primary btn-sm ml-auto"> BACK  TO INDEX</a>
					</div>
				</div>
				<div class="card-body">
                        <div class="table-responsive">
                                <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                    <label for="name">Nama Menu</label>
                                        <input type="text" class="form-control " name="name"id="name" placeholder="Masukkan nama Menu" required >
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="price">Price</label>
                                        <input type="text" class="form-control" id="kode"name="price">
                                    </div>
                                  <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="editor" name="description"></textarea>     
                                    </div>
                                   <div class="form-group">
                                        <label for="category_menus_id">Category Menu</label>
                                        <select class="form-control"name="category_menus_id">
                                            @foreach ($cat as $row)
                                            <option value="{{$row->id}}">{{$row->name_category}}</option>
                                            
                                        @endforeach
                                        </select>
                                    </div>
                                   
                                    <div class=
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                  </div> 
                                  <div class="form-group">
                                     <label for="status">status</label>
                                        <select class="form-control" name="is_active">
                                            <option value="1">publish</option>
                                            <option value="0">draft</option>
                                        </select>
                                      </div>
                                </div>
                                  <div class="form-group">
                                     <label for="status_masakan">status</label>
                                        <select class="form-control" name="status_masakan">
                                            <option value="1">Ada</option>
                                            <option value="0">Habis</option>
                                        </select>
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



