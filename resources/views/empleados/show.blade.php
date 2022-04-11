@extends('layouts.plantilla')

@section('title','Nominas')

@section('content')
    <h1 class="text-center">Nominas del trabajador: {{$empleado->NOMBRE}} {{$empleado->APELLIDO1}} {{$empleado->APELLIDO2}}</h1>
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">Mes</th>
                <th scope="col">Estado Nomina</th>
                <th scope="col">Empleado</th>
                <th scope="col">Empresa</th>
                <th scope="col">Estado Contrato</th>
                <th scope="col">Fecha</th>
                <th scope="col">Boton</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($nominas as $nomina)
            <tr class="text-center">
                <td class="text-center"> 
                @switch(substr($nomina->FECHA,5,-3))
                    @case("01")
                        Enero
                        @break
                    @case("02")
                        Febrero
                        @break
                    @case("03")
                        Marzo
                        @break
                    @case("04")
                        Abril
                        @break
                    @case("05")
                        Mayo
                        @break
                    @case("06")
                        Junio
                        @break
                    @case("07")
                        Julio
                        @break
                    @case("08")
                        Agosto
                        @break
                    @case("09")
                        Septiembre
                        @break
                    @case("10")
                        Octubre
                        @break
                    @case("11")
                        Noviembre
                        @break
                    @case("12")
                        Diciembre
                        @break
                @endswitch

                @if ($nomina->IDESTADONOMINA == 1) 
                <td class="text-center"> Activo </td>
                @else 
                <td class="text-center"> Inactivo </td>
                @endif
                <td class="text-center"> {{$empleado->NOMBRE}} {{$empleado->APELLIDO1}} {{$empleado->APELLIDO2}} </td>
                <td class="text-center"> {{$empresa->RAZONSOCIAL}} </td>
                @if ($contrato->IDESTADOCONTRATO == 1) 
                <td class="text-center">  Activo </td>
                @else
                <td class="text-center">  Inactivo </td>
                @endif
                <td class="text-center"> {{$nomina->FECHA}} </td>
                <td> <a href="{{route('empleados.datos',[$empleado->IDEMPLEADO,$nomina->IDNOMINA])}}" class="btn float-right btn-success">Ver nomina</a></td>
			</tr>
        @endforeach
        </tbody>
	</table>
    <a href="{{route('empleados.index')}}" class="btn float-right btn-warning">Volver</a>
@endsection