

 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">EDIT MAKER</div>

               <div class="card-body">
                  
                <form method="POST" action="{{route('maker.update',[$maker->id])}}">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control"name="maker_name" value="{{old('maker_name',$maker->name)}}"> 
                        <small class="form-text text-muted">Please edit maker</small>
                    </div>

                    {{-- Name: <input type="text" name="maker_name" value="{{$maker->name}}"> --}}



                    @csrf
                    <button type="submit" class="btn btn-outline-primary waves-effect">EDIT</button>
                 </form>


               </div>
           </div>
       </div>
   </div>
</div>
@endsection
