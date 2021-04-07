
 
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">ADD NEW CAR</div>

               <div class="card-body">
                 
                <form method="POST" action="{{route('car.store')}}">

                    <div class="form-group">
                        <label>Title: </label>
                        <input type="text" class="form-control" name="car_title">
                        <small class="form-text text-muted">Please enter new Car </small>
                    </div>

                    <div class="form-group">
                        <label>Plate: </label>
                        <input type="text" class="form-control" name="car_plate">
                        <small class="form-text text-muted">Please enter Plates number </small>
                    </div>

                    <div class="form-group">
                        <label>About: </label>
                        <textarea id="summernote" name="car_about"></textarea>
                        <small class="form-text text-muted">Please enter info about this Car </small>
                    </div>

                    <div class="form-group">
                        <label>Please select a Car: </label>
                        <div>
                            <select name="maker_id">
                                @foreach ($makers as $maker)
                                    <option value="{{$maker->id}}">{{$maker->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <small class="form-text text-muted">Please select Maker </small>
                    </div>

      
                    @csrf
                    <button type="submit"class="btn btn-outline-primary waves-effect">ADD</button>
                 </form>


               </div>
           </div>
       </div>
   </div>
</div>

<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>

@endsection
