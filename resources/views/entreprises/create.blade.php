@extends('layouts.master2')

@section('title', 'Informations de l\'Entreprise')

@section('css')
    <!-- Inclure CSS pour le formulaire si nécessaire -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-12 col-lg-12 col-xl-12 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="{{ url('/' . $page='Home') }}">
                                        <img src="{{URL::asset('assets/img/brand/logo2.png')}}" class="sign-favicon ht-40" alt="logo">
                                        </a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28"><span>Inv</span>oice</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header text-left">
                                            <h2>Informations de l'Entreprise</h2>
                                            <form method="POST" action="{{ route('entreprises.store') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <label>Nom de l'entreprise</label>
                                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" required>
                                                    @error('nom')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Adresse</label>
                                                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" required>
                                                    @error('adresse')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Code Postal</label>
                                                    <input type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" required>
                                                    @error('code_postal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Ville</label>
                                                    <input type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" required>
                                                    @error('ville')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Pays</label>
                                                    <input type="text" class="form-control @error('pays') is-invalid @enderror" name="pays" required>
                                                    @error('pays')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Numéro de téléphone</label>
                                                    <input type="text" class="form-control @error('numero_telephone') is-invalid @enderror" name="numero_telephone" required>
                                                    @error('numero_telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Site Web</label>
                                                    <input type="url" class="form-control @error('site_web') is-invalid @enderror" name="site_web">
                                                    @error('site_web')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-main-primary btn-block">Enregistrer l'Entreprise</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Fin -->
                </div>
            </div><!-- Fin -->
        </div>
    </div>
@endsection

@section('js')
@endsection
