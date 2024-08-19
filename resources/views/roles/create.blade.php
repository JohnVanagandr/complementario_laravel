@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-md-flex justify-content-md-end">

                    </div>

                    <div class="card-body">

                        {{ html()->form()->route('roles.store')->open() }}

                        @include('roles.partials.form')

                        <button type="submit" class="btn btn-outline-dark">Guardar</button>

                        {{ html()->form()->close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
