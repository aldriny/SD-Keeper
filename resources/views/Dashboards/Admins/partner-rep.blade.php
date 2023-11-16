@extends('Dashboards.Layouts.admin-dash-layout')
@section('title','SD Keeper | Partners Reports')

@section('content')

<section class="content container p-3">

    <!-- Default box -->
    @foreach ($edits->sortDesc() as $edit)
      
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Request By | {{$edit->name}}</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body" style="display: block;">
                <dl class="row">
                  <dt class="col-sm-4">Time</dt>
                  <dd class="col-sm-8">{{$edit->created_at . ' GMT'}}</dd>
                  <dt class="col-sm-4">Area</dt>
                  <dd class="col-sm-8">{{$edit->area}}</dd>
                  <dt class="col-sm-4">Phone Number</dt>
                  <dd class="col-sm-8">{{$edit->phone_number}}</dd>
                  <dt class="col-sm-4">email</dt>
                  <dd class="col-sm-8">{{$edit->email}}</dd>
                  <dt class="col-sm-4">Latitude</dt>
                  <dd class="col-sm-8">{{$edit->lat}}</dd>
                  <dt class="col-sm-4">Longitude</dt>
                  <dd class="col-sm-8">{{$edit->long}}</dd>
                  <dt class="col-sm-4">Type</dt>
                  <dd class="col-sm-8">{{$edit->type}}</dd>
                  <dt class="col-sm-4">Pictures</dt>
                  @php $filenames = json_decode($edit->filenames); @endphp
                  @foreach ($filenames as $singlefilename)
                  <div class="mr-2">
                    <a href="{{ url('files/' . $singlefilename)}}">
                      <img src="{{ url('files/' . $singlefilename) }}" width="200px" height="200px">  
                    </a>    
                  </div>
                  @endforeach                  
                </dl>
              <!-- /.card-body -->
            <!-- /.card -->
        </div>
      <!-- /.card-body -->

      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @endforeach

  </section>


{{--   @foreach ($partners as $partner)
  <tr>
      <td>{{$partner['name']}}</td>
      <td>{{$partner['long']}}</td>
      <td>{{$partner['lat']}}</td>
      <td>{{$partner['type']}}</td>
      <td><a href="">Reviews</a></td>
      <td><a href="{{route('admin.show.place', [$partner->id])}}">Edit</a></td>
      <td><a href="{{route('admin.delete.place', [$->id])}}">Delete</a></td>
  </tr>
@endforeach   --}}




@endsection