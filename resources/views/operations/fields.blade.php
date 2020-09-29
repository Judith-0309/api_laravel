<!-- Compte Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compte_id', 'Compte Id:') !!}
    {!! Form::number('compte_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Montant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant', 'Montant:') !!}
    {!! Form::number('montant', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Operation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('date_operation', 'Date Operation:') !!}
    {!! Form::textarea('date_operation', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Operation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_operation', 'Type Operation:') !!}
    {!! Form::text('type_operation', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('operations.index') }}" class="btn btn-default">Cancel</a>
</div>
