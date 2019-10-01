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
                 
                  
                   
               
                    <!-- pass ides array from received from database to cards component -->
                    <cards-component ideas=" {{  json_encode($ideas)  }} "  myideas="{{json_encode($myideas)}}"  likestatus="{{json_encode($likestatus) }}" ismyidea="0"></cards-component>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection