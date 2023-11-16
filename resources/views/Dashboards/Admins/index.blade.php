

@extends('Dashboards.Layouts.admin-dash-layout')
@section('title','SD Keeper | Dashboard')

@section('content')
<div class="container p-4">
<div class="row ">
    <div class="col-lg-4 col-sm-12">
      <!-- small box -->
      <div class="small-box bg-info text-center">
        <div class="inner">
          <h3>Add a Partner</h3>
          <p>Add a new partner to the website!</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('admin.add.place')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <!-- small box -->
        <div class="small-box bg-info text-center">
          <div class="inner">
            <h3>View Partners</h3>
            <p>Show all the partners on the website!</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('admin.view.places')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-12">
        <!-- small box -->
        <div class="small-box bg-info text-center">
          <div class="inner">
            <h3>New Requests</h3>
            <p>Show requests from new possible partners!</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('admin.partner.req')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-12">
        <!-- small box -->
        <div class="small-box bg-info text-center">
          <div class="inner">
            <h3>Edit Requests</h3>
            <p>Show help requests from partners!</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('admin.partner.rep')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    
    <!-- ./col -->
  </div>
</div>
@endsection