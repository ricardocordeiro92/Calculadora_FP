<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PessoasController extends Controller
{
    public function calcularFluxo(Request $req){
    	$validacao = $this->validacao($req->all());
    	if($validacao->fails()){
	        return redirect()->back()
	        	->withErrors($validacao->errors())
	            ->withInput($req->all());
	    }
	    if($req->residente <= $req->empregada){
	    	return redirect()->back()
	        	->with('erro', 'População Empregada não pode ser maior que a População Total Residente')
	            ->withInput($req->all());
	    }else{
	    	if($req->residente <= $req->estudantes){
	    		return redirect()->back()
	        		->with('erro', 'População de Estudantes não pode ser maior que a População Total Residente')
	            	->withInput($req->all());
	        }else{
	        	if($req->residente <= $req->idosos){
	    			return redirect()->back()
	        			->with('erro', 'População de Idosos não pode ser maior que a População Total Residente')
	            		->withInput($req->all());
	            }else{
	            	$pessoa= new Pessoa();
			        $pessoa->populacao_residente = $req->residente;
			        $pessoa->populacao_empregada = $req->empregada;
			        $pessoa->estudantes = $req->estudantes;
			        $pessoa->idosos = $req->idosos;
			        $ocupados = $pessoa->populacao_empregada + 0.8*$pessoa->estudantes;
			        $idoso_sem_ocupacao = 0.71*$pessoa->idosos;
			        $desocupados = $pessoa->populacao_residente - $ocupados - $idoso_sem_ocupacao;
			        $pessoa->fluxo_pessoas = intval(0.92*$ocupados + 0.2*$idoso_sem_ocupacao + 0.3*$desocupados); 
			        $pessoa->save();
			        return redirect('/')->with('sucesso', 'O fluxo nessa cidade é de '.$pessoa->fluxo_pessoas.' pessoas por dia');
	            }
	        }
	    }        
    }
    private function validacao($data){
    	$regras = [
    		'residente' => 'required',
    		'empregada' => 'required',
    		'estudantes' => 'required',
    		'idosos' => 'required'
    	];
    	$mensagens = [
    		'residente.required' => 'Campo obrigatório',
    		'empregada.required' => 'Campo obrigatório',
    		'estudantes.required' => 'Campo obrigatório',
    		'idosos.required' => 'Campo obrigatório'
    	];
    	return Validator::make($data, $regras, $mensagens);
    }
}
