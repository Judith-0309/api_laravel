<!-- Type Compte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_compte', 'Type Compte:') !!}
    {!! Form::text('type_compte', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Compte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_compte', 'Numero Compte:') !!}
    {!! Form::text('numero_compte', null, ['class' => 'form-control']) !!}
</div>

<!-- Cle Rib Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cle_rib', 'Cle Rib:') !!}
    {!! Form::text('cle_rib', null, ['class' => 'form-control']) !!}
</div>

<!-- Etat Compte Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('etat_compte', 'Etat Compte:') !!}
    {!! Form::textarea('etat_compte', null, ['class' => 'form-control']) !!}
</div>

<!-- Depot Initial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depot_initial', 'Depot Initial:') !!}
    {!! Form::number('depot_initial', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Ouverture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_ouverture', 'Date Ouverture:') !!}
    {!! Form::text('date_ouverture', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('comptes.index') }}" class="btn btn-default">Cancel</a>
</div>
