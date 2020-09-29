<!-- Type Compte Field -->
<div class="form-group">
    {!! Form::label('type_compte', 'Type Compte:') !!}
    <p>{{ $compte->type_compte }}</p>
</div>

<!-- Numero Compte Field -->
<div class="form-group">
    {!! Form::label('numero_compte', 'Numero Compte:') !!}
    <p>{{ $compte->numero_compte }}</p>
</div>

<!-- Cle Rib Field -->
<div class="form-group">
    {!! Form::label('cle_rib', 'Cle Rib:') !!}
    <p>{{ $compte->cle_rib }}</p>
</div>

<!-- Etat Compte Field -->
<div class="form-group">
    {!! Form::label('etat_compte', 'Etat Compte:') !!}
    <p>{{ $compte->etat_compte }}</p>
</div>

<!-- Depot Initial Field -->
<div class="form-group">
    {!! Form::label('depot_initial', 'Depot Initial:') !!}
    <p>{{ $compte->depot_initial }}</p>
</div>

<!-- Date Ouverture Field -->
<div class="form-group">
    {!! Form::label('date_ouverture', 'Date Ouverture:') !!}
    <p>{{ $compte->date_ouverture }}</p>
</div>

