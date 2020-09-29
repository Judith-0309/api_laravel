<div class="table-responsive">
    <table class="table" id="comptes-table">
        <thead>
            <tr>
                <th>Type Compte</th>
        <th>Numero Compte</th>
        <th>Cle Rib</th>
        <th>Etat Compte</th>
        <th>Depot Initial</th>
        <th>Date Ouverture</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comptes as $compte)
            <tr>
                <td>{{ $compte->type_compte }}</td>
            <td>{{ $compte->numero_compte }}</td>
            <td>{{ $compte->cle_rib }}</td>
            <td>{{ $compte->etat_compte }}</td>
            <td>{{ $compte->depot_initial }}</td>
            <td>{{ $compte->date_ouverture }}</td>
                <td>
                    {!! Form::open(['route' => ['comptes.destroy', $compte->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('comptes.show', [$compte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('comptes.edit', [$compte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
