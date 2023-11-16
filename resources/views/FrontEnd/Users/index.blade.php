

@extends('FrontEnd.Layouts.user-layout')
@section('title','SD Keeper')

@section('content')
<input type="hidden" name="userLong">
  <input type="hidden" name="userLat">
  <input type="hidden" name="userAcc">
<div class="container-fluid p-5 mt-5">
    <h2 class="text-center mb-3 text-orange">Search for safe places near you!</h2>
    <div class="row">
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
</div>



<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h2 class="display-4">Categories</h2>
    <p class="lead">Search our categories to find safe places near you!</p>
</div>

<div class="container ">
<div class="card-deck mb-3 text-center ">
    <div class="card mb-4 bg-transparent">
    <div class="card bg-transparent">
        <a href="{{route('user.show.places',['type' => 'Restaurant'])}}">
        <img class="card-img-top" src="{{ url('files/restaurant-logo.jpeg' ) }}" alt="Card image cap">
        <div class="card-body card-bg-color">
            <h5 class="card-title">
                <p class="text-white">Restaurants</p>
            </h5>
        </div>
        </a>
        </div>
    </div>
    <div class="card mb-4 bg-transparent">
    <div class="card bg-transparent">
        <a href="{{route('user.show.places',['type' => 'Mall'])}}">
        <img class="card-img-top" src="{{ url('files/malls-logo.jpg' ) }}" alt="Card image cap">
        <div class="card-body card-bg-color">
            <h5 class="card-title">
                <p class="text-white">Malls</p>
            </h5>
        </div>
        </a>
        </div>
    </div>
    <div class="card mb-4 bg-transparent">
    <div class="card bg-transparent">
        <a href="{{route('user.show.places',['type' => 'Hospital'])}}">
        <img class="card-img-top" src="{{ url('files/hospitals-logo.jpg' ) }}" alt="Card image cap">
        <div class="card-body card-bg-color">
            <h5 class="card-title">
                <p class="text-white">Hospitals</p>
            </h5>
        </div>
        </a>
        </div>
    </div>
</div>
</div>
<div class="container">
    <div class="card-deck mb-3 text-center ">
        <div class="card mb-4 bg-transparent">
        <div class="card bg-transparent">
            <a href="{{route('user.show.places',['type' => 'Store'])}}">
            <img class="card-img-top" src="{{ url('files/stores-logo.jpeg' ) }}" alt="Card image cap">
            <div class="card-body card-bg-color">
                <h5 class="card-title">
                    <p class="text-white">Stores</p>
                </h5>
            </div>
            </a>
            </div>
        </div>
        <div class="card mb-4 bg-transparent">
        <div class="card bg-transparent">
            <a href="{{route('user.show.places',['type' => 'Café'])}}">
            <img class="card-img-top" src="{{ url('files/cafes-logo.jpg' ) }}" alt="Card image cap">
            <div class="card-body card-bg-color">
                <h5 class="card-title">
                    <p class="text-white">Cafés</p>
                </h5>
            </div>
            </a>
        </div>
        </div>
        <div class="card mb-4 bg-transparent">
        <div class="card bg-transparent">
            <a href="{{route('user.show.places',['type' => 'Company'])}}">
            <img class="card-img-top" src="{{ url('files/companies-logo.jpg' ) }}" alt="Card image cap">
            <div class="card-body card-bg-color">
                <h5 class="card-title">
                    <p class="text-white">Companies</p>
                </h5>
            </div>
            </div>
        </a>
        </div> 
    </div>
</div>

<hr class="mt-5 mb-5">

<div class="container pricing-header px-3 py-3 mx-auto">
    <h2 class="">COVID-19 <span class="text-orange"> FAQs</span></h2>
</div>

<div id="accordion" class="container">
    <div class="card bg-transparent border-left">
      <div class="card-header bg-orange" id="headingOne">
        <h5 class="mb-0 ">
          <button class="btn btn-link text-white text-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            What is COVID-19?
          </button>
        </h5>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <p>COVID-19 is the disease caused by a new coronavirus called SARS-CoV-2. &nbsp;WHO first learned of this new virus on 31 December 2019, following a report of a cluster of cases of &lsquo;viral pneumonia&rsquo; in Wuhan, People&rsquo;s Republic of China.</p>
        </div>
      </div>
    </div>
    <div class="card bg-transparent border-left">
      <div class="card-header bg-orange" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed text-white text-bold" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            What are the symptoms of COVID-19?
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <p>The most common symptoms of COVID-19 are</p><ul><li>Fever</li><li>Dry cough</li><li>Fatigue</li></ul><p>Other symptoms that are less common and may affect some patients include:</p><ul><li>Loss of taste or smell,</li><li>Nasal congestion,</li><li>Conjunctivitis (also known as red eyes)</li><li>Sore throat,</li><li>Headache,</li><li>Muscle or joint pain,</li><li>Different types of skin rash,</li><li>Nausea or vomiting,</li><li>Diarrhea,</li><li>Chills or dizziness.</li></ul><p>&nbsp;</p><p>Symptoms of severe COVID‐19 disease include:</p><ul><li>Shortness of breath,</li><li>Loss of appetite,</li><li>Confusion,</li><li>Persistent pain or pressure in the chest,</li><li>High temperature (above 38 &deg;C).</li></ul><p>Other less common symptoms are:</p><ul><li>Irritability,</li><li>Confusion,</li><li>Reduced consciousness (sometimes associated with seizures),</li><li>Anxiety,</li><li>Depression,</li><li>Sleep disorders,</li><li>More severe and rare neurological complications such as strokes, brain inflammation, delirium and nerve damage.</li></ul><p>People of all ages who experience fever and/or cough associated with difficulty breathing or shortness of breath, chest pain or pressure, or loss of speech or movement should seek medical care immediately. If possible, call your health care provider,
                hotline or health facility first, so you can be directed to the right clinic.</p>
            </p>                
        </div>
      </div>
    </div>
    <div class="card bg-transparent border-left">
      <div class="card-header bg-orange" id="headingThree">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed text-white text-bold" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Who is most at risk of severe illness from COVID-19?
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
            <p>People aged 60 years and over, and those with underlying medical problems like high blood pressure, heart and lung problems, diabetes, obesity or cancer, are at higher risk of developing serious illness.&nbsp;</p><p>However, anyone can get sick with COVID-19 and become seriously ill or die at any age.&nbsp;</p>
        </div>
      </div>
    </div>



    <div class="card bg-transparent border-left">
        <div class="card-header bg-orange" id="headingFour">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed text-white text-bold" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                What happens to people who get COVID-19?
            </button>
          </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body">
            <p>Among those who develop symptoms, most (about 80%) recover from the disease without needing hospital treatment. About 15% become seriously ill and require oxygen and 5% become critically ill and need intensive care. </p><p>Complications leading to death may include respiratory failure, acute respiratory distress syndrome (ARDS), sepsis and septic shock, thromboembolism, and/or multiorgan failure, including injury of the heart, liver or kidneys. </p><p>In rare situations, children can develop a severe inflammatory syndrome a few weeks after infection.&nbsp;</p><p></p>
          </div>
        </div>
      </div>





    <div class="card bg-transparent border-left">
      <div class="card-header bg-orange" id="headingFive">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed text-white text-bold" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            How can we protect others and ourselves if we don&#39;t know who is infected?
          </button>
        </h5>
      </div>
      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
        <div class="card-body">
            <p><span style="background-color:transparent;text-align:inherit;text-transform:inherit;white-space:inherit;word-spacing:normal;caret-color:auto;">Stay safe by taking some simple precautions, such as physical distancing, wearing a mask, especially when distancing cannot be maintained, keeping rooms well ventilated, avoiding crowds and close contact, regularly cleaning your hands, and coughing into a bent elbow or tissue. Check local advice where you live and work. </span><strong style="background-color:transparent;text-align:inherit;text-transform:inherit;white-space:inherit;word-spacing:normal;caret-color:auto;">Do it all!</strong></p>
        </div>
      </div>
    </div>
    <div class="text-center mt-5" >
        <p class="lead">Did you get COVID-19 vaccine? <a target= "_blank" href="https://egcovac.mohp.gov.eg/#/home" class="text-orange">Apply Now</a></p>
    </div>
  </div>


  <hr class="mt-5 mb-5">


</div>
  


  

<div class="card bg-transparent" id="become-parnter-form">
    <div class="card-body row">
      <div class="col-md-5 col-sm-12 text-center d-flex align-items-center justify-content-center">
        <div class="">
          <h2 class="display-4"><strong class="text-orange">SD</strong>Keeper</h2>
          <p class="lead mb-5">Contact Us | Become a <strong class="text-orange">Partner</strong><br>
          </p>
        </div>
      </div>

      <div class="col-md-7 col-sm-12">
        <form method="POST" action="{{ route('become.partner') }}">
          @if (session()->get('success'))
          <div class="alert alert-success">{{session()->get('success')}}</div>
      @endif
      @csrf
      <div class="form-group mb-0">
          <label for="inputName">Name</label>
          <input type="text" id="inputName" name="name" class="form-control bg-transparent" value={{old('name')}}>
      </div>
      <span class="text-danger">
          @error('name'){{$message}}@enderror
      </span>
      <div class="form-group mb-0 mt-3">
          <label for="inputEmail">E-Mail</label>
          <input type="email" id="inputEmail" name="email" class="form-control bg-transparent" value={{old('email')}}>
      </div>
      <span class="text-danger">
          @error('email'){{$message}}@enderror
      </span>
      <div class="form-group mb-0 mt-3">
          <label for="inputSubject">Phone Number</label>
          <input type="text" id="inputSubject" name="phone" class="form-control bg-transparent" value={{old('phone')}}>
      </div>
      <span class="text-danger">
          @error('phone'){{$message}}@enderror
      </span>
      <div class="form-group mb-0 mt-3">
          <label for="inputMessage" >Message</label>
          <textarea id="inputMessage" name="msg" class="form-control  bg-transparent" rows="4" value={{old('msg')}}></textarea>
      </div>
      <span class="text-danger">
          @error('msg'){{$message}}@enderror
      </span>
      <div class="form-group text-center mb-0 mt-3">
      <button type="submit" class="btn text-white" style="background: #fd7e14 !important;" value="Send message">Send Message</button>
      </div>
        </form>
      </div>
    </div>
  </div>



  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h2 class="mb-5">About<span class="text-orange"> Us</span></h2>
    <p class="lead mb-5 container">We present this project as a steppingstone to spread
      awareness regarding social distance and public health, to help fight
      off the covid-19 pandemic, as we built a complete system where we
      deliver the user all the information they need to stay safe, by
      connecting the vendors with the required components to read social
      distancing data, and evaluate the readings to recommend the safest
      nearest place to the user.</p>
</div>
<hr>
<div id="partners-div">

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h2 class="">Our <span class="text-orange"> Partners</span></h2>
        <p class="lead">Here's a list of our partners!</p>
    </div>




    <div class="container" id="partners">
                <div class="row">
                    <div class="col-xl col-md-3 col-sm-6 col-sm-12">
                        <img class="rounded-circle" src="{{ url('files/Hyundai-logo.png' ) }}" alt="partner1" width="140px" height="100px">
                    </div>
                    <div class="col-xl col-md-3 col-sm-6 col-sm-12">
                        <img class="rounded-circle" src="{{ url('files/Tibco-logo.png' ) }}" alt="partner1" width="140px" height="100px">
                    </div>
                    <div class="col-xl col-md-3 col-sm-6 col-sm-12">
                        <img class="rounded-circle" src="{{ url('files/AEG-logo.png' ) }}" alt="partner1" width="140px" height="100px">
                    </div> 
                    <div class="col-xl col-md-3 col-sm-6 col-sm-12">
                        <img class="rounded-circle" src="{{ url('files/Hyundai-logo.png' ) }}" alt="partner1" width="140px" height="100px">
                    </div>
                    <div class="col-xl col-md-3 col-sm-6 col-sm-12">
                        <img class="rounded-circle" src="{{ url('files/Tibco-logo.png' ) }}" alt="partner1" width="140px" height="100px">
                    </div>
                </div>
    </div>
</div>


@endsection