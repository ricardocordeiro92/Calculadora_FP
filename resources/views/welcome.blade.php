@extends('layouts.app')

@section('content')
    <section id="inicio" class="corpo">
        <div class="row justify-content-md-center align-items-center pt-5">
            <div class="col-md-12 col-lg-8">
                Com essa calculadora é possível calcular o fluxo diário de pessoas em um município a partir da População Total Residente (PR), a População Empregada (PE), o número de Estudantes (EST) e o número de Idosos (IDS).
            </div>
        </div>
        @if(session()->has('erro') || $errors->has('residente') || $errors->has('empregada') || $errors->has('estudantes') || $errors->has('idosos') )
            <div class="row justify-content-md-center align-items-center pt-3">
                <div class="alert alert-danger" role="alert">
                    @if(session()->has('erro'))
                        {{ session()->get('erro') }}
                    @else
                        @if(count($errors) > 1)
                            Os Campos destacados abaixo são obrigatórios!
                        @else
                            O Campo destacado abaixo é Obrigatório!
                        @endif
                    @endif
                </div>
            </div>
        @endif
        @if(session()->has('sucesso'))
            <div class="row justify-content-md-center align-items-center pt-3">
                <div class="alert alert-success" role="alert">
                    {{ session()->get('sucesso') }}
                </div>
            </div>
        @endif
        <form action="{{url('calcularFluxo')}}" method="post">
            {{csrf_field()}}
            <div class="row justify-content-center align-items-center pt-3">
                <div class="col-md-4">
                        <label class="control-label">População Total Residente (PR):</label>  
                        <input id="residente" name="residente" type="number" value="{{old('residente')}}" placeholder=" {{$errors->has('residente') ? $errors->first('residente') : 'População Residente'}}" class="form-control {{$errors->has('residente') ? 'is-invalid' : ''}}">
                </div>
                <div class="col-md-4">
                        <label class="control-label">População Empregada (PE):</label>  
                        <input id="empregada" name="empregada" type="number" value="{{old('empregada')}}" placeholder=" {{$errors->has('empregada') ? $errors->first('empregada') : 'População empregada'}}" class="form-control {{$errors->has('empregada') ? 'is-invalid' : ''}}">
                </div>
            </div>
            <div class="row justify-content-center align-items-center py-3">
                <div class="col-md-4">
                        <label class="control-label">Quantidade de Estudantes (EST):</label>  
                        <input id="estudantes" name="estudantes" type="number" value="{{old('estudantes')}}" placeholder=" {{$errors->has('estudantes') ? $errors->first('estudantes') : 'População estudantes'}}" class="form-control {{$errors->has('estudantes') ? 'is-invalid' : ''}}">
                </div>
                <div class="col-md-4">
                        <label class="control-label">Quantidade de Idosos (IDS):</label>  
                        <input id="idosos" name="idosos" type="number" value="{{old('idosos')}}" placeholder=" {{$errors->has('idosos') ? $errors->first('idosos') : 'População idosos'}}" class="form-control {{$errors->has('idosos') ? 'is-invalid' : ''}}">
                </div>
            </div>
            <div class="row justify-content-center align-items-center py-5">
                    <input class="btn btn-secondary" id="limpar_cadastro" type="reset" value="Limpar">
                    <input class="btn btn-primary margin_botao" id="cadastrar_usuario" type="submit" value="Calcular">
            </div>
        </form>
    </section>
@endsection