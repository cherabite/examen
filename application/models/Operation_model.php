<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Operation_model extends CI_Model {
	
	
public function __construct()
    {
      parent::__construct();
	 
	 
    }
  
        function getAlleleves(){
			 $base_helper= $this->load->database('default', TRUE);
			  $sql = "SELECT IANNEXE, IANNEEINS, INSEQ, DNS, PRENOM, NOM,  NCENTRE, NOMCENTRE, WILAYAC, NSALLE,  ICODE, PRESUME, ORDREC FROM convocation14
				           
						order by ICODE,ORDREC  ";
                        $query = $base_helper->query($sql);
                        if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close(); 
		}
       function getIcode_by_centre($centre_de){
	                       $base_helper= $this->load->database('default', TRUE);
						// $connected = $base_helper->initialize();
						
                        $sql = "SELECT  DISTINCT ICODE,NIVEAU,FILIERE FROM convocation14 
						where NCENTRE = ?
						order by ICODE  ";
                        $query = $base_helper->query($sql,$centre_de);
                        if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close(); 
        } 
		function update_conv (){
			  $base_helper= $this->load->database('default',true);
			 $base_helper->query("UPDATE convocation14 SET STATUT=".$data['statut']." WHERE IANNEXE=".$param['ANNEXE']." AND IANNEEINS=".$param['ANNEEINS']." AND  INSEQ=".$param['NSEQ']." ");
		return true;
		}
		function form_niv($param){
	                       $base_helper= $this->load->database('default', TRUE);
						// $connected = $base_helper->initialize();
						
                         $sql = "SELECT IANNEXE, IANNEEINS, INSEQ, DNS, PRENOM, NOM,  NCENTRE, NOMCENTRE, WILAYAC, NSALLE,  ICODE, PRESUME, ORDREC FROM convocation14
				             WHERE ICODE = ?   ORDER BY NCENTRE   "; 
                        $query = $base_helper->query($sql,$param['ICODE']);
                        if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close(); 
        }
		function form_sais_abs($param){
	                       $base_helper= $this->load->database('default', TRUE);
						// $connected = $base_helper->initialize();
						
                         $sql = "SELECT IANNEXE, IANNEEINS, INSEQ, DNS, PRENOM, NOM,  NCENTRE, NOMCENTRE, WILAYAC, NSALLE,  ICODE, PRESUME, ORDREC ,STATUT FROM convocation14
				             WHERE ICODE = ? AND ORDREC >= ?  ORDER BY NCENTRE ,ORDREC ASC limit 100  "; 
                        $query = $base_helper->query($sql,array($param['ICODE'],$param['ORDREC']));
                        if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close(); 
        }
        function getIcode(){
	                       $base_helper= $this->load->database('default', TRUE);
						// $connected = $base_helper->initialize();
						
                        $sql = "SELECT  DISTINCT ICODE,NIVEAU,FILIERE FROM convocation14 order by ICODE  ";
                        $query = $base_helper->query($sql);
                        if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close(); 
 }
	public function getCodecwefd()
	{
		     
                        $base_helper= $this->load->database('default', TRUE);
						// $connected = $base_helper->initialize();
						
                        $sql = "SELECT  DISTINCT IANNEXE FROM convocation14  ";
                        $query = $base_helper->query($sql);
                        if ($query ->num_rows() > 0 ) {
                            $data = $query->first_row();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close();
	}
	function form_centre_d_code($param){
		$base_helper= $this->load->database('default', TRUE);
			
                 $sql = "SELECT  IANNEXE, IANNEEINS, INSEQ, DNS, PRENOM, NOM,  NCENTRE, NOMCENTRE, WILAYAC, NSALLE,  ICODE, PRESUME, ORDREC ,STATUT FROM convocation14
				 WHERE NCENTRE = ? and ICODE = ?  ORDER BY ORDREC "; 
                 $query= $base_helper->query($sql, array($param['NCENTRE'],$param['ICODE'])); 								      
				 if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
			$query ->free_result();
		   $base_helper->close();
	}
	public function getCentre_deroulement()
	{
                        $base_helper= $this->load->database('default', TRUE);
                        $sql = "SELECT  DISTINCT NCENTRE,NOMCENTRE  FROM convocation14 order by NCENTRE  ";
                        $query = $base_helper->query($sql);
                        if ($query ->num_rows() > 0 ) {
                            $data = $query->result();               
                             return $data;                             
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close();
	}
	public function getNiveauByicode($icode)
	{
		    $base_helper  =  $this->load->database('default', TRUE); 
		    $base_helper -> select('ICODE,NIVEAU,FILIERE');
			$base_helper -> from('classes');
            $base_helper -> where('ICODE',$icode);
			
        	$query       = $base_helper->get();
            if ($query->num_rows() > 0) {
		            return $query->first_row();
		  	
              }else{
				return false;	
			}
		 $query ->free_result();    
	     $base_helper->close(); 
		
	}
	public function getCentre_deroulement_icode($icode)
	{
                        $base_helper= $this->load->database('default', TRUE);
                        $sql = "SELECT  DISTINCT NCENTRE,NOMCENTRE  FROM convocation14  where ICODE=? order by NCENTRE  ";
                        $query = $base_helper->query($sql,$icode);
                        if ($query ->num_rows() > 0 ) {
                            $data = $query->result();               
                             return $data;                             
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close();
	}
	public function getCount_eleve_centre_icode($param)
	{
                        $base_helper= $this->load->database('default', TRUE);
                        $sql = "SELECT  COUNT( IANNEXE ) AS NBR   FROM convocation14  where ICODE=? and  NCENTRE=?  ";
                        $query = $base_helper->query($sql,array($param['ICODE'],$param['NCENTRE']));
                        if ($query ->num_rows() > 0 ) {
                            $data = $query->row();               
                             return $data;                             
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close();
	}
		public function form_centre_d($param){
		
			 $base_helper= $this->load->database('default', TRUE);
			
                 $sql = "SELECT IANNEXE, IANNEEINS, INSEQ, DNS, PRENOM, NOM,  NCENTRE, NOMCENTRE, WILAYAC, NSALLE,  ICODE, PRESUME, ORDREC FROM convocation14
				 WHERE NCENTRE= ?  order by ICODE ASC  "; 
                 $query= $base_helper->query($sql, array($param['NCENTRE'])); 								      
				 if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
			$query ->free_result();
		   $base_helper->close(); 
	}
	public function form_matr($param){
		
			 $base_helper= $this->load->database('default', TRUE);
			
                 $sql = "SELECT IANNEXE, IANNEEINS, INSEQ, DNS, PRENOM, NOM,  NCENTRE, NOMCENTRE, WILAYAC, NSALLE,  ICODE, PRESUME, ORDREC FROM convocation14
				 WHERE IANNEXE= ? AND IANNEEINS = ? AND  INSEQ= ?  "; 
                 $query= $base_helper->query($sql, array($param['ANNEXE'],$param['ANNEEINS'],$param['NSEQ'])); 								      
				 if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
			$query ->free_result();
		   $base_helper->close(); 
	}
		public function form_mom($param){
		
			 $base_helper= $this->load->database('default', TRUE);
			
                 $sql = "SELECT IANNEXE, IANNEEINS, INSEQ, DNS, PRENOM, NOM,  NCENTRE, NOMCENTRE, WILAYAC, NSALLE,  ICODE, PRESUME, ORDREC FROM convocation14
				 WHERE NOM= ? AND PRENOM = ?  "; 
                 $query= $base_helper->query($sql, array($param['NOM'],$param['PRENOM'])); 								      
				 if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
			$query ->free_result();
		   $base_helper->close(); 
	}
		public function form_dns($param){
		     $base_helper= $this->load->database('default', TRUE);
        	if($param['PRESUME'] == 1){
			     $DNS=substr($param['DNS'], 0, 4);
                 $sql = "SELECT IANNEXE, IANNEEINS, INSEQ, DNS,LNS, PRENOM, NOM, ADRESSE, NCENTRE, NOMCENTRE, ADDCENTRE, NSALLE, NIVEAU, CLANNEXE, ICODE, FILIERE, CATEGORIE, IANNEE, COMMUNEC, DAIRAC, WILAYAC,PRESUME, ORDREC  FROM convocation14
				WHERE  DNS like ? AND PRESUME = ? "; 
                 $query= $base_helper->query($sql,array($DNS.'%',$param['PRESUME'])); 								      
			}else{
                 $sql = "SELECT IANNEXE, IANNEEINS, INSEQ, DNS,LNS, PRENOM, NOM, ADRESSE, NCENTRE, NOMCENTRE, ADDCENTRE, NSALLE, NIVEAU, CLANNEXE, ICODE, FILIERE, CATEGORIE, IANNEE, COMMUNEC, DAIRAC, WILAYAC,PRESUME, ORDREC  FROM convocation14
				 WHERE  DNS = ?  AND PRESUME = ? "; 
                 $query= $base_helper->query($sql, array($param['DNS'],$param['PRESUME']));
			}
			     if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
			$query ->free_result();
		   $base_helper->close();  
	}
	public function table_stat_total(){
		 $base_helper= $this->load->database('default', TRUE);
		   $sql="SELECT  ICODE AS CODE, COUNT( IANNEXE ) AS SOM 
			                from convocation14
							GROUP BY ICODE ";
                            
							
							 $query= $base_helper->query($sql);
							 if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
			$query ->free_result();
		   $base_helper->close();
	}
	
	public function table_stat_centre(){
		 $base_helper= $this->load->database('default', TRUE);
		    $sql="SELECT  NCENTRE, NOMCENTRE, COUNT( IF( ICODE =  '104', ORDREC, NULL ) ) AS a,COUNT( IF( ICODE =  '204', ORDREC, NULL ) ) AS b,COUNT( IF( ICODE =  '304', ORDREC, NULL ) ) AS c  
							,COUNT( IF( ICODE =  '404', ORDREC, NULL ) ) AS d,COUNT( IF( ICODE =  '122', ORDREC, NULL ) ) AS e,COUNT( IF( ICODE =  '124', ORDREC, NULL ) ) AS f
							,COUNT( IF( ICODE =  '212', ORDREC, NULL ) ) AS g,COUNT( IF( ICODE =  '213', ORDREC, NULL ) ) AS h,COUNT( IF( ICODE =  '214', ORDREC, NULL ) ) AS i,COUNT( IF( ICODE =  '215', ORDREC, NULL ) ) AS ii,COUNT( IF( ICODE =  '216', ORDREC, NULL ) ) AS j,COUNT( IF( ICODE =  '218', ORDREC, NULL ) ) AS k,COUNT( IF( ICODE =  '237', ORDREC, NULL ) ) AS l,COUNT( IF( ICODE =  '251', ORDREC, NULL ) ) AS l1,COUNT( IF( ICODE =  '253', ORDREC, NULL ) ) AS l2,COUNT( IF( ICODE =  '255', ORDREC, NULL ) ) AS l3,COUNT( IF( ICODE =  '255', ORDREC, NULL ) ) AS l4
							,COUNT( IF( ICODE =  '312', ORDREC, NULL ) ) AS m,COUNT( IF( ICODE =  '313', ORDREC, NULL ) ) AS n,COUNT( IF( ICODE =  '314', ORDREC, NULL ) ) AS o,COUNT( IF( ICODE =  '315', ORDREC, NULL ) ) AS o1,COUNT( IF( ICODE =  '316', ORDREC, NULL ) ) AS p,COUNT( IF( ICODE =  '318', ORDREC, NULL ) ) AS q,COUNT( IF( ICODE =  '337', ORDREC, NULL ) ) AS r
							,COUNT( IF( ICODE =  '351', ORDREC, NULL ) ) AS s,COUNT( IF( ICODE =  '353', ORDREC, NULL ) ) AS t,COUNT( IF( ICODE =  '355', ORDREC, NULL ) ) AS v,COUNT( IF( ICODE =  '357', ORDREC, NULL ) ) AS w
			                from convocation14
							GROUP BY NCENTRE ";
                            
							
							 $query= $base_helper->query($sql);
							 if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
			$query ->free_result();
		   $base_helper->close();
	}
	public function stat_abs(){
		 $base_helper= $this->load->database('default', TRUE);
		    $sql="SELECT  ICODE,COUNT(ICODE ) AS som ,COUNT( IF( STATUT =  '0', ORDREC, NULL ) ) AS a,COUNT( IF( STATUT =  '1', ORDREC, NULL ) ) AS b,COUNT( IF( STATUT =  '2', ORDREC, NULL ) ) AS c  ,COUNT( IF( STATUT =  '3', ORDREC, NULL ) ) AS d
							  
							  from convocation14
							   GROUP BY ICODE
							   ORDER BY ICODE ";
                            
							
							 $query= $base_helper->query($sql);
							 if ($query ->num_rows() > 0 ) {
                            $data = $query->result();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
			$query ->free_result();
		   $base_helper->close();
	}
	
	
	public function enpr($param){
		   $CODE_cwefd  =  $param['ANNEXE']; 
			$b           ='scolarite'.$CODE_cwefd ;		
			$base_sco    = $this->load   -> database($b, TRUE);	
			
			 $anneeins= $this->config->item('anneeins');

        	if($param['PRESUME'] == 1){
			     $DNS=substr($param['DNS'], 0, 4);
                 $sql = "SELECT IANNEXE, IANNEEINS, INSEQ FROM inscription
				 WHERE NPR= ? AND IANNEE = ? AND DNS like ? AND PRESUME = ? "; 
                 $e= $base_sco->query($sql, array($param['enpr'], $anneeins,$DNS.'%',$param['PRESUME'])); 								      
			}else{
                 $sql = " SELECT  IANNEXE, IANNEEINS, INSEQ  FROM inscription
				 WHERE NPR= ? AND  IANNEE = ? AND DNS = ?  AND PRESUME = ? "; 
                 $e= $base_sco->query($sql, array($param['enpr'], $anneeins,$param['DNS'],$param['PRESUME']));
			}
			    $eleve = $e->first_row();
				if ($eleve) {	
				          $sql1 = "SELECT IANNEXE, IANNEEINS, INSEQ, DNS,LNS, PRENOM, NOM, ADRESSE, NCENTRE, NOMCENTRE, ADDCENTRE, NSALLE, NIVEAU, CLANNEXE, ICODE, FILIERE, CATEGORIE, IANNEE, COMMUNEC, DAIRAC, WILAYAC,PRESUME, ORDREC,sortie  FROM convocation14
				             WHERE IANNEXE= ? AND IANNEEINS = ? AND  INSEQ= ? AND IANNEE = ?  "; 
                         $e2= $base_sco->query($sql1, array($eleve->IANNEXE,$eleve->IANNEEINS,$eleve->INSEQ, $anneeins,));
			
				 $eleve1 = $e2->first_row();
					if ($eleve1) {
	
						 $base_sco->query("UPDATE convocation14 SET sortie=1 WHERE IANNEXE=".$eleve1->IANNEXE." AND IANNEEINS=".$eleve1->IANNEEINS." AND  INSEQ=".$eleve1->INSEQ." ");
					return $eleve1;
					}else{
					return false;	
					}
				}else{
				    return false;
				   
				}
			$e ->free_result();
		   $base_sco->close(); 
	}
	public function get_program($icode){
		               $base_helper= $this->load->database('default', TRUE);
                        $sql = "SELECT  p.m1, p.m2, p.m3, p.m4, c.NIVEAU,c.FILIERE  
						FROM program_examen p,classes c 
						where p.icode = ? and   p.icode=c.ICODE   ";
                        $query = $base_helper->query($sql,$icode);
                        if ($query ->num_rows() > 0 ) {
                            $data =$query->row();
                 
                             return $data;
                              
                            }else{
							return false;	
							}
                      $query ->free_result();
                     $base_helper->close();
	}
	public function statistiq(){
		$data=array();
		 $this->load->dbutil();
		$cwefds=$this->getCodecwefd();
		if ($cwefds) {
													
			foreach ($cwefds as $cwefd){
			         $b           ='scolarite'.$cwefd->CODE_CWEFD ;		
			//   echo   '  <script language="javascript">alert("bonjour");</script>';
			 echo $b;
			if ( $this->dbutil->database_exists($b)){
				 echo $b;
					       $base_sco    = $this->load   -> database($b, TRUE);
						   $tableName='convocation14';
						//   $a= $this->validateTable($base_sco,$tableName) ;
					//	if($a=='0'){
							$sql="SELECT  CLANNEXE, COUNT( IF( ICODE =  '104', ORDREC, NULL ) ) AS a,COUNT( IF( ICODE =  '204', ORDREC, NULL ) ) AS b,COUNT( IF( ICODE =  '304', ORDREC, NULL ) ) AS c  
							,COUNT( IF( ICODE =  '404', ORDREC, NULL ) ) AS d,COUNT( IF( ICODE =  '122', ORDREC, NULL ) ) AS e,COUNT( IF( ICODE =  '124', ORDREC, NULL ) ) AS f
							,COUNT( IF( ICODE =  '212', ORDREC, NULL ) ) AS g,COUNT( IF( ICODE =  '213', ORDREC, NULL ) ) AS h,COUNT( IF( ICODE =  '214', ORDREC, NULL ) ) AS i,COUNT( IF( ICODE =  '215', ORDREC, NULL ) ) AS ii,COUNT( IF( ICODE =  '216', ORDREC, NULL ) ) AS j,COUNT( IF( ICODE =  '218', ORDREC, NULL ) ) AS k,COUNT( IF( ICODE =  '237', ORDREC, NULL ) ) AS l,COUNT( IF( ICODE =  '251', ORDREC, NULL ) ) AS l1,COUNT( IF( ICODE =  '253', ORDREC, NULL ) ) AS l2,COUNT( IF( ICODE =  '255', ORDREC, NULL ) ) AS l3,COUNT( IF( ICODE =  '255', ORDREC, NULL ) ) AS l4
							,COUNT( IF( ICODE =  '312', ORDREC, NULL ) ) AS m,COUNT( IF( ICODE =  '313', ORDREC, NULL ) ) AS n,COUNT( IF( ICODE =  '314', ORDREC, NULL ) ) AS o,COUNT( IF( ICODE =  '315', ORDREC, NULL ) ) AS o1,COUNT( IF( ICODE =  '316', ORDREC, NULL ) ) AS p,COUNT( IF( ICODE =  '318', ORDREC, NULL ) ) AS q,COUNT( IF( ICODE =  '337', ORDREC, NULL ) ) AS r
							,COUNT( IF( ICODE =  '351', ORDREC, NULL ) ) AS s,COUNT( IF( ICODE =  '353', ORDREC, NULL ) ) AS t,COUNT( IF( ICODE =  '355', ORDREC, NULL ) ) AS v,COUNT( IF( ICODE =  '357', ORDREC, NULL ) ) AS w
							from convocation14 
							";	
							$res_stat= $base_sco->query($sql);
							if($res_stat->num_rows()>0){
								$row1 = $res_stat->first_row();
								$data[]=array('result' => $row1  );	
								
					      }
						//}
					
			  }
			  
		    }
			return $data;
     	}
	}
	
	
	function validateTable($db,$tableName)
    {
        $result = $db->list_tables();

        foreach( $result as $row ) {
            if( $row == $tableName )    return '1';
        }
        return '0';
    }
}			
	 