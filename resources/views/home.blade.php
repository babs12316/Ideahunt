@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome  {{ Auth::user()->name }}! </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- Component to add ideas -->
                    <addidea-component></addidea-component>
                    <p> test is here {{$likestatus}}</p>
                  
                   
               
                    <!-- pass ides array from received from database to card component -->
                    <cards-component ideas=" {{  json_encode($ideas)  }} "   likestatus="{{json_encode($likestatus) }}"></cards-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection