<!-- Compte Id Field -->
<div class="form-group">
    {!! Form::label('compte_id', 'Compte Id:') !!}
    <p>{{ $operation->compte_id }}</p>
</div>

<!-- Montant Field -->
<div class="form-group">
    {!! Form::label('montant', 'Montant:') !!}
    <p>{{ $operation->montant }}</p>
</div>

<!-- Date Operation Field -->
<div class="form-group">
    {!! Form::label('date_operation', 'Date Operation:') !!}
    <p>{{ $operation->date_operation }}</p>
</div>

<!-- Type Operation Field -->
<div class="form-group">
    {!! Form::label('type_operation', 'Type Operation:') !!}
    <p>{{ $operation->type_operation }}</p>
</div>

