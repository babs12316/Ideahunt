@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard.... You are logged in! </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- Component to add ideas -->
                    <addidea-component></addidea-component>

                    <!-- pass ides array from received from database to card component -->
                    <cards-component ideas=" {{  json_encode($ideas)  }} "></cards-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection