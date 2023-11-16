@extends('Dashboards.Layouts.admin-dash-layout')
@section('title','SD Keeper | Edit Place')

@section('content')




<div class="container">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12 p-2">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Information | {{$places->name}}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          @if (count($errors) > 0)
          <div class="alert alert-danger">          
              <strong>Sorry!</strong> There were more problems with your input.<br><br>         
              <ul>         
                @foreach ($errors->all() as $error)        
                    <li>{{ $error }}</li>        
                @endforeach        
              </ul>         
          </div>          
          @endif

  
          <form  method="post" action="{{route('admin.edit.place', [$places->id])}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" placeholder="Enter Name" name="name" value={{($places->name)}}>
              </div>
              <div class="input-group mt-3 mb-3">
                <input type="text" class="form-control" placeholder="Phone" name="phone">
              </div>
              <div class="form-group mt-3 mb-3">
                <label for="">Area</label>
                <input type="text" class="form-control" id="" placeholder="Enter Area" name="area" value={{($places->area)}}>
              </div>


              <div class="row">
                <div class="form-group col-6">
                    <label for="">Latitude</label>
                    <input type="" class="form-control" id="" placeholder="Enter Location" name="lat" value={{($places->lat)}}>
                </div>
                <div class="form-group col-6">
                    <label for="">Longitude</label>
                    <input type="" class="form-control" id="" placeholder="Enter Location" name="long" value={{($places->long)}}>
                </div>
              </div>
              <div>
                <!-- select Type-->
                <div class="form-group">
                  <label>Business type</label>
                  <select class="form-control"  name="type">
                    <option value="" selected>--- Select business type ---</option>
                    <option  value="Restaurant" >Restaurant</option>
                    <option value="Mall" >Mall</option>
                    <option value="Café" >Café</option>
                    <option value="Hospital" >Hospital</option>
                    <option value="Store" >Store</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="">Upload Images</label>
                <div class="input-group hdtuto control-group lst increment mb-2" >
                    <input type="file" name="filenames[]" class="myfrm form-control">              
                    <div class="input-group-btn">              
                    </div>
                </div>
                <div class="input-group hdtuto control-group lst increment mb-2" >
                    <input type="file" name="filenames[]" class="myfrm form-control">              
                    <div class="input-group-btn">              
                    </div>
                </div>
                <div class="input-group hdtuto control-group lst increment" >
                    <input type="file" name="filenames[]" class="myfrm form-control">              
                    <div class="input-group-btn">              
                    </div>
                </div>  
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

</div>


@endsection


