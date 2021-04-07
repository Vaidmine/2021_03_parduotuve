


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                <h3>MAKERS (PRODUCERS) LIST </h3> 

                <a href="{{route('maker.index', ['sort' => 'name'])}}" class="btn btn-outline-primary waves-effect">Sort by Name</a>
                <a href="{{route('maker.index')}}" class="btn btn-outline-primary waves-effect">Default</a>

               </div>

               

              <div class="card-body">
                <ul class="list-group">
                  @foreach ($makers as $maker)
                  <li class="list-group-item list-line">
                   
                            <div class="list-line__cars__makers">
                            <b>{{$maker->name}}</b> >>></a>
                            </div>
                            <div class="list-line__buttons">
                            <a href="{{route('maker.edit',[$maker])}}" class="btn btn-outline-primary waves-effect"> EDIT</a>
                            <form method="POST" action="{{route('maker.destroy', [$maker])}}">
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
