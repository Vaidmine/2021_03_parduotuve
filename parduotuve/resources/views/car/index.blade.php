{{-- @foreach ($cars as $car)
  <a href="{{route('car.edit',[$car])}}">{{$car->title}}  >>>  {{$car->carMaker->name}}</a>
  <form method="POST" action="{{route('car.destroy', [$car])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach --}}
 


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">

               <h3>CARS LIST </h3> 
               <a href="{{route('car.index', ['sort' => 'title'])}}" class="btn btn-outline-primary waves-effect">Sort by Title</a>
               <a href="{{route('car.index')}}" class="btn btn-outline-primary waves-effect">Default</a>

              </div>

              <div class="card-body">
                <ul class="list-group">
                  @foreach ($cars as $car)
                  <li class="list-group-item list-line">
                   
                            <div class="list-line__cars__makers">  
                              <a href="{{route('car.edit',[$car])}}">{{$car->title}}  from  {{$car->carMaker->name}}</a>
                            </div>
                            <div class="list-line__buttons">
                              
                            <a href="{{route('car.edit',[$car])}}" class="btn btn-outline-primary waves-effect"> EDIT</a>
                            
                            <form method="POST" action="{{route('car.destroy', [$car])}}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger waves-effect">DELETE</button>
                            </form>
                            </div>
                    {{-- <br> --}}
                  </li>
                  @endforeach

                </ul>

              </div>
           </div>
       </div>
   </div>
</div>
@endsection

