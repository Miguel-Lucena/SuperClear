@extends('layouts.app')


@section('content')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('/img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contactanos</h1>
            <span class="subheading">¿Alguna Pregunta?</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
          ¿Quieres obtener alguna información? Escribela y nuestro asistente virtual te contestara.</p>
      </div>
  <!--Chatbot-->
      <div class="col-lg-8 col-md-10 mx-auto">
        <iframe
        allow="microphone;"
        width="700"
        height="500"
        src="https://console.dialogflow.com/api-client/demo/embedded/309002f7-552b-40f9-bf73-ba786cd33b04">
        </iframe>
      </div>
    </div>  
  </div>
  <hr>
  @endsection
