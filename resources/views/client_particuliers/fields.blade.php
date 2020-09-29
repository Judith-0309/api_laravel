<!-- Compte Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compte_id', 'Compte Id:') !!}
    {!! Form::number('compte_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::textarea('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('prenom', 'Prenom:') !!}
    {!! Form::textarea('prenom', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Genre Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('genre', 'Genre:') !!}
    {!! Form::textarea('genre', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', 'Adresse:') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control']) !!}
</div>

<!-- Profession Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('profession', 'Profession:') !!}
    {!! Form::textarea('profession', null, ['class' => 'form-control']) !!}
</div>

<!-- Salarie Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('salarie', 'Salarie:') !!}
    {!! Form::textarea('salarie', null, ['class' => 'form-control']) !!}
</div>

<!-- Salaire Actuel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salaire_actuel', 'Salaire Actuel:') !!}
    {!! Form::number('salaire_actuel', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Employeur Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('nom_employeur', 'Nom Employeur:') !!}
    {!! Form::textarea('nom_employeur', null, ['class' => 'form-control']) !!}
</div>

<!-- Cni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cni', 'Cni:') !!}
    {!! Form::text('cni', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientParticuliers.index') }}" class="btn btn-default">Cancel</a>
</div>
