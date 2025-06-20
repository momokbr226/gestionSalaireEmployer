@extends('layouts.template')

@section('content')
<h1 class="app-page-title">Dashboard</h1>

<div class="row mt-2 mb-2">
	@if ($paymentNotification)
	<div class="alert alert-warning">{{ $paymentNotification }}</div>
	@endif
</div>
<!-- Pour afficher les statistique des departements -->
<div class="row g-4 mb-4">
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1">Total Departements</h4>
				<div class="stats-figure">{{ $totalDepartements }}</div>
			</div><!--//app-card-body-->
			<a class="app-card-link-mask" href="{{ route('departement.index') }}"></a>
		</div><!--//app-card-->
	</div><!--//col-->

	<!-- Pour afficher les statistique des employers -->
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1">Total Utilisateurs</h4>
					<div class="stats-figure">{{ $totalEmployers }}
			</div>
		</div><!--//app-card-body-->
		<a class="app-card-link-mask" href="{{ route('employer.index') }}"></a>
	</div><!--//app-card-->
</div><!--//col-->

<!-- Pour afficher les statistique des administrateurs -->
<div class="col-6 col-lg-3">
	<div class="app-card app-card-stat shadow-sm h-100">
		<div class="app-card-body p-3 p-lg-4">
			<h4 class="stats-type mb-1">Total Administrateur</h4>
			<div class="stats-figure">{{$totalAdministrateurs}}</div>
		</div><!--//app-card-body-->
		<a class="app-card-link-mask" href="{{ route('administrateurs') }}"></a>
	</div><!--//app-card-->
</div><!--//col-->

<!-- Pour afficher les statistique de paiement -->
<div class="col-6 col-lg-3">
	<div class="app-card app-card-stat shadow-sm h-100">
		<div class="app-card-body p-3 p-lg-4">
			<h4 class="stats-type mb-1">Retard de paiement</h4>
			<div class="stats-figure">0</div>

		</div><!--//app-card-body-->
		<a class="app-card-link-mask" href="{{ route('payments') }}"></a>
	</div><!--//app-card-->
</div><!--//col-->
</div><!--//row-->
<!--//col-->

</div><!--//container-fluid-->
</div><!--//app-content-->

@endsection