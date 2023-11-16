@extends('Dashboards.Layouts.admin-dash-layout')
@section('title','SD Keeper | Become a Partners Requests')

@section('content')

<section class="content container p-3">

  <!-- Default box -->
  @foreach ($become_partner->sortDesc() as $add)
    
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Become a Partner Request By | {{$add->name}}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body" style="display: block;">
              <dl class="row">
                <dt class="col-sm-4">Time</dt>
                <dd class="col-sm-8">{{$add->created_at . ' GMT'}}</dd>
                <dt class="col-sm-4">phone Number</dt>
                <dd class="col-sm-8">{{$add->phone}}</dd>
                <dt class="col-sm-4">email</dt>
                <dd class="col-sm-8">{{$add->email}}</dd>
                <dt class="col-sm-4">Message</dt>
                <dd class="col-sm-8">{{$add->msg}}</dd>
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