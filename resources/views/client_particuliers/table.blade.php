<div class="table-responsive">
    <table class="table" id="clientParticuliers-table">
        <thead>
            <tr>
                <th>Compte Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Telephone</th>
        <th>Genre</th>
        <th>Email</th>
        <th>Adresse</th>
        <th>Profession</th>
        <th>Salarie</th>
        <th>Salaire Actuel</th>
        <th>Nom Employeur</th>
        <th>Cni</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientParticuliers as $clientParticulier)
            <tr>
                <td>{{ $clientParticulier->compte_id }}</td>
            <td>{{ $clientParticulier->nom }}</td>
            <td>{{ $clientParticulier->prenom }}</td>
            <td>{{ $clientParticulier->telephone }}</td>
            <td>{{ $clientParticulier->genre }}</td>
            <td>{{ $clientParticulier->email }}</td>
            <td>{{ $clientParticulier->adresse }}</td>
            <td>{{ $clientParticulier->profession }}</td>
            <td>{{ $clientParticulier->salarie }}</td>
            <td>{{ $clientParticulier->salaire_actuel }}</td>
            <td>{{ $clientParticulier->nom_employeur }}</td>
            <td>{{ $clientParticulier->cni }}</td>
                <td>
                    {!! Form::open(['route' => ['clientParticuliers.destroy', $clientParticulier->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientParticuliers.show', [$clientParticulier->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clientParticuliers.edit', [$clientParticulier->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
