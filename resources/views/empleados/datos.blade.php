@extends('layouts.plantilla')

@section('title','Nominas')

@section('content')
<?php
    // foreach ($nominasConceptosTipo4 as $conceptoTipo3) {
    //     echo $conceptoTipo3->CONCEPTO." -> ";
    //     echo $conceptoTipo3->IMPORTE."<br>";
    // }
?>
    <div class="row">
        <div class="col-xl-6">
            <div class="contenedor">

                <div class="card" style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$empleado->NOMBRE}} {{$empleado->APELLIDO1}} {{$empleado->APELLIDO2}} con DNI: {{$empleado->DNI}}</h5><br>
                        <h6 class="card-text text-center">Empresa contratante {{$empresa->RAZONSOCIAL}} con NIF: {{$empresa->NIF}}</h6><br>
                        <a href="#" class="card-link"><img src="{{asset('img/pdf.png')}}" class="rounded mx-auto d-block" alt="imagen descargar pdf"></a><br><br>
                        <div class="card-footer text-center">
                        <small class="text-muted ">Nomina del mes de: <b>{{$nomina->FECHA}}</b></small>
                        </div>
                    </div>
                </div>
                <a href="{{ URL::previous() }}" class="btn float-right btn-warning">Volver</a>

            </div>
        </div>
        <div class="col-xl-6">
            <div class="contenedor">

                 <div class="card" style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">DESGLOSE DE NOMINA</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($nominasConceptosTipo1 as $conceptoTipo1)
                                    <tr class="text-center">
                                        <td>{{$conceptoTipo1->CONCEPTO}}</td>            
                                        <td>{{ number_format($conceptoTipo1->IMPORTE, 2,'.','') }} €</td>
                                    </tr>
                            @endforeach
                            @foreach ($nominasConceptosTipo3 as $conceptoTipo3)
                                @if ($conceptoTipo3->CONCEPTO == "TOTAL DEVENGOS" || $conceptoTipo3->CONCEPTO == "Devengos")
                                    <tr class="text-center">
                                        <td><b>TOTAL DEVENGOS</b></td>            
                                        <td><b>{{ number_format($conceptoTipo3->IMPORTE, 2,'.','') }} €</b></td>
                                    </tr>
                                @endif
                            @endforeach
                            @foreach ($nominasConceptosTipo2 as $conceptoTipo2)
                                    <tr class="text-center">
                                        <td>{{$conceptoTipo2->CONCEPTO}}</td>            
                                        <td>{{ number_format($conceptoTipo2->IMPORTE, 2,'.','') }} €</td>
                                    </tr>
                            @endforeach
                            @foreach ($nominasConceptosTipo3 as $conceptoTipo3)
                                @if ($conceptoTipo3->CONCEPTO == "TOTAL RETENCION" || $conceptoTipo3->CONCEPTO == "Total Deducciones")
                                    <tr class="text-center">
                                        <td><b>TOTAL RETENCION</b></td>            
                                        <td><b>{{ number_format($conceptoTipo3->IMPORTE, 2,'.','') }} €</b></td>
                                    </tr>
                                @endif
                                @if ($conceptoTipo3->CONCEPTO == "TOTAL LIQUIDO" || $conceptoTipo3->CONCEPTO == "Total Líquido Recibo")
                                    <tr class="text-center">
                                        <td><b>TOTAL LIQUIDO</b></td>            
                                        <td><b>{{ number_format($conceptoTipo3->IMPORTE, 2,'.','') }} €</b></td>
                                    </tr>
                                @endif
                            @endforeach
                            @foreach ($nominasConceptosTipo4 as $conceptoTipo4)
                                @if ($conceptoTipo4->CONCEPTO == "COSTE S.S. EMPR." || $conceptoTipo4->CONCEPTO == "COSTE ACC. EMPR.")
                                    <tr class="text-center">
                                        <td>{{$conceptoTipo4->CONCEPTO}}</td>            
                                        <td>{{ number_format($conceptoTipo4->IMPORTE, 2,'.','') }} €</td>
                                    </tr>
                                @endif
                            @endforeach
                            @foreach ($nominasConceptosTipo3 as $conceptoTipo3)
                                @if ($conceptoTipo3->CONCEPTO == "TOTAL COSTE S.S.")
                                    <tr class="text-center">
                                        <td><b>{{$conceptoTipo3->CONCEPTO}}</b></td>            
                                        <td><b>{{ number_format($conceptoTipo3->IMPORTE, 2,'.','') }} €</b></td>
                                    </tr>
                                @endif
                                @if ($conceptoTipo3->CONCEPTO == "TOTAL")
                                    <tr class="text-center">
                                        <td><b>{{$conceptoTipo3->CONCEPTO}}</td>            
                                        <td><b>{{ number_format($conceptoTipo3->IMPORTE, 2,'.','') }} €</b></td>
                                    </tr>
                                @endif
                               
                            @endforeach
                            </tbody>
	                    </table>
                        <!-- <table>
                            @foreach ($nominasConceptosTipo3 as $conceptoTipo3)
                               <tr class="text-center">
                                   <td>{{$conceptoTipo3->CONCEPTO}}</td>            
                                   <td><b>{{$conceptoTipo3->IMPORTE}}</b></td>
                               </tr>
                            @endforeach
                        </table> -->
                    </div>
                 </div>
            
    
            </div>
        </div>
    </div>
@endsection