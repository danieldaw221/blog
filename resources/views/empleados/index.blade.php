@extends('layouts.plantilla')

@section('title','Empleados')

@section('content')
    <h1 class="text-center">Bienvenido a la pagina de los empleados</h1>
    <table class="table table-striped">
        <thead> 
            <tr class="text-center">
                <th scope="col">ID Empleado</th>
                <th scope="col">Empleado</th>
                <th scope="col">DNI</th>
                <th scope="col">Estado</th>
                <th scope="col">Empresa</th>
                <th scope="col">Ver</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                @if ($empleado->DNI !== null)
                <tr class="text-center">
                    <td class="text-center"> {{$empleado->IDEMPLEADO}} </td>
                    <td class="text-center"> {{$empleado->NOMBRE}} {{$empleado->APELLIDO1}} {{$empleado->APELLIDO2}}</td>   
                    <td class="text-center"> {{$empleado->DNI}} </td>   
                    @if ($empleado->IDESTADOEMPLEADO == 1)
                        <td class="text-center"> ACTIVO </td>
                    @else
                        <td class="text-center"> INACTIVO </td>
                    @endif
                    @for ($i = 0 ; $i < sizeof($empresas); $i++)
                        @if ($empresas[$i]->IDEMPRESA == $empleado->IDEMPRESA)
                            <td class="text-center"> {{$empresas[$i]->RAZONSOCIAL}} </td>
                        @endif
                    @endfor   
                    <td class="text-center"> <a href="{{route('empleados.show',$empleado->IDEMPLEADO)}}" class="btn float-right btn-success">Ver nominas</a> </td>
                </tr>
                @endif
            @endforeach
        </tbody>
	</table>
@endsection 