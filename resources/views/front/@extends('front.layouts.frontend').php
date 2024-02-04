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
<!-- Section Menu -->
<section id="menu">
<div class="container">
    <h1 class='text-center mt-6 p-3'> Menu</h1>
    <div class="row">
      @php
$categories = []; 
foreach ($menu as $mn) {
    
    $categories[$mn->category->name_category][] = $mn;
}
@endphp

@foreach($categories as $category => $items)
    <h2>{{ $category }}</h2>
    <div class="row">
        @foreach($items as $mn)
            <div class="col-md-4 my-3">
                <div class="">
                    <img src="{{ asset('uploads/'.$mn->image) }}" class="d-block w-50" alt="...">
                    <div class="card-body">
                       
                        <h1 class="card-text">{{ $mn->name }}</h1>
                        <p class="card-text">{{ $mn->description }}</p>
                        <h3 >Price: RP.{{ $mn->price }}</h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

    </div>
    
    <!-- <div id ="button">
<a class="btn btn-primary mt-3" href="#">View Menu</a>
</div> -->
    </div>

</div>
</section>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="0.8" d="M0,288L48,266.7C96,245,192,203,288,202.7C384,203,480,245,576,272C672,299,768,309,864,304C960,299,1056,277,1152,250.7C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
<!-- endsectionmenu -->

<!-- section Contact -->
        <section id ="contact">
           <div class="container">
    <h1 class="text-center">Contact Us</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="/contact" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-danger mt-5">Send Message</button>
    </form>
</div>
        </section>
<!-- End Section -->
 @endsection