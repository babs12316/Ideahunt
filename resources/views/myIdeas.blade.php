@extends('layouts.app')

@section('content')
<div class="container">
    <div>
     <!-- myideas=1 To understand if user is looking for its own ideas so that edit and delete button can be added in card view-->
     <cards-component ideas=" {{  json_encode($myIdeas)  }} " myideas="1" ></cards-component>
    </div>
</div>
@endsection