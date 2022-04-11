<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\Nomina;
use Illuminate\Http\Request;

class ApiController extends Controller
{   //json_encode       
    public function ver(){                                                      //PARA VER TODOS LOS EMPLEADOS ORDENADOS POR IDEMPLEADO   
        $empleados = Empleado::orderBy('IDEMPLEADO','ASC')->get();              //->take(10)->get();  
        //$empresas = Empresa::orderBy('IDEMPRESA','ASC')->get();                 
        return json_encode($empleados, JSON_UNESCAPED_UNICODE);               
    }
    public function nuevo(Request $request){
        $empleado = new Empleado(); 
        $empleado->NOMBRE = $request->NOMBRE;
        $empleado->APELLIDO1 = $request->APELLIDO1;
        $empleado->APELLIDO2 = $request->APELLIDO2;
        $empleado->DNI = $request->DNI;
        $empleado->IDEMPRESA = $request->IDEMPRESA;
        $empleado->save();
        return json_encode($empleado, JSON_UNESCAPED_UNICODE);     
    }
    public function modificar(Request $request){
        $empleado = Empleado::where('IDEMPLEADO', $request->IDEMPLEADO)->first();
        $empleado->NOMBRE = $request->NOMBRE;
        $empleado->APELLIDO1 = $request->APELLIDO1;
        $empleado->APELLIDO2 = $request->APELLIDO2;
        $empleado->IDEMPRESA = $request->IDEMPRESA; 
        $empleado->DNI = $request->DNI;
        $empleado->save();
        return json_encode($empleado, JSON_UNESCAPED_UNICODE);     
    }
    public function borrar(Request $request){
        $empleado = Empleado::where('IDEMPLEADO', $request->IDEMPLEADO)->first();
        $empleado->delete();
        return json_encode($empleado);
    }
    
    public function nominasEmpleado($IDEMPLEADO){                           //empleado/$IDEMPLEADO/nominas  ----> PARA VER TODAS LAS NOMINAS DE UN EMPLEADO EN CONCRETO
        $nominas = Nomina::where('IDEMPLEADO', $IDEMPLEADO)->get();            
        return json_encode($nominas);              
    }

    public function nomina($IDNOMINA){                                      //nomina/$IDNOMINA -----> PARA VER UNA NOMINA EN CONCRETO
        $nomina = Nomina::where('IDNOMINA', $IDNOMINA)->get();            
        return json_encode($nomina);              
    }

}

