
@extends('FrontEnd.Layouts.user-layout')
@section('title','Malls')

@section('content')


<div class="container p-2 mt-3">
    <div class="row mb-5">
        <div class="col-md-8 offset-md-2">
            <form action="{{route('user.search')}}">
                <div class="input-group">
                    <input type="search" name="search" class="form-control form-control-lg" placeholder="Search for safe places near you!">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card  bg-transparent">
            <!-- /.card-header -->
            <div class="card-body p-0 bg-transparent col show_card" style="height: 500px;" >
            <table class="table text-nowrap transparent ">
                <thead class="text-orange">
                <tr class="">
                    <th>Name</th>
                    <th>Location</th>
                    <th>Distance</th>
                    <th>Safety</th>

                </tr>
                </thead>
                <tbody class="search-body">
                @foreach ($places as $place)
                    <tr>
                        <td>
                            <a href="{{route('user.show.place', [$place->id, $place->distance])}}">{{$place->name}}</a>
                        </td>
                        <td>
                            <a target="_blank" href="{{'https://www.google.com/maps/dir//' . $place->lat . ', ' . $place->long}}">Get directions</a>  
                          </td>
  
                          <td>{{round($place->distance,2) . ' km'}}</td>
                          <td>{{ $place->safety }}</td>

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