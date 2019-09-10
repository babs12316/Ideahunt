@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">I am idea</div>
                 <div class="card-body">
                    <h2>Title is </h2>
                   {{$idea->title}}
                   <h2>Description is</h2>
                   {{$idea->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection