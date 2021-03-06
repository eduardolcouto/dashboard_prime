<?php
namespace App;

use DB;

class Dashboard{

	public function slaIniEstourando()
	{
		$data = DB::select("
		SELECT T.DSC_ANALISTA_SUPORTE,
		       T.CHAMADO,
		       T.DSC_SISTEMA,
		       T.DSC_STATUS_ATUAL,
		       T.DSC_PRIORIDADE_CLIENTE,
		       ID_STATUS_ATUAL,
		       T.DSC_STATUS_COR,
		       T.SLA_INI_CONTRATO,
		       round(T.SLA_INI_RESTANTE,2) SLA_INI_RESTANTE,
		       T.NOME_CLIENTE
		  FROM DSC_VW_PRINCIPAL_PRIME t
		 WHERE t.id_dashboard = 121
		   AND T.SLA_INI_RESTANTE between  -10 and 5
		   AND T.ID_STATUS_ATUAL IN 'AGT'
		   order by T.SLA_INI_RESTANTE
		");

		return $data;
	}

	public function slaContEstourando()
	{
		$data = DB::select("
			SELECT T.DSC_ANALISTA_SUPORTE,
		           T.CHAMADO,
		           T.DSC_SISTEMA,
		           T.DSC_STATUS_ATUAL,
		           T.DSC_PRIORIDADE_CLIENTE,
		           ID_STATUS_ATUAL,
		           T.DSC_STATUS_COR,
		           T.SLA_INI_CONTRATO,
		           round(T.sla_cont_restante,2) sla_cont_restante,
		           T.NOME_CLIENTE
		      FROM DSC_VW_PRINCIPAL_PRIME t
		     WHERE t.id_dashboard = 121
		       AND T.sla_cont_restante between  -40 and 5
		       and t.ID_STATUS_ATUAL in ('AS','ES','PR')
		       and t.dsc_sla_contingencia is null
		       order by T.sla_cont_restante 
		");
		return $data;
	}

	public function chamadoPorAnalistas()
	{
		$data = DB::select("
			SELECT 
				   (substr(T.DSC_ANALISTA_SUPORTE,1,instr(T.DSC_ANALISTA_SUPORTE,' ',1))
           			||
            		substr(T.DSC_ANALISTA_SUPORTE,instr(T.DSC_ANALISTA_SUPORTE,' ',-1)+1)
				   ) DSC_ANALISTA_SUPORTE,
		           T.CHAMADO,
		           T.DSC_SISTEMA,
		           T.DSC_STATUS_ATUAL,
		           T.DSC_PRIORIDADE_CLIENTE,
		           to_char(T.dt_cad_chamado,'DD/MM/YYYY') dt_cad_chamado,
		           T.NOME_CLIENTE
				      FROM DSC_VW_PRINCIPAL_PRIME t
				     WHERE t.id_dashboard = 121
				       and t.ID_STATUS_ATUAL in ('AS','ES','PR')
				       order by T.dt_cad_chamado  
		");
		return $data;
	}

	public function chamadoEmSuporte()
	{
		$data = DB::select("
			SELECT 
				   (substr(T.DSC_ANALISTA_SUPORTE,1,instr(T.DSC_ANALISTA_SUPORTE,' ',1))
           			||
            		substr(T.DSC_ANALISTA_SUPORTE,instr(T.DSC_ANALISTA_SUPORTE,' ',-1)+1)
				   ) DSC_ANALISTA_SUPORTE,
		           T.CHAMADO,
		           T.DSC_SISTEMA,
		           T.DSC_STATUS_ATUAL,
		           T.DSC_PRIORIDADE_CLIENTE,
		           to_char(T.dt_cad_chamado,'DD/MM/YYYY') dt_cad_chamado,
		           T.NOME_CLIENTE
				      FROM DSC_VW_PRINCIPAL_PRIME t
				     WHERE t.id_dashboard = 121
				       and t.ID_STATUS_ATUAL = ('ES')
				       order by T.dt_cad_chamado  
		");
		return $data;
	}

	public function chamadoAguardando()
	{
		$data = DB::select("
			SELECT 
				   (substr(T.DSC_ANALISTA_SUPORTE,1,instr(T.DSC_ANALISTA_SUPORTE,' ',1))
           			||
            		substr(T.DSC_ANALISTA_SUPORTE,instr(T.DSC_ANALISTA_SUPORTE,' ',-1)+1)
				   ) DSC_ANALISTA_SUPORTE,
		           T.CHAMADO,
		           T.DSC_SISTEMA,
		           T.DSC_STATUS_ATUAL,
		           T.DSC_PRIORIDADE_CLIENTE,
		           to_char(T.dt_cad_chamado,'DD/MM/YYYY') dt_cad_chamado,
		           T.NOME_CLIENTE
				      FROM DSC_VW_PRINCIPAL_PRIME t
				     WHERE t.id_dashboard = 121
				       and t.ID_STATUS_ATUAL = ('AS')
				       order by T.dt_cad_chamado  
		");
		return $data;
	}

	public function chamadoPendencia()
	{
		$data = DB::select("
			SELECT 
				   (substr(T.DSC_ANALISTA_SUPORTE,1,instr(T.DSC_ANALISTA_SUPORTE,' ',1))
           			||
            		substr(T.DSC_ANALISTA_SUPORTE,instr(T.DSC_ANALISTA_SUPORTE,' ',-1)+1)
				   ) DSC_ANALISTA_SUPORTE,
		           T.CHAMADO,
		           T.DSC_SISTEMA,
		           T.DSC_STATUS_ATUAL,
		           T.DSC_PRIORIDADE_CLIENTE,
		           to_char(T.dt_cad_chamado,'DD/MM/YYYY') dt_cad_chamado,
		           T.NOME_CLIENTE
				      FROM DSC_VW_PRINCIPAL_PRIME t
				     WHERE t.id_dashboard = 121
				       and t.ID_STATUS_ATUAL = ('PR')
				       order by T.dt_cad_chamado  
		");
		return $data;
	}

	public function chamadosBmw()
	{
		$data = DB::select("
			SELECT T.chamado,
			       ref_cliente,
			       DSC_TIPO,
			       DSC_SISTEMA,
			       DSC_ANALISTA_SUPORTE,
			       DSC_STATUS_ATUAL,
			       to_char(T.dt_cad_chamado,'DD/MM/RRRR') DT_CAD_CHAMADO,
			       round(SLA_INI_RESTANTE,2) SLA_INI_RESTANTE,
			       round(SLA_CONT_RESTANTE,2) SLA_CONT_RESTANTE,
			       DT_CAD_CHAMADO DT_ORDERBY
			  FROM dsc_vw_principal_prime_full t
			 WHERE t.id_dashboard = 121
			   and t.dt_cad_chamado > add_months(sysdate, -2)
			   and t.nome_cliente = 'BMW'
			   ORDER BY DT_ORDERBY
		
		");
		return $data;
	}	
}