@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <card-detail-component title="{{$idea->title}}" description="{{$idea->description}}" likes="{{$idea->likes}}" ></card-detail-component>
    </div>
</div>
@endsection