

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">EDIT CAR</div>

               <div class="card-body">

                <form method="POST" action="{{route('car.update',[$car])}}">
                    Title: <input type="text" name="car_title" value="{{$car->title}}">
                    Plate: <input type="text" name="car_plate" value="{{$car->plate}}">
                    About: <textarea name="car_about">{{$car->about}}</textarea>
                    <select name="maker_id">
                        @foreach ($makers as $maker)
                            <option value="{{$maker->id}}" @if($maker->id == $car->maker_id) selected @endif>
                                {{$maker->name}} {{$maker->surname}}
                            </option>
                        @endforeach
                    </select>
                    @csrf
                    <button type="submit">EDIT</button>

                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
