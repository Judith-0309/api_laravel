<li class="{{ Request::is('essais*') ? 'active' : '' }}">
    <a href="{{ route('essais.index') }}"><i class="fa fa-edit"></i><span>Essais</span></a>
</li>

<li class="{{ Request::is('comptes*') ? 'active' : '' }}">
    <a href="{{ route('comptes.index') }}"><i class="fa fa-edit"></i><span>Comptes</span></a>
</li>

<li class="{{ Request::is('clientParticuliers*') ? 'active' : '' }}">
    <a href="{{ route('clientParticuliers.index') }}"><i class="fa fa-edit"></i><span>Client Particuliers</span></a>
</li>

<li class="{{ Request::is('operations*') ? 'active' : '' }}">
    <a href="{{ route('operations.index') }}"><i class="fa fa-edit"></i><span>Operations</span></a>
</li>

