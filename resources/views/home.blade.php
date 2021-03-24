@extends('layouts.base')

@section('titulo', 'Home')

@section('head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">


<link rel="stylesheet" href=" {{ asset('Calendar/fonts/icomoon/style.css') }}">

<link href="{{ asset('Calendar/fullcalendar/packages/core/main.css') }}" rel='stylesheet' />
<link href="{{ asset('Calendar/fullcalendar/packages/daygrid/main.css') }}" rel='stylesheet' />


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('Calendar/css/bootstrap.min.css') }}">

<!-- Style -->
<link rel="stylesheet" href="{{ asset('Calendar/css/style.css') }}">
@endsection

@section('conteudo')
<div class="row">
	<div class="col-md-6">
		<div class="card shadow mt-4 h-50">
			<div class="card-body">
				<header class="w3-container w3-grey">
					<h3> Eventos Conflitantes: </h3>
				</header>
				<ul>
					<li> Dia 24/03
						<ul>
							<li> Contraturno de Programação WEB </li>
							<li> Horário de fazer atividade </li>
						</ul>
					</li>
					<li> Dia 25/03
						<ul>
							<li> Aula de Espanhol </li>
							<li> Horário para fazer atividade </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="card shadow mt-2 h-50">
			<div class="card-body">
				<header class="w3-container w3-grey">
					<h3> Eventos de Hoje:</h3>
				</header>
				<ul>
					<li> Aula de Projeto de Software </li>
					<li> Entregar telas do projeto </li>
					<li> Aula de contraturno de Programação WEB </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card shadow mt-4 h-100">
			<div class="card-body">
						<div id='calendar'></div>

					<script src="{{ asset('Calendar/js/jquery-3.3.1.min.js') }}"></script>
					<script src="{{ asset('Calendar/js/popper.min.js') }}"></script>
					<script src="{{ asset('Calendar/js/bootstrap.min.js') }}"></script>

					<script src="{{ asset('Calendar/fullcalendar/packages/core/main.js') }}"></script>
					<script src="{{ asset('Calendar/fullcalendar/packages/interaction/main.js') }}"></script>
					<script src="{{ asset('Calendar/fullcalendar/packages/daygrid/main.js') }}"></script>

					<script>
						document.addEventListener('DOMContentLoaded', function() {
							var calendarEl = document.getElementById('calendar');

							var calendar = new FullCalendar.Calendar(calendarEl, {
								plugins: [ 'interaction', 'dayGrid' ],
								defaultDate: '2021-03-12',
								editable: true,
									eventLimit: true, // allow "more" link when too many events
									events: [
									{
										title: 'All Day Event',
										start: '2021-03-01'
									},
									{
										title: 'Long Event',
										start: '2021-03-07',
										end: '2021-03-10'
									},
									{
										groupId: 999,
										title: 'Repeating Event',
										start: '2021-03-09T16:00:00'
									},
									{
										groupId: 999,
										title: 'Repeating Event',
										start: '2021-03-16T16:00:00'
									},
									{
										title: 'Conference',
										start: '2021-03-11',
										end: '2021-03-13'
									},
									{
										title: 'Meeting',
										start: '2021-03-12T10:30:00',
										end: '2021-03-12T12:30:00'
									},
									{
										title: 'Lunch',
										start: '2021-03-12T12:00:00'
									},
									{
										title: 'Meeting',
										start: '2021-03-12T14:30:00'
									},
									{
										title: 'Happy Hour',
										start: '2021-03-12T17:30:00'
									},
									{
										title: 'Dinner',
										start: '2021-03-12T20:00:00'
									},
									{
										title: 'Birthday Party',
										start: '2021-03-13T07:00:00'
									},
									{
										title: 'Click for Google',
										url: 'http://google.com/',
										start: '2021-03-22'
									}
									]
								});

							calendar.render();
						});

					</script>

					<script src="{{ asset('Calendar/js/main.js') }}"></script>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mt-5">
			<div class="card-body">
				<header class="w3-container w3-grey">
					<h3>Eventos da Semana</h3>
				</header>
				<div class="row row-cols-1 row-cols-md-3 g-4">
					<div class="col mb-2">
						<div class="card h-100">
							<div class="card-body">
								<h5 class="card-title">Aula de Iuri</h5>
								<p class="card-text text-dark text-justify">O evento ocorrerá pelo Meet e se trata de uma aula que a maioria não presta atenção.</p>
							</div>
							<div class="card-footer">
								<small class="text-muted">Dia 22/03/2021 às 8:30</small>
							</div>
						</div>
					</div>
					<div class="col mb-2">
						<div class="card h-100">
							<div class="card-body">
								<h5 class="card-title">Aula de Elias</h5>
								<p class="card-text text-dark text-justify">O evento ocorrerá através do Meet e terá sorteio pra ver quem vai explicar o assunto dessa vez.</p>
							</div>
							<div class="card-footer">
								<small class="text-muted">Dia 23/03/2021 às 8:30</small>
							</div>
						</div>
					</div>
					<div class="col mb-2">
						<div class="card h-100">
							<div class="card-body">
								<h5 class="card-title">Aula de Ari</h5>
								<p class="card-text text-dark text-justify">O evento ocorrerá, novamente, pelo Meet e contará com a despedida da turma com o professor, com entrega de - alguns - trabalhos.</p>
							</div>
							<div class="card-footer">
								<small class="text-muted">Dia 24/03/2021 às 8:30</small>
							</div>
						</div>
					</div>
					<div class="col mb-2">
						<div class="card h-100">
							<div class="card-body">
								<h5 class="card-title">Aula de Romerito (contraturno)</h5>
								<p class="card-text text-dark text-justify">O evento ocorrerá pelo Meet e contará com a explicação de conteúdo e esclarecimento de dúvidas a respeito do projeto que está sendo desenvolvido.</p>
							</div>
							<div class="card-footer">
								<small class="text-muted">Dia 24/03/2021 às 14:00</small>
							</div>
						</div>
					</div>
					<div class="col mb-2">
						<div class="card h-100">
							<div class="card-body">
								<h5 class="card-title">Aula de Damião</h5>
								<p class="card-text text-dark text-justify">O evento ocorrerá pelo Meet, pela manhã, tendo - em apenas um turno - a aula normal da semana e o contraturno que deveria ter sido realizado na semana passada.</p>
							</div>
							<div class="card-footer">
								<small class="text-muted">Dia 25/03/2021 às 8:30</small>
							</div>
						</div>
					</div>
					<div class="col mb-2">
						<div class="card h-100">
							<div class="card-body">
								<h5 class="card-title">Aula de Romerito</h5>
								<p class="card-text text-dark text-justify">O evento ocorrerá pelo Meet e contará com a explicação de conteúdo e esclarecimento de dúvidas a respeito do projeto que está sendo desenvolvido.</p>
							</div>
							<div class="card-footer">
								<small class="text-muted">Dia 26/03/2021 às 8:30</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection