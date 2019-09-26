@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome  {{ Auth::user()->name }}!</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                  <!-- myideas=1 To understand if user is looking for its own ideas so that edit and delete button can be added in card view-->
     <cards-component ideas=" {{  json_encode($myIdeas)  }} "  likestatus="{{json_encode($likestatus) }}">  ismyidea="1" ></cards-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection