@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
  	<div class="col-md-12">
  		<div class="card">
      	<div class="card-header">
      		<a href="{{route('administracao')}}" class="btn btn-primary float-right">
      			Ver Gestão de Números
      		</a>
      	</div>
      	<div class="card-body">
      		<div class="col-md-2 float-left">
      			<div class="card card-dashboard">
	      			<div class="card-body">
	      				<p class="card-title">Imóveis Disponíveis</p>
	      				<p class="card-text">{{ $availableNumber }}</p>
	      			</div>
      			</div>
      			<div class="card card-dashboard">
	      			<div class="card-body">
	      				<p class="card-title">Imóveis Vendidos</p>
	      				<p class="card-text">{{ $soldNumber }}</p>
	      			</div>
      			</div>
      			<div class="card card-dashboard">
	      			<div class="card-body">
	      				<p class="card-title">Imóveis Alugados</p>
	      				<p class="card-text">{{ $rentedNumber }}</p>
	      			</div>
      			</div>	
      		</div>
      		<div class="col-md-6">
	      		<div class="item">  
	      		  <?php $item = $items[array_rand($items)]; ?>
				      <h2><a href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a></h2>
				      <p>{{ $item->get_content() }}</p>
				      <p><small>Postado em {{ $item->get_date('j/m/Y | H:i') }}</small></p>
					  </div>	
      		</div>
      	</div>
      	<div class="card-footer dashboard-footer">
      		<div class="hour float-left">{{ date('H:i') }}</div>
      		<div class="vl float-left"></div>
      		<div class="weather float-left"></div>
      		<div class="app-name float-right">{{ config('app.name', '') }}</div>
      	</div>
    	</div>
  	</div>
  </div>
</div>

<script>
  var weatherInformation = function(data) {
    var weather = data.query.results.channel.item.condition;
    $('.weather').text("São Paulo - "+weather.temp+"º");
  };
</script>
<script src="https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20%3D%20455827%20and%20u%20%3D%20'c'&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=weatherInformation"></script>
@endsection
