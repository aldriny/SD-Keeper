
@extends('FrontEnd.Layouts.user-layout')
@section('title','View Place')

@section('content')

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


@if (session()->get('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif
    <div class="card card-primary bg-transparent mt-5">
      <div class="card-body mx-auto " id="view_place_card">
        <div class="text-center mb-4" id="view_place_card2">
            <h1 class="h3 mb-3 font-weight-normal  ">{{$show_place->name}}</h1>
            <div class="bd-example container mb-3" id="place_images_slide">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel"> 
                    <ol class="carousel-indicators">
                        @php $filenames = json_decode($show_place->filenames); @endphp
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
            <hr class="mt-5">

            <div class="d-flex justify-content-center">
                    <div>
                @php
                    $i = 5;
                    $stars = $rating;
                    while ($i > 0) {
                        $i--;
                        if($stars > 0){
                            $stars--;
                        @endphp
                            <span class="fa fa-star checked"></span>
                        @php
                        }else {
                            @endphp
                            <span class="fa fa-star"></span>
                            @php
                        }
                    }
                @endphp
                </div>
                <span class="ml-2">{{ $total_people }} reviews</span>
            </div>
            <hr>
            <p class="text-center mb-4 lead">{{$show_place->safety}} right now</p>
            <hr class="">
            <p class="text-center mb-4 lead">{{round($distance,2) . ' km'}} away from you.</p>
            <a class="btn-primary btn bg-transparent border-secondary" id="place_dir" target="_blank" href="{{'https://www.google.com/maps/dir//' . $show_place->lat . ', ' . $show_place->long}}">Get Directions</a> 
            @auth
            <div class="mt-4">
                <p>Your Rating</p>
            </div> 
            <form class="form-horizontal poststars" action="{{route('rating.store')}}" id="addStar" method="POST">
                @csrf
                      <div class="form-group required">
                        <div class="col-sm-12 d-flex justify-content-center mt-2">
                          <input class="star" type="radio" value="1" name="star" id="star-1" hidden>                       
                          <input class="star" type="radio" value="2" name="star" id="star-2" hidden>                       
                          <input class="star" type="radio" value="3" name="star" id="star-3" hidden>                        
                          <input class="star" type="radio" value="4" name="star" id="star-4" hidden>
                          <input class="star" type="radio" value="5" name="star" id="star-5" hidden>
                          <div>
                            @php
                                $i = 0;
                                $stars = $user_rating;
                                while ($i < 5) {
                                    $i++;
                                    if($stars > 0){
                                        $stars--;
                                    @endphp
                                    <label class="fa fa-star ml-2 checked" for="star-{{ $i }}"></label>
                                    @php
                                    }else {
                                        @endphp
                                        <label class="fa fa-star ml-2" for="star-{{ $i }}"></label>
                                        @php
                                    }
                                }
                            @endphp
                            </div>
                          <input type="hidden" value="{{ $show_place->id }}" name="place_id">
                          <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                         </div>
                      </div>
              </form>                
            @endauth
          </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $('#addStar').change('.star', function(e) {
        $(this).submit();
    });
</script>
@endsection