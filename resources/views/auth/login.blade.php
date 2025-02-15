@extends('layouts.master2')
@section('title')
@stop

@section('css')
    <!-- CSS des onglets réactifs du menu latéral -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- Partie centrale (ajustée pour occuper toute la largeur) -->
            <div class="col-md-12 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Contenu du formulaire de connexion -->
                    <div class="container p-0">
                        <div class="row justify-content-center"> <!-- Centrer le formulaire -->
                            <div class="col-md-6 col-lg-6 col-xl-5 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex justify-content-center"> 
                                        <a href="{{ url('/' . $page='Home') }}">
                                            <img src="{{URL::asset('assets/img/brand/logo2.png')}}" class="sign-favicon ht-40" alt="logo">
                                        </a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28"><span>Inv</span>oice</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header text-left">  <!-- Aligner le texte à gauche -->
                                            <h2>Bienvenue</h2>
                                            <h5 class="font-weight-semibold mb-4"> Connexion</h5>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Adresse e-mail</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Mot de passe</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group row ">  <!-- Aligner la case à cocher à gauche -->
                                                    <div class="col-md-12">
                                                        <div class="form-check">                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Se souvenir de moi') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('Se connecter') }}
                                                </button>
                                            </form>

                                            <!-- Lien vers l'inscription -->
                                            <div class="mt-3">
                                                <p>Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous ici</a></p>
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
