@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Essai
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($essai, ['route' => ['essais.update', $essai->id], 'method' => 'patch']) !!}

                        @include('essais.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection