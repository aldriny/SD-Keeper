@extends('Dashboards.Layouts.customer-dash-layout')
@section('title','SD Keeper | View My Place')

@section('content')
@if (session()->get('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif
<div class="col-6 mx-auto">
    <div class="card card-primary">
      <div class="card-header">
        <h4 class="card-title">{{$myPlace->name}}</h4>
      </div>
      <div class="card-body text-center">
                <div class="row">
                  <div class="col-12">
                    <div class="bd-example container mb-3" id="place_images_slide" style="">
                      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel"> 
                          <ol class="carousel-indicators">
                              @php $filenames = json_decode($myPlace->filenames); @endphp
                              @foreach ($filenames as $value)
                          <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                              @endforeach
                          </ol>
                          <div class="carousel-inner">
                              @foreach( $filenames as $value )
                              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                  <img src="{{ url('files/' . $value) }}" class="d-block w-100" alt="..." height="300" width="350">
                                  <div class="carousel-caption d-none d-md-block">
                                  </div>
                              </div>
                              @endforeach
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                          </a>
                      </div>
                    </div>
                    <p class="lead text-blue text-bold">Your {{$myPlace->type}} is {{$myPlace->safety}} right now</p>

                    <p class="lead text-black text-bold">Business type <br><span class="text-blue">{{$myPlace->type}}</span></p>
                    <p class="lead text-black text-bold">Total area <br><span class="text-blue">{{$myPlace->area . ' m2'}}</span></p>
                    <p class="lead text-black text-bold">Email <br><span class="text-blue">{{$myPlace->email}}</span></p>

                    <p class="lead text-black text-bold">Joined at <br><span class="text-blue">{{$myPlace->created_at . ' GMT'}}</span></p>
                    
                    <a class="btn-primary btn lead text-bold w-50" id="place_dir" target="_blank" href="{{'https://www.google.com/maps/place/' . $myPlace->lat . ', ' . $myPlace->long}}">Show Location</a>
                    <br>  
                    <a class="btn-primary btn lead text-bold mt-2 w-50" href="{{route('customer.edit')}}">Edit Request</a>
                </div>

              </div>


                
      
                

{{--                 @php $filenames = json_decode($myPlace->filenames); @endphp
                @foreach ($filenames as $singlefilename)
                <div class="mr-2">
                  <a href="{{ url('files/' . $singlefilename)}}">
                    <img src="{{ url('files/' . $singlefilename) }}" width="200px" height="200px">  
                  </a>    
                </div>
                @endforeach --}}


              </dl>
      </div>
    </div>
</div>



{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @foreach ($myPlace as $place)
            @php $filenames = json_decode($myPlace->filenames); @endphp
            @foreach ($filenames as $singlefilename)    
              <img src="{{ url('files/' . $singlefilename) }}" width="50px" height="50px">
            @endforeach
            
            @endforeach
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
 --}}
{{-- @foreach ($places as $place)
@php $filenames = json_decode($place->filenames); @endphp
@foreach ($filenames as $singlefilename)    
  <img src="{{ url('files/' . $singlefilename) }}" width="50px" height="50px">
@endforeach

@endforeach
 --}}

@endsection