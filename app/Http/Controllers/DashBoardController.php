<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class DashBoardController extends Controller
{
    public function __construct(\App\Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    public function index()
    {
        //$slaIniEstourando =$this->dashboard->slaIniEstourando();
        //$slaContEstourando =$this->dashboard->slaContEstourando();
        $pendencias =$this->dashboard->chamadosPendencia();
        $emSuporte =$this->dashboard->chamadosEmSuporte(); 
        $agurdandoSuporte = $this->dashboard->chamadosAguardando(); 
        $celula1Triagem = $this->dashboard->celula1Triagem(); 
        $celula1Distribuicao = $this->dashboard->celula1Distribuicao(); 
        $celula2Triagem = $this->dashboard->celula2Triagem(); 
        $celula2Distribuicao = $this->dashboard->celula2Distribuicao();  

        return view('dashboard.dashboard',
                        compact('pendencias',
                                'emSuporte',
                                'agurdandoSuporte', 
                                'celula1Triagem',
                                'celula1Distribuicao',
                                'celula2Triagem',
                                'celula2Distribuicao')
                    );
    }

    public function dashBmw()
    {
        $chamadosBmw =$this->dashboard->chamadosBmw();

        return view('dashboard.dashbmw',compact('chamadosBmw'));
    }

    public function totalBacklog()
    {
    	return $this->dashboard->totalBacklog();
    }

    public function totalAging()
    {
        return $this->dashboard->totalAging();
    }

    public function pesquisaSatisfacao()
    {
        return $this->dashboard->pesquisaSatisfacao();
    }
}
