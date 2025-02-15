@extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
					<div>
					<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Bienvenue dans votre espace de gestion !</h2>
					<p class="mg-b-0">Tableau de bord de gestion de factures</p>
</div>

					</div>
					<div class="main-dashboard-header-right">
						<div>
						<label class="tx-13">Évaluations des Clients</label>
						<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						
					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
      @php
    $userId = auth()->id(); // ID de l'utilisateur connecté

    // Nombre de clients créés par l'utilisateur connecté
    $totalClients = DB::table('clients')->where('user_id', $userId)->count();

    // Nombre de produits associés aux clients de l'utilisateur connecté
    $totalProducts = DB::table('produits')
    ->where('user_id', $userId)
    ->count();


    $totalInvoices = DB::table('factures')
        ->whereIn('client_id', function ($query) use ($userId) {
            $query->select('id')
                ->from('clients')
                ->where('user_id', $userId);
        })->count();
@endphp

<div class="row row-sm">
    <!-- Clients -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">Nombre de Clients</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $totalClients }}</h4>
                            <p class="mb-0 tx-12 text-white op-7">Nombre total de clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-danger-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">Nombre de Produits</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $totalProducts }}</h4>
                            <p class="mb-0 tx-12 text-white op-7">Total produits disponibles</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoices -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-success-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">Nombre de Factures</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $totalInvoices }}</h4>
                            <p class="mb-0 tx-12 text-white op-7">Factures totales générées</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

				<!-- row closed -->

		
		</div>
		<!-- Container closed -->
@endsection
@section('js')


<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>	
@endsection