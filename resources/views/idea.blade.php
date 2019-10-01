@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <card-detail-component id="{{$idea->id}}" title="{{$idea->title}}" description="{{$idea->description}}" likes="{{$idea->likes}}" likestatus="{{json_encode($likestatus) }}"   ></card-detail-component>
    </div>
</div>
@endsection