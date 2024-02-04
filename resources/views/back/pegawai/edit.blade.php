@extends('layouts.default')
@section('title','Add Employes')

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
						<div class="card-title">Users</div>
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
                        <a href="#">Users</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit</a>
                    </li>
                </ul>
                        <a href="{{route('pegawai.index')}}"class="btn btn-primary btn-sm ml-auto"> BACK  TO INDEX</a>
					</div>
				</div>
				<div class="card-body">
                        <div class="table-responsive">
                                <form action="{{route('pegawai.update',$employ->id)}}" method="post" enctype="multipart/form-data">
                                   @csrf
                               @method('PUT')
                                    <div class="form-group">
                                    <label for="name">Name</label>
                                        <input type="text" class="form-control " name="name"id="text" value="{{$employ->nama}}" placeholder="example:Jhon Doe" >
                                    </div>
                                    <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="text"name="tanggal_lahir"value="{{$employ->tanggal_lahir}}" >

                                    <div class="form-group">
                                    <label for="email">Email</label>
                                        <input type="text" class="form-control" placeholder="Example maiil: Jonndoe@gmail.com" name="email"id="text"value="{{$employ->email}}" >
                                    </div>
                                     <div class="form-group">
                                    <label for="no_hp">Phone Number</label>
                                        <input type="text" class="form-control " name="no_hp" placeholder ="Your Phone Number"id="text"value="{{$employ->no_hp}}">
                                    </div>
                                    <div class="form-group">
												<label for="alamat">Address</label>
												<textarea class="form-control" id="editor1"  name="alamat"rows="5">{{$employ->alamat}}
												</textarea>
											</div>
                                        
                                        <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" id="number"name="password" value="{{$employ->password}}" placeholder="Your password" >
                                      </div>
                               
                                    </div>
                                        <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="file"name="image" >
                                      </div>
                                    
                                     </div>
                                       <br>
                                        <label>Image Now :</label>
                                        <img src="{{asset('uploads/'.$employ->image)}} "width="70" alt="">
                                        </br>
                                  <div class="form-group">
                                     <label for="role">Level</label>
                                        <select class="form-control" name="role" >
                                                <option value="admin">Admin</option>
                                                <option value="Dapur">Dapur</option>
                                                <option value="Kasir">Kasir</option>
                                            </select>
                                        </div>
                                
                                
                                  <div class="form-group">
                                     <label for="gender">gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="form-group">
                                  <button type="submit"class="btn btn-success  btn-sm ">Submit</button>
                                  <button type="reset"class="btn btn-danger  btn-sm ">reset</button>
                          </div>
                  </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection



