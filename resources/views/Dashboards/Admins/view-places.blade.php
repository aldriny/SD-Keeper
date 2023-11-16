@extends('Dashboards.Layouts.admin-dash-layout')
@section('title','SD Keeper | View Partners')

@section('content')

@if (session()->get('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<div class="container p-2">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header text-white  bg-primary">
            <h3 class="card-title">Partners</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
                </div>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 table-responsive" style="height: 500px;" >
            <table class="table text-nowrap table-head-fixed">
                <thead>
                <tr class="">
                    <th>Name</th>
                    <th>Location</th>
                    <th>Business Type</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($places as $place)
                    <tr>
                        <td>{{$place['name']}}</td>
                        <td>
                          <a target="_blank" href="{{'https://www.google.com/maps/place/' . $place->lat . ', ' . $place->long}}">View on Map</a>  
                        </td>
                        <td>{{$place['type']}}</td>
                        <td><a href="{{route('admin.show.place', [$place->id])}}">Edit</a></td>
                        <td><a href="{{route('admin.delete.place', [$place->id])}}">Delete</a></td>
                    </tr>
                @endforeach  
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div>
</div>









@endsection

