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
                   
                     @foreach($ideas as $row)
                <tr>
                    <td>{{$row->title}}</td>
                </tr> 
                @endforeach
               
              <addidea-component></addidea-component>
             
        <cards-component title="{{ 'i am title' }}" ideas="{{ $ideas }}"></cards-component>
                     </div>
            </div>
        </div>
    </div>
</div>
@endsection
