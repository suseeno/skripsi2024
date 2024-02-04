@extends('layouts.default')
@section('title','Edit Menus ')

@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		     <div>
           <h1><i class="fas fa-inbox text-white my-3">Update</i></h1>  
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
						<div class="card-title">update</div>
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
                        <a href="#">Update</a>
                    </li>
                </ul>
                        <a href="{{route('menu.index')}}"class="btn btn-primary btn-sm ml-auto"> BACK  TO INDEX</a>
					</div>
				</div>
				<div class="card-body">
                        <div class="table-responsive">
                        <form action="{{route('menu.update',$mn->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                    <label for="name">Nama Menu</label>
                                        <input type="text" class="form-control " name="name"id="name" value="{{$mn->name}}" placeholder="Masukkan nama Menu" required >
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="price">Price</label>
                                        <input type="text" class="form-control" id="kode" value="{{$mn->price}}"   name="price">
                                    </div>
                                  <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="editor"  name="description">{{$mn->description}}</textarea>     
                                    </div>
                                   <div class="form-group">
                                        <label for="category_menus_id">Category Menu</label>
                                        <select class="form-control"name="category_menus_id">
                                            @foreach ($cat as $row)
                                            <option value="{{$row->id}}">{{$row->name_category}}</option>
                                            
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Image </label>
                                        <input type="file" name="image" class="form-control">
                                        <br>
                                        <label for="">Image Saat Ini</label><BR>
                                        <img src="{{asset('uploads/'.$mn->image)}} "width="100" alt="">
                                  </div>
                                  <div class="form-group">
                                     <label for="status">status</label>
                                       <select class="form-control" name="is_active">
                                            <option value="1"{{$mn->is_active=='1'?'selected' : ''}}>publish</option>
                                            <option value="0"{{$mn->is_active=='0'?'selected' : ''}}>draft</option>
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



