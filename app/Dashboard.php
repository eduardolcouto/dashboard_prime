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

	public function chamadosEmSuporte()
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

	public function chamadosAguardando()
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

	public function chamadosPendencia()
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
			       DT_CAD_CHAMADO DT_ORDERBY,
			       t.titulo_atividade
			  FROM dsc_vw_principal_prime_full t
			 WHERE t.id_dashboard = 121
			   and t.dt_cad_chamado > add_months(sysdate, -2)
			   and t.nome_cliente = 'BMW'
			   ORDER BY DT_ORDERBY

		");
		return $data;
	}

	public function totalBacklog()
	{
		$data = DB::table('DSC_VW_PRINCIPAL_PRIME')
					->whereIn('ID_STATUS_ATUAL',['AS','AGT','ES','PR'])
					->where('id_dashboard',121)
					->get();

		return count($data);


	}

	public function totalAging()
	{
		$data = DB::connection('oracle2')->select("
			select *
			  from (select ano_mes, aging from dsc_vw_aging_prime order by ano_mes desc)
			 where rownum <= 3
		");

		return $data;
	}

	public function pesquisaSatisfacao()
	{
		$data = DB::select("
					SELECT
					  QTDE_AVALIACOES,
					  DESCRICAO_PESQUISA
					FROM dsc_vw_pesq_satisfacao_prime
				");

		return $data;
	}

	public function celula1Triagem()
	{
		$data = DB::select("
		SELECT     T.CHAMADO,
           T.DSC_SISTEMA,
           T.DSC_STATUS_ATUAL,
           T.DSC_PRIORIDADE_CLIENTE,
           round(T.SLA_INI_RESTANTE,2) SLA_INI_RESTANTE,
           T.NOME_CLIENTE,
           t.dsc_fila
	      FROM DSC_VW_PRINCIPAL_PRIME t
	     WHERE t.id_dashboard = 121
	           and t.dsc_fila = 'PS - N1 - Equipe 2'
               and t.id_status_atual not in ('ED','EC','F','C')
	       order by T.SLA_INI_RESTANTE
		");

		return $data;
	}

	public function celula1Distribuicao()
	{
		$data = DB::select("
		SELECT     T.CHAMADO,
           T.DSC_SISTEMA,
           T.DSC_STATUS_ATUAL,
           T.DSC_PRIORIDADE_CLIENTE,
           round(T.sla_cont_restante,2) sla_cont_restante,
           T.NOME_CLIENTE,
           t.dsc_fila
	      FROM DSC_VW_PRINCIPAL_PRIME t
	     WHERE t.id_dashboard = 121
	           and t.dsc_fila = 'PRIME DISTRIBUIÇÃO'
               and t.id_status_atual not in ('ED','EC','F','C')
	       order by T.SLA_INI_RESTANTE
		");

		return $data;
	}

	public function celula2Triagem()
	{
		$data = DB::select("
		SELECT     T.CHAMADO,
           T.DSC_SISTEMA,
           T.DSC_STATUS_ATUAL,
           T.DSC_PRIORIDADE_CLIENTE,
           round(T.SLA_INI_RESTANTE,2) SLA_INI_RESTANTE,
           T.NOME_CLIENTE,
           t.dsc_fila
	      FROM DSC_VW_PRINCIPAL_PRIME t
	     WHERE t.id_dashboard = 121
	           and t.dsc_fila = 'PS - TRIAGEM2'
               and t.id_status_atual not in ('ED','EC','F','C')
	       order by T.SLA_INI_RESTANTE
		");

		return $data;
	}

	public function celula2Distribuicao()
	{
		$data = DB::select("
		SELECT     T.CHAMADO,
           T.DSC_SISTEMA,
           T.DSC_STATUS_ATUAL,
           T.DSC_PRIORIDADE_CLIENTE,
           round(T.sla_cont_restante,2) sla_cont_restante,
           T.NOME_CLIENTE,
           t.dsc_fila
	      FROM DSC_VW_PRINCIPAL_PRIME t
	     WHERE t.id_dashboard = 121
	           and t.dsc_fila = 'PS - DISTRIBUICAO2'
               and t.id_status_atual not in ('ED','EC','F','C')
	       order by T.SLA_INI_RESTANTE
		");

		return $data;
	}

	public function celulaTriagemCustom()
	{
		$data = DB::select("
		SELECT     T.CHAMADO,
					 T.DSC_SISTEMA,
					 T.DSC_STATUS_ATUAL,
					 T.DSC_PRIORIDADE_CLIENTE,
					 round(T.SLA_INI_RESTANTE,2) SLA_INI_RESTANTE,
					 round(T.sla_cont_restante,2) sla_cont_restante,
					 T.NOME_CLIENTE,
					 t.fila as dsc_fila
				FROM DSC_VW_PRINCIPAL_CUSTOM t
			 WHERE t.id_dashboard = 121
						 and t.fila = 'SER - TRIAGEM'
							 and t.id_status_atual not in ('EC','F','C')
				 order by T.SLA_INI_RESTANTE
		");
		return $data;
	}

		public function celulaDistribuicaoCustom()
		{
			$data = DB::select("
			SELECT     T.CHAMADO,
						 T.DSC_SISTEMA,
						 T.DSC_STATUS_ATUAL,
						 T.DSC_PRIORIDADE_CLIENTE,
						 round(T.SLA_INI_RESTANTE,2) SLA_INI_RESTANTE,
						 round(T.sla_cont_restante,2) sla_cont_restante,
						 T.NOME_CLIENTE,
						 t.fila as dsc_fila
					FROM DSC_VW_PRINCIPAL_CUSTOM t
				 WHERE t.id_dashboard = 121
							 and t.fila = 'SER - DISTRIBUIÇÃO'
								 and t.id_status_atual not in ('EC','F','C')
					 order by T.SLA_INI_RESTANTE
			");
			return $data;
		}

			public function celulaCstTotal()
			{
				$data = DB::select("
				SELECT COUNT(*) AS TOTAL
          FROM DSC_VW_PRINCIPAL_CUSTOM t
         WHERE t.id_dashboard = 121
           and t.fila = 'SER - COORDENAÇÃO'
           and t.id_status_atual not in ('EC', 'F', 'C', 'ATC', 'ED')
				");

		return $data;
	}

	public function celulaCstEwerton()
	{
		$data = DB::select("
		SELECT     T.CHAMADO,
					 T.DSC_SISTEMA,
					 T.DSC_STATUS_ATUAL,
					 T.DSC_PRIORIDADE_CLIENTE,
					 round(T.SLA_INI_RESTANTE,2) SLA_INI_RESTANTE,
					 round(T.sla_cont_restante,2) sla_cont_restante,
					 T.NOME_CLIENTE,
					 t.fila as dsc_fila
				FROM DSC_VW_PRINCIPAL_CUSTOM t
			 WHERE t.id_dashboard = 121
						 and t.fila = 'SER - EWERTON DARIO'
							 and t.id_status_atual not in ('EC','F','C','ATC')
				 order by T.SLA_INI_RESTANTE, sla_cont_restante
		");
		return $data;
	}

	public function celulaCstEmersonCasado()
	{
		$data = DB::select("
		SELECT     T.CHAMADO,
					 T.DSC_SISTEMA,
					 T.DSC_STATUS_ATUAL,
					 T.DSC_PRIORIDADE_CLIENTE,
					 round(T.SLA_INI_RESTANTE,2) SLA_INI_RESTANTE,
					 round(T.sla_cont_restante,2) sla_cont_restante,
					 T.NOME_CLIENTE,
					 t.fila as dsc_fila
				FROM DSC_VW_PRINCIPAL_CUSTOM t
			 WHERE t.id_dashboard = 121
						 and t.fila = 'SER - EMERSON CASADO'
							 and t.id_status_atual not in ('EC','F','C','ATC')
				 order by T.SLA_INI_RESTANTE, sla_cont_restante
		");
		return $data;
	}

	public function celulaCstLucianaDevera()
	{
		$data = DB::select("
		SELECT     T.CHAMADO,
					 T.DSC_SISTEMA,
					 T.DSC_STATUS_ATUAL,
					 T.DSC_PRIORIDADE_CLIENTE,
					 round(T.SLA_INI_RESTANTE,2) SLA_INI_RESTANTE,
					 round(T.sla_cont_restante,2) sla_cont_restante,
					 T.NOME_CLIENTE,
					 t.fila as dsc_fila
				FROM DSC_VW_PRINCIPAL_CUSTOM t
			 WHERE t.id_dashboard = 121
						 and t.fila = 'SER - LUCIANA DEVERA'
							 and t.id_status_atual not in ('EC','F','C','ATC')
				 order by T.SLA_INI_RESTANTE, sla_cont_restante
		");
		return $data;
	}

}
