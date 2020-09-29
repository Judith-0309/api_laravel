@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Particulier
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientParticulier, ['route' => ['clientParticuliers.update', $clientParticulier->id], 'method' => 'patch']) !!}

                        @include('client_particuliers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection