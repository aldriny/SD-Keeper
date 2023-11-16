
@extends('FrontEnd.Layouts.user-layout')
@section('title','Profile')

@section('content')

    <div class="mt-5 text-black-50">

          <!-- Profile Image -->
          <div class="card card-outline bg-transparent">
            <div class="card-body box-profile mx-auto bg-white p-5 mb-5" id="profile_body">
              <div class="text-center">
                    <a href="{{url('files/' . auth()->user()->image)}}">
                        <img class="profile-user-img img-fluid img-circle" style="width: 150px; height:150px" src="{{url('files/' . auth()->user()->image)}}" alt="User profile picture">
                    </a>
              </div>

              <h3 class="profile-username text-center mt-3 mb-4">{{auth()->user()->name}}</h3>
              <hr style="border: solid .5px #fd7e14">

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item mb-2">
                    <strong><i class="fas fa-map-marker-alt mr-1 text-orange"></i> Location</strong>
                    <p class="text-muted mb-0">{{auth()->user()->country}}</p>
                </li>
                <li class="list-group-item mb-2">
                    <strong><i class="fa-solid fa-cake-candles text-orange"></i> Birthday</strong>
                    <p class="text-muted mb-0">{{auth()->user()->birth_date}}</p>
                </li>
                <li class="list-group-item mb-2">
                    <strong><i class="fa-solid fa-envelope text-orange"></i> Email</strong>
                    <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                </li>

                <li class="list-group-item mb-2">
                  <strong><i class="fa fa-cog text-orange"></i><a href="{{route('profile.settings')}}" style="color: inherit"> Settings </a> </strong>
              </li>
              <li class="list-group-item  border-bottom-0">
                <strong><i class="fa fa-lock text-orange"></i><a href="{{route('user.change.password1')}}" style="color: inherit"> Change Password </a> </strong>
              </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>

@endsection