@extends('layouts.app')

@section('content')
<div class="container">
  <div>
    <editidea-component editidea=" {{  json_encode($myidea)  }} "> </editidea-component>
  </div>
</div>
@endsection