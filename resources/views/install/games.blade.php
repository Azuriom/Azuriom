@extends('install.layout')

@section('content')
    <div id="gameSelect" class="text-center">
        <div class="text-left">
            <a href="{{ route('install.database') }}" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left"></i> {{ trans('install.back') }}
            </a>
        </div>

        <h2 class="mb-3">{{ trans('install.game.title') }}</h2>

        <div class="row justify-content-center mb-3">
            <div class="col-md-3">
                <a href="{{ route('install.game', 'minecraft') }}">
                    <img src="https://azuriom.com/install/assets/v0.2.4/img/minecraft.png" alt="Minecraft" class="img-fluid mb-1">

                    <p>Minecraft</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('install.game', 'gmod') }}">
                    <img src="https://azuriom.com/install/assets/v0.2.4/img/gmod.svg" alt="Garry's mod" class="img-fluid rounded mb-1">

                    <p>Garry's mod</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('install.game', 'rust') }}">
                    <img src="https://azuriom.com/install/assets/v0.2.4/img/rust.svg" alt="Rust" class="img-fluid rounded mb-1">

                    <p>Rust</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('install.game', 'ark') }}">
                    <img src="https://azuriom.com/install/assets/v0.2.4/img/ark.png" alt="ARK: Survival Evolved" class="img-fluid mb-1">

                    <p>ARK: Survival Evolved</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('install.game', 'fivem') }}">
                    <img src="https://azuriom.com/install/assets/v0.2.4/img/fivem.svg" alt="FiveM" class="img-fluid rounded mb-1">

                    <p>FiveM</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('install.game', 'csgo') }}">
                    <img src="https://azuriom.com/install/assets/v0.2.4/img/csgo.png" alt="CS:GO" class="img-fluid rounded mb-1">

                    <p>CS:GO</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('install.game', 'tf2') }}">
                    <img src="https://azuriom.com/install/assets/v0.2.4/img/tf2.svg" alt="Team Fortress 2" class="img-fluid mb-1">

                    <p>Team Fortress 2</p>
                </a>
            </div>
        </div>

        <p class="text-danger font-weight-bold mb-0">
            {{ trans('install.game.warn') }}
        </p>
    </div>
@endsection
