<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\Nomina;
use App\Models\NominaConceptos;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function index(){
        $empleados = Empleado::orderBy('IDEMPLEADO','ASC')->get();              //array con todos los empleados ordenados por el idempleado ascendente
        $empresas = Empresa::orderBy('IDEMPRESA','ASC')->get();  
        //return $empleados;               //array de todas las empresas ordenadas por el idempresa ascendente
        return view('empleados.index', compact('empleados','empresas'));
    }

    public function show($IDEMPLEADO){
        $empleado = Empleado::where('IDEMPLEADO', $IDEMPLEADO)->first();        //empleado pasando el idempleado por parametro
        $nominas = Nomina::where('IDEMPLEADO', $IDEMPLEADO)->get();             //puede tener mas de una
        $empresa = Empresa::where('IDEMPRESA', $empleado->IDEMPRESA)->first();  //la empresa a la que pertenece
        $contrato = Contrato::where('IDEMPLEADO',$IDEMPLEADO)->first();         //el contrato que tiene como empleado
        //return $empleado;
        return view('empleados.show', compact('empleado','empresa','contrato','nominas'));
    }
    public function datos($IDEMPLEADO,$IDNOMINA){
        $empleado = Empleado::where('IDEMPLEADO', $IDEMPLEADO)->first();         //obtenemos el empleado con su idempleado
        $nomina = Nomina::where('IDNOMINA', $IDNOMINA)->first();                 //obtenemos la nomina pasando el idnomina que queremos visualizar
        $empresa = Empresa::where('IDEMPRESA', $empleado->IDEMPRESA)->first();   //la empresa a la que pertenece el empleado con el idempresa
        $contrato = Contrato::where('IDEMPLEADO',$IDEMPLEADO)->first();          //el contrato que tiene el empleado con su idempleado

        $nominasConceptosTipo1 = NominaConceptos::where('IDNOMINA', $IDNOMINA)->where('IDTIPOCONCEPTO', 1)->get();
        $nominasConceptosTipo2 = NominaConceptos::where('IDNOMINA', $IDNOMINA)->where('IDTIPOCONCEPTO', 2)->get();
        $nominasConceptosTipo3 = NominaConceptos::where('IDNOMINA', $IDNOMINA)->where('IDTIPOCONCEPTO', 3)->get();
        $nominasConceptosTipo4 = NominaConceptos::where('IDNOMINA', $IDNOMINA)->where('IDTIPOCONCEPTO', 4)->get();

        return view('empleados.datos', compact('nomina','empleado','empresa','contrato','nominasConceptosTipo1','nominasConceptosTipo2','nominasConceptosTipo3','nominasConceptosTipo4'));
    }
    public function create(){
        return view('empleados.create');
    }
}
