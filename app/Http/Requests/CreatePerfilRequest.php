<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePerfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rut'=>'required|regex:/\d{1,2}\d{3}\d{3}[\-][0-9kK]{1}/|max:10|min:9',
            'nombre'=>'required',
            'apellidoPaterno'=>'required',
            'apellidoMaterno'=>'required',
            'telefono'=>'required',
            'comuna'=>'required'
        ];
    }
public function withValidator($validator)
{
    $validator->after(function($validator)
    {

        $rut=$this->rut;
        $rutLargo=strlen($rut);
        /*Se separan los primeros 8 digitos del rut
        Si a futuro se quiere llegar a ruts más largos agregar una condición adicional*/
        if($rutLargo=='10'){
            $numeroIndex7=(int) substr($rut,7,1);
        }else{
            $numeroIndex7=0;
        }
        $numeroIndex6=(int)substr($rut,6,1);
        $numeroIndex5=(int)substr($rut,5,1);
        $numeroIndex4=(int) substr($rut,4,1);
        $numeroIndex3=(int) substr($rut,3,1);
        $numeroIndex2=(int) substr($rut,2,1);
        $numeroIndex1=(int) substr($rut,1,1);
        $numeroIndex0=(int) substr($rut,0,1);

        $rutLargoCompleto=$numeroIndex0." ".$numeroIndex1." ".$numeroIndex2." ".$numeroIndex3." ".$numeroIndex4." ".$numeroIndex5." ".$numeroIndex6." ".$numeroIndex7;
        /*Se realiza una multiplicación por cada uno de ellos
        Si a futuro se quiere llegar a ruts más largos agregar una condición adicional
        */
        if($rutLargo=='10'){
            $mulNumeroIndex7=(int) ($numeroIndex7*2);
            $mulNumeroIndex6=(int) ($numeroIndex6*3);
            $mulNumeroIndex5=(int) ($numeroIndex5*4);
            $mulNumeroIndex4=(int)($numeroIndex4*5);
            $mulNumeroIndex3=(int)($numeroIndex3*6);
            $mulNumeroIndex2=(int)($numeroIndex2*7);
            $mulNumeroIndex1=(int)($numeroIndex1*2);
            $mulNumeroIndex0=(int)($numeroIndex0*3);
        }else{
            $mulNumeroIndex7=0;
            $mulNumeroIndex6=(int) ($numeroIndex6*2);
            $mulNumeroIndex5=(int) ($numeroIndex5*3);
            $mulNumeroIndex4=(int)($numeroIndex4*4);
            $mulNumeroIndex3=(int)($numeroIndex3*5);
            $mulNumeroIndex2=(int)($numeroIndex2*6);
            $mulNumeroIndex1=(int)($numeroIndex1*7);
            $mulNumeroIndex0=(int)($numeroIndex0*2);
        }

        /*Se suman los numeros y luego se les aplica la división por 11*/
        $suma=$mulNumeroIndex7+$mulNumeroIndex6+$mulNumeroIndex5+$mulNumeroIndex4+$mulNumeroIndex3+$mulNumeroIndex2+$mulNumeroIndex1+$mulNumeroIndex0;
        $division=11;
        $resultadoDivision=$suma / $division;
        /*Se multiplica 11 por el resultado de la división truncado*/
        $resultadoDivisionTruncado=floor($resultadoDivision);
        $onceMultiplicado=11*$resultadoDivisionTruncado;
        /*Se resta la suma por el resultado anterior*/
        $sumaRestada=$suma-$onceMultiplicado;
        /*Y para finalizar, a 11 le restamos el resultado anterior:*/
        $onceMenosResultadoAnterior=11-$sumaRestada;
        /*Ahora vemos si el numero en el index 9 es igual al resultado anterior*/
        if($rutLargo==10){
            $numeroIndex9= substr($rut,9);
        }else{
            /*Si es menor a 10 el largo del rut, entonces digito verificador esta en el index 8*/
            $numeroIndex9= substr($rut,8);
        }


        if($numeroIndex9=='k'||$numeroIndex9=='K'){
            $numeroIndex9=10;
        }
        if($numeroIndex9=='0'){
            $numeroIndex9=11;
        }
        if($numeroIndex9!=$onceMenosResultadoAnterior){

            $validator->errors()->add('rut','El rut no es valido');
        }
    });
}
    
}
