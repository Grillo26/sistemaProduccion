<div>
    <x-data-table :data="$data" :model="$produccions, $turnos" >
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>

                <th><a wire:click.prevent="sortBy('granoDeSoya')" role="button" href="#">
                    Grano de Soya
                    @include('components.sort-icon', ['field' => 'granoDeSoya'])
                </a></th>

                <th><a wire:click.prevent="sortBy('merma')" role="button" href="#">
                    Merma
                    @include('components.sort-icon', ['field' => 'merma'])
                </a></th>

                <th><a wire:click.prevent="sortBy('idTurno')" role="button" href="#">
                    Turno
                    @include('components.sort-icon', ['field' => 'idTurno'])
                </a></th>

                <th><a wire:click.prevent="sortBy('fecha')" role="button" href="#">
                    Fecha
                    @include('components.sort-icon', ['field' => 'fecha'])
                </a></th>

                <th><a wire:click.prevent="sortBy('humedad')" role="button" href="#">
                    Humedad
                    @include('components.sort-icon', ['field' => 'humedad'])
                </a></th>

                <th><a wire:click.prevent="sortBy('bolsas')" role="button" href="#">
                    Bolsas
                    @include('components.sort-icon', ['field' => 'bolsas'])
                </a></th>

                <th><a wire:click.prevent="sortBy('aceite')" role="button" href="#">
                    Aceite
                    @include('components.sort-icon', ['field' => 'aceite'])
                </a></th>
                

                <th>Acciones</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($produccions as $produccion)
                <tr x-data="window.__controller.dataTableController({{ $produccion->id }})">
                    <td>{{ $produccion->id }}</td>
                    <td>{{ $produccion->granoDeSoya }}</td>
                    <td>{{ $produccion->merma }}</td>
                    @foreach ($turnos as $turno )
                        @if(  $produccion->idTurno == $turno->id)
                        <td>{{ $turno->nombreTurno}}</td>
                        @endif
                    @endforeach
                    <td>{{ $produccion->fecha }}</td>
                    <td>{{ $produccion->humedad }}</td>
                    <td>{{ $produccion->bolsas }}</td>
                    <td>{{ $produccion->aceite }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/produccion/edit/{{ $produccion->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot> 
    </x-data-table>
</div>