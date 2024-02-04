@extends('front.layouts.frontend')
@section('content')
@section('title','Drasa Cafe')
@include('front.includes.banner')



<!-- <div class="container">
    <div class="row my-5">
        <div class="col-md-4">
            <div class="">
                <img src="{{asset('uploads/slide/zB7jLUG5OA4SjEmmgZmIkFupSBAkEcHqgIw5R1yj.jpg')}}" alt="Menu Item 1" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Resposive</h5>
                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores neque nihil minima. Ex, placeat tempore. of Drasa  2.</p>
                    <p class="card-text">Price: $10</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="">
                <img src="{{asset('uploads/slide/zB7jLUG5OA4SjEmmgZmIkFupSBAkEcHqgIw5R1yj.jpg')}}" alt="Menu Drasa  1" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Drasa  2</h5>
                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores neque nihil minima. Ex, placeat tempore. of Drasa  2.</p>
                    <p class="card-text">Price: $ 50</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="">
                <img src="{{asset('uploads/slide/zB7jLUG5OA4SjEmmgZmIkFupSBAkEcHqgIw5R1yj.jpg')}}" alt="Menu Drasa  1" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Drasa  3</h5>
                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores neque nihil minima. Ex, placeat tempore. of Item 3.</p>
                    <p class="card-text">Price: $15</p>
                </div>
            </div>
        </div>
    </div> -->

<!-- Section About -->
<section id="about">
    @foreach($about as $ab)
 <div class="container my-3">
        <div class="row">
            <div class="col-md-6 order-2 order-md-1">
      <img src="{{asset('uploads/'.$ab->image)}}" class="d-block w-50" alt="...">
            </div>
            <div class="col-md-6 order-1 order-md-2">
                <h2>{{$ab->title}}</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam viverra odio id dui dictum, eu varius arcu congue. Vestibulum quis neque nec nulla eleifend blandit vel nec tortor.
                </p>
            </div>
        </div>
    </div>
    @endforeach
 </section>
 .
 <!-- section input meja -->
    <div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group text-center">
                    <label for="title">Pilih Meja</label>
                    <input type="text" class="form-control text-center" id="text" name="title" placeholder="Enter  table">
                </div>
                <div class="form-group text-center">
                    <label for="title">Masukan Nama Anda</label>
                    <input type="text" class="form-control text-center" id="text" name="title" placeholder="Enter Your Name">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

 
<!-- section Contact -->
     
 @endsection