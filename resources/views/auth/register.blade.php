@extends('layouts.master2')

@section('title', 'Inscription')

@section('css')
    <!-- CSS des onglets réactifs du menu latéral -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- Partie formulaire d'inscription -->
            <div class="col-md-12 col-lg-12 col-xl-12 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Contenu du formulaire d'inscription -->
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
                                        <div class="main-signup-header text-left"> <!-- Aligner le texte à gauche -->
                                            <h2>Bienvenue</h2>
                                            <h5 class="font-weight-semibold mb-4"> Inscription</h5>
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <label>Nom complet</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Adresse e-mail</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Mot de passe</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Confirmer le mot de passe</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>

                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('S\'inscrire') }}
                                                </button>
                                            </form>

                                            <!-- Lien vers la connexion -->
                                            <div class="mt-3">
                                                <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous ici</a></p>
                                            </div>
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