@extends('Dashboards.Layouts.customer-dash-layout')
@section('title','SD Keeper | Dashboard')

@section('content')
<div class="container p-4">
<div class="row ">
    <div class="col-lg-4 col-sm-12">
      <!-- small box -->
      <div class="small-box bg-info text-center">
        <div class="inner">
          <h3>View My Place</h3>
          <p>Take a look at your profile!</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('customer.view.place')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>

    </div>
    <div class="col-lg-4 col-sm-12">
      <!-- small box -->
      <div class="small-box bg-info text-center">
        <div class="inner">
          <h3>Edit Request</h3>
          <p>Send a request to edit your profile!</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('customer.edit')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-sm-12">
      <!-- small box -->
      <div class="small-box bg-info text-center">
        <div class="inner">
          <h3>Change Password</h3>
          <p>Make sure your website is secure!</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('show.change.password')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
</div>
@endsection

