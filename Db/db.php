<?php

function GetVisaDemandInfo($id)
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT * FROM t_visa WHERE id=$id");

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages)) 
            {
                
                foreach($messages as $message)
                {  

                    $data['DOCUMENT_PASSEPORT']=GetDocumentPath( $message->id,TYPE_DOCUMENT_PASSEPORT);
                    $data['DOCUMENT_PASSEPORT_PIC']=GetDocumentPath( $message->id,TYPE_DOCUMENT_PASSEPORT_PIC);
                    $data['DOCUMENT_RESERVATION_HOTE']=GetDocumentPath( $message->id,TYPE_DOCUMENT_RESERVATION_HOTE);
                    $data['DOCUMENT_RESERVATION_DE_VOL']=GetDocumentPath( $message->id,TYPE_DOCUMENT_RESERVATION_DE_VOL);


                    $data['id_visa']= $message->id ; 
                    $data['id_passeport']= $message->id_passeport ; 
                    $data['id_person']=  $message->id_person ;
                    $data['id_user']= $message->id_user;
                     $data['pays_demand']=GetPays( $message->id_pays_demand);

                    $data['nbre_entre']= GetVisaEntreeType($message->nbre_entre) ;  
                   // $data['NombreEntreeEffectue']=GetVisaNombreEntreeEffectue($message->id) ; 
                    $data['id_nbre_entre']= $message->nbre_entre ;  
                    $data['delai']= $message->delai; 
                    $data['visa_type']=  GetVisaType($message->id_visa_type) ; 
                   /* $data['DelaiRestant']=  GetVisaDelaiRestant($message->id) ; 
                    
                    if ($data['DelaiRestant']>0) {

                        $data['visa_status_color']=" text-success";
                        $data['visa_state']="VALIDE";
                    }
                    else{
                        
                        $data['visa_status_color']=" text-danger";

                       $data['visa_state']="VALIDE";;
                    } */
                    $data['id_visa_demand_state']= $message->id_visa_demand_state ; 
                    
                    $data['visa_demand_status']= GetVisaDemandState($message->id_visa_demand_state) ; 

                    if ($message->id_visa_demand_state==1) {

                        $data['visa_demand_status_color']=" text-warning";
                    }
                     if ($message->id_visa_demand_state==2) {

                        $data['visa_demand_status_color']=" text-danger";
                    }
                    else {
                        $data['visa_demand_status_color']=" text-success";
                    }

                    $data['numero_visa']= $message->numero_visa; 

                    $data['passeport']= GetPasseport($message->id_passeport);
                    $data['type_passeport']= GetPasseportTypeByID($message->id_passeport); 
                    $data['person']= GetPerson($message->id_person);  
                    $dataperson= GetPersonInfo($message->id_person);  
                    $data['pays']=$dataperson['pays'];
                    $data['nationalite']= $dataperson['nationalite'];
                    
                    $data['date_start']= $message->date_start;
                    $data['date_expiration']= GetVisaEndDateByDateStart($message->date_start,$message->delai);// $message->date_expiration; 
                    $data['travel_reason']= $message->travel_reason; 
                    $data['travel_financer']= $message->travel_financer; 
                    $data['provincedentree']= $message->provincedentree;
                    $data['provincedestination']= $message->provincedestination;
                    $data['moyen_subsistance']= $message->moyen_subsistance;
                    $data['garant']= $message->garant; 
                    $data['garanttel']= $message->garanttel; 
                    $data['garantemail']= $message->garantemail; 
                    $data['garantadress']= $message->garantadress; 
                          
                    $data['hote']= $message->hote; 
                    $data['hoteemail']= $message->hoteemail;  
                    $data['hotetel']= $message->hotetel;  
                    $data['hoteadress']= $message->hoteadress;  

                  //  $data['accesspoint']= GetAccessPoint($message->id_accesspoint) ; 
                    $data['user']= GetUser($message->id_user);
                    $data['created']= $message->created;
                    $data['date_op']= $message->date_op;

                   
                
                }
                if ( !empty($data['id_visa'])) 
                {
                return $data;
                } 
                else 
                {
                    return false;
                }
            
            } 
            else 
            {
                return false;
            }
                    
    }          
    catch(Exception $e)
    {
        exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }

}  

function GetVisaEndDateByDateStart($date_entre)
{
        
    try
    {
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

    
            $stmt = $pdo->query("SELECT ADDDATE(".$pdo->quote($date_entre).", INTERVAL 30 DAY) AS date_end");
            
            $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages))
            { 
                    foreach($messages as $message)
                    {                
        
                            return $message->date_end ;
                    } 
            } 
            else 
            {
                 return false ;
            }     
    }          
    catch(Exception $e)
    {
    exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }

}

function GetVisaPersonCount($id)
{
        
    try
    {
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

    
            $stmt = $pdo->query("SELECT COUNT(id) AS countvisa FROM t_visa WHERE id_person=$id");
            
            $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages))
            { 
                    foreach($messages as $message)
                    {                
        
                            return $message->countvisa;
                    } 
            } 
            else 
            {
                 return 0 ;
            }     
    }          
    catch(Exception $e)
    {
    exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }

}
 
function GetVisaTypeListoption($id) 
{
    
        try
        { 
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
                                                            
            $stmt = $pdo->query("SELECT DISTINCT id,name FROM t_visa_type ORDER BY id ASC");
            
            $messages = $stmt->fetchAll(PDO::FETCH_OBJ);
 
            foreach($messages as $message)
            {     
                        if ($id==$message->state) {
                         echo "<option selected value=\"$message->id\">" .$message->name."</option>";      
                     } else {
                        echo "<option value=\"$message->id\">" .$message->name."</option>";             
                     }
                   
            } 
        }   
        catch(Exception $e)
        {
            exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
        } 

}
  
function GetVisaType($id_visa_type)
{
        
        try
        {
                $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        
                $stmt = $pdo->query("SELECT name FROM t_visa_type WHERE id=$id_visa_type");
                
                $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

                if (!empty($messages))
                { 
                        foreach($messages as $message)
                        {                 
                                return $message->name;
                        } 
                } 
                else 
                {
                     return false ;
                }     
        }          
        catch(Exception $e)
        {
            exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
        }

}

function GetVisaDelai($id)
{
        
        try
        {
                $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

         
                $stmt = $pdo->query("SELECT  delai AS delai_valid  FROM t_visa WHERE id ='$id' " );
                $messages = $stmt->fetchAll(PDO::FETCH_OBJ);
                    
                if(!empty($messages))
                {
                        foreach($messages as $message)
                        { 
                            $delai_valid= $message->delai_valid; 

                        } 
 
                        return  $delai_valid ; 
                }
                else
                {
                    return false;
                } 
                              
        }          
        catch(Exception $e)
        {
        exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
        }

}
 
function IsVisaValid($id)
{
        
        try
        {
                $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

         
                $stmt = $pdo->query("SELECT DATEDIFF(CURDATE(),date_start) AS delai_restant, DATEDIFF(date_expiration,date_start) AS delai_valid  FROM t_visa WHERE id ='$id' " );
                $messages = $stmt->fetchAll(PDO::FETCH_OBJ);
                    
                if(!empty($messages))
                {
                        foreach($messages as $message)
                        {
                            $delai_valid= $message->delai_valid;
                            $delai_restant= $message->delai_restant; 

                        } 

                        if (  $delai_restant==0) { 

                             return  $delai_restant ;
                        } 
                        else 
                        {

                            return  $delai_restant ;

                        }

                }
                else
                {
                    return false;
                } 
                              
        }          
        catch(Exception $e)
        {
        exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
        }

}

function GetVisaState($id_state)
{
    
    try
    {
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

    
            $stmt = $pdo->query("SELECT name FROM t_visa_state WHERE id=$id_state");
            
            $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages))
            { 
                    foreach($messages as $message)
                    {                 
                            return $message->name ;
                    } 
            } 
            else 
            {
                 return false ;
            }   

    }          
    catch(Exception $e)
    {
    exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }

} 

function GetVisaDemandState($id_state)
{
    
    try
    {
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

    
            $stmt = $pdo->query("SELECT name FROM t_visa_state_demand WHERE id=$id_state");
            
            $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages))
            { 
                    foreach($messages as $message)
                    {                 
                            return $message->name ;
                    } 
            } 
            else 
            {
                 return false ;
            }   

    }          
    catch(Exception $e)
    {
    exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }

} 
 
function Visa_Submit_Demand($id_visa_demand_state,$id_pays_demand,$garant,$garantadress,$garanttel,$garantemail,$hote,$hoteadress,$hotetel,$hoteemail, $id_passeport, $id_person,$travel_reason,$date_entre, $nbre_entre, $provincedestination,$provincedentree,$moyen_subsistance, $travel_financer, $id_user)
{
   try{
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

            $q= $pdo->prepare("INSERT INTO t_visa(id_visa_demand_state,id_pays_demand,garant,garantadress,garanttel,garantemail,hote,hoteadress,hotetel,hoteemail, numero_visa, date_op,id_visa_type,  id_passeport,  id_person ,id_visa_state,travel_reason,date_start, delai,nbre_entre, provincedestination,provincedentree,moyen_subsistance,travel_financer, id_user  ) VALUES($id_visa_demand_state,$id_pays_demand,".$pdo->quote($garant)." , ".$pdo->quote($garantadress)." , ".$pdo->quote($garanttel)." , ".$pdo->quote($garantemail).",".$pdo->quote($hote)." , ".$pdo->quote($hoteadress)." , ".$pdo->quote($hotetel)." , ".$pdo->quote($hoteemail).",0,NOW(),1 ,". $pdo->quote($id_passeport) .",". $pdo->quote($id_person) ." ,1 , ".$pdo->quote($travel_reason)." , ".$pdo->quote($date_entre) ." , 30, ".$pdo->quote($nbre_entre) ." , ".$pdo->quote($provincedestination) ." , ".$pdo->quote($provincedentree) ." , ".$pdo->quote($moyen_subsistance ) .", ".$pdo->quote($travel_financer) .", $id_user )");
                
            if($q->execute())
            { 
                $visa=$pdo->lastinsertid();
                
                if(isset($visa))
                {
                    return $visa;
                }
                else 
                {
                    return false;
                } 
                   
            }
            else 
            {
                return false;
            }

    } 
    catch (Exception $e) {
        exit("<b>catched exception at line " . $e->getLine() . " :</b> " . $e->getMessage());
    }
}                       
 
function Visa_Document_Add($file_path,$type_document,$id_visa)
{
   try{
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

            $q= $pdo->prepare("INSERT INTO t_document(id_visa,path,id_doc_type  ) VALUES($id_visa,".$pdo->quote($file_path)." , ".$pdo->quote($type_document).")");
                
            if($q->execute())
            { 
                
                    return true;
                   
            }
            else 
            {
                return false;
            }

    } 
    catch (Exception $e) {
        exit("<b>catched exception at line " . $e->getLine() . " :</b> " . $e->getMessage());
    }
}   

function Visa_Demand_State_Update($id_visa,$id_visa_demand_state ) {
     
    $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

    $q= $pdo->prepare("UPDATE  t_visa SET id_visa_demand_state=".$pdo->quote($id_visa_demand_state)."   WHERE id=$id_visa");
   
    if($q->execute())
    {  
            return true;     
    }
    else {
        return false;
    }
}           
  

function GetVisaListOption($id)
{
    try
    { 
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
                                                        
        $stmt = $pdo->query("SELECT id, nom, prenom FROM visa  ");
        
        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach($messages as $message)
        {  
                  if ($id=="$message->id") {
                     
                        echo "<option selected value=\"$message->id\">".$message->nom." ".$message->prenom."</option>";      
                      
                  } 
                  else 
                  {    
                        echo "<option value=\"$message->id\">".$message->nom." ".$message->prenom."</option>";      
                     
                  }
             
        } 
    }   
    catch(Exception $e)
    {
        exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
}

function GetVisaExistList($nom,$postnom,$prenom,$datenaiss,$sexe,$email,$tel,$nationality){ 
   
    try
    { 
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    
        
        $stmt = $pdo->query("SELECT t_person.id AS ID,t_person.nom,t_person.postnom ,t_person.prenom ,t_person.tel , t_nationalite.name AS name_nationalite FROM t_person,t_nationalite WHERE datenaiss=".$pdo->quote($datenaiss)." AND email=".$pdo->quote($email)." AND tel=".$pdo->quote($tel)." AND id_nationalite=".$pdo->quote($nationality)." AND  sexe=".$pdo->quote($sexe)." AND  nom=".$pdo->quote($nom)." AND postnom=".$pdo->quote($postnom)." AND prenom".$pdo->quote($prenom)." AND t_person.id_nationalite=t_nationalite.id_nationalite  ORDER BY t_person.nom ASC");
       
        $messages = $stmt->fetchAll(PDO::FETCH_OBJ); 
         
        if (!empty($messages)) 
        { 
            foreach($messages as $message)
            {   
               $data['id']= $message->ID ; 
               echo "  
               <tr>
                   <td>
                       <b class='text-dark '>".$message->nom." ".$message->postnom." ".$message->prenom."</b>
                   </td>
                   <td>
                       <input type='hidden'  value='".$message->ID."' class='text-dark input_id_selected_person_insearchlist'/>
                       <input type='submit'  class='text-dark btn btn-dark bt_selected_person_insearchlist' value='select'/>
                   </td>
               </tr>";
            }

            if ( !empty($data['id'])) 
            {
              return $data;
            } 
            else 
            {
               return false;
            }
          
        } 
        else 
        {
            $stmt = $pdo->query("SELECT t_person.id AS ID,t_person.nom,t_person.postnom ,t_person.prenom ,t_person.tel , t_nationalite.name AS name_nationalite FROM t_person,t_nationalite WHERE datenaiss=".$pdo->quote($datenaiss)." AND id_nationalite=".$pdo->quote($nationality)." AND  sexe=".$pdo->quote($sexe)." AND  nom=".$pdo->quote($nom)." AND postnom=".$pdo->quote($postnom)." AND prenom".$pdo->quote($prenom)." AND t_person.id_nationalite=t_nationalite.id_nationalite  OR  ( email=".$pdo->quote($email)." OR tel=".$pdo->quote($tel).") ORDER BY t_person.nom ASC");
       
            $messages = $stmt->fetchAll(PDO::FETCH_OBJ); 
             
            if (!empty($messages)) 
            { 
                foreach($messages as $message)
                {   
                   $data['id']= $message->ID ; 
                   echo "  
                   <tr>
                       <td>
                           <b class='text-dark '>".$message->nom." ".$message->postnom." ".$message->prenom."</b>
                       </td>
                       <td>
                           <input type='hidden'  value='".$message->ID."' class='text-dark input_id_selected_person_insearchlist'/>
                           <input type='submit'  class='text-dark btn btn-dark bt_selected_person_insearchlist' value='select'/>
                       </td>
                   </tr>";
                }
    
                if ( !empty($data['id'])) 
                {
                  return $data;
                } 
                else 
                {
                   return false;
                }
              
            } 
            else 
            {
               return false;
            }
        }
            
    } 
    catch (Exception $e) {
        exit("<b>catched exception at line " . $e->getLine() . " :</b> " . $e->getMessage());
    }
}

 function GetVisaDemandListByUser($id_user)
 {
    try{

            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

           
               $stmt = $pdo->query("SELECT delai,id_nationalite,t_visa.id_accesspoint,t_visa.id AS ID,id_visa_demand_state,numero_visa, id_person,id_passeport  , id_visa_demand_state,travel_reason,id_visa_type, numero_visa, date_start, date_op FROM t_visa , t_person WHERE t_person.id=t_visa.id_person AND t_visa.id_user=$id_user  ORDER BY t_visa.id ASC");
    
           
       // $fichier = fopen('fpdf/Print/datapersonnel.txt', 'w+');

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);
 
            foreach ($messages as $message) {
                 
                //fwrite($fichier, "$message->nom"." "."$message->postnom"." "."$message->prenom".';'."$message->tel".';'."$message->poste".';'."$message->paie"."\n");
                                   
                echo
                "<tr>
                    
                        
                        <td>".GetPerson($message->id_person)."</td> 
                        <td>  <span   class=' font-weight-light '> ". GetNationalite($message->id_nationalite)."</span> </td> 
                         <td>" . $message->date_start."</td>  
                        <td> <span class='text-info'>" . $message->delai." Jours </span></td>";

                        if($message->id_visa_demand_state==1)
                        {
                            echo
                            "<td> <span class='text-warning'>" . GetVisaDemandState($message->id_visa_demand_state)."</span></td>"; 
                        }
                        elseif($message->id_visa_demand_state==2)
                        {
                            echo
                            "<span> <span class='text-danger'>" . GetVisaDemandState($message->id_visa_demand_state)."</span></td>"; 
                        }
                        else {
                            echo
                            "<td > <span class='text-success'>" . GetVisaDemandState($message->id_visa_demand_state)."</span></td>";
                        } 

                        echo
                        " 
                        <td>" . $message->travel_reason."</td>
            
                        <td>
                                                
                                                </td>
                </tr>  
                 ";
            }
         
    } 
    catch (Exception $e) {
        exit("<b>catched exception at line " . $e->getLine() . " :</b> " . $e->getMessage());
    }
}

function IsAttributedVisaNumber( $numero_visa){ 
   
    try
    { 
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    
        
        //$stmt = $pdo->query("SELECT t_passeport.id AS ID,t_person.nom,t_person.postnom ,t_person.prenom , t_nationalite.name AS name_nationalite FROM t_person,t_nationalite,t_passeport WHERE datenaiss=".$pdo->quote($datenaiss)." AND email=".$pdo->quote($email)." AND tel=".$pdo->quote($tel)." AND id_nationalite=".$pdo->quote($nationality)." AND  sexe=".$pdo->quote($sexe)." AND  nom=".$pdo->quote($nom)." AND postnom=".$pdo->quote($postnom)." AND prenom".$pdo->quote($prenom)." AND t_person.id_nationalite=t_nationalite.id_nationalite  ORDER BY t_person.nom ASC");
        $stmt = $pdo->query("SELECT id_person, id AS ID,numero_visa FROM t_visa WHERE numero_visa=".$pdo->quote($numero_visa)."  ORDER BY numero_visa ASC");
       
        $messages = $stmt->fetchAll(PDO::FETCH_OBJ); 
         
        if (!empty($messages)) 
        { 
            foreach($messages as $message)
            {  

               $data['id_visa']= $message->ID ; 
               $data['person']= GetPerson($message->id_person); 
               $data['id_person']= $message->id_person ; 
            }
 

                if ( !empty($data['id_visa']) ) 
                { 
                        return $data;  
                } 
                else 
                {
                    return false;
                }
            
          
        } 
        else 
        { 
           return false; 
        }
            
    } 
    catch (Exception $e) {
        exit("<b>catched exception at line " . $e->getLine() . " :</b> " . $e->getMessage());
    }
}

function IsAttributedVisaNumberByID( $id_visa){ 
   
    try
    { 
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    
        
        //$stmt = $pdo->query("SELECT t_passeport.id AS ID,t_person.nom,t_person.postnom ,t_person.prenom , t_nationalite.name AS name_nationalite FROM t_person,t_nationalite,t_passeport WHERE datenaiss=".$pdo->quote($datenaiss)." AND email=".$pdo->quote($email)." AND tel=".$pdo->quote($tel)." AND id_nationalite=".$pdo->quote($nationality)." AND  sexe=".$pdo->quote($sexe)." AND  nom=".$pdo->quote($nom)." AND postnom=".$pdo->quote($postnom)." AND prenom".$pdo->quote($prenom)." AND t_person.id_nationalite=t_nationalite.id_nationalite  ORDER BY t_person.nom ASC");
        $stmt = $pdo->query("SELECT id_person, id AS ID,numero_visa FROM t_visa WHERE id=".$pdo->quote($id_visa)."  ORDER BY numero_visa ASC");
       
        $messages = $stmt->fetchAll(PDO::FETCH_OBJ); 
         
        if (!empty($messages)) 
        { 
            foreach($messages as $message)
            {  

               $data['id_visa']= $message->ID ; 
               $data['person']= GetPerson($message->id_person); 
               $data['id_person']= $message->id_person ; 
            }
 

                if ( !empty($data['id_visa']) ) 
                { 
                        return $data;  
                } 
                else 
                {
                    return false;
                }
            
          
        } 
        else 
        { 
           return false; 
        }
            
    } 
    catch (Exception $e) {
        exit("<b>catched exception at line " . $e->getLine() . " :</b> " . $e->getMessage());
    }
}

function IsAttributedVisaNumberPerson($id_person, $numero_visa){ 
  
    try
    { 
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    
        
        //$stmt = $pdo->query("SELECT t_passeport.id AS ID,t_person.nom,t_person.postnom ,t_person.prenom , t_nationalite.name AS name_nationalite FROM t_person,t_nationalite,t_passeport WHERE datenaiss=".$pdo->quote($datenaiss)." AND email=".$pdo->quote($email)." AND tel=".$pdo->quote($tel)." AND id_nationalite=".$pdo->quote($nationality)." AND  sexe=".$pdo->quote($sexe)." AND  nom=".$pdo->quote($nom)." AND postnom=".$pdo->quote($postnom)." AND prenom".$pdo->quote($prenom)." AND t_person.id_nationalite=t_nationalite.id_nationalite  ORDER BY t_person.nom ASC");
        $stmt = $pdo->query("SELECT id_person, id AS ID,numero_visa FROM t_visa WHERE id_person=".$pdo->quote($id_person)." AND numero_visa=".$pdo->quote($numero_visa)."  ORDER BY numero_visa ASC");
       
        $messages = $stmt->fetchAll(PDO::FETCH_OBJ); 
         
        if (!empty($messages)) 
        { 
            foreach($messages as $message)
            {  

               $data['id_visa']= $message->ID ; 
               $data['person']= GetPerson($message->id_person); 
               $data['id_person']= $message->id_person ;
                
            }

             
            if ( !empty($data['id_visa']) ) 
            { 
                    return $data;  
            } 
            else 
            {
                return false;
            } 
          
        } 
        else 
        { 
           return false; 
        }
            
    } 
    catch (Exception $e) {
        exit("<b>catched exception at line " . $e->getLine() . " :</b> " . $e->getMessage());
    }
}

function GetVisaEntreeType($id)
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT name FROM t_visa_entree_type WHERE id=$id");

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages)) 
            {
                
                foreach($messages as $message)
                {  

                  return $message->name ;   

                }
                 
            
            } 
            else 
            {
                return false;
            }
                    
    }          
    catch(Exception $e)
    {
        exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }

}  

function GetVisaEntryTypeListoption($id_entree_type)
{
    try
    { 
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
                                                        
        $stmt = $pdo->query("SELECT id, name FROM t_visa_entree_type ORDER BY id ASC  ");
        
        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach($messages as $message)
        {  
                  if ($id_entree_type=="$message->id") {
                     
                        echo "<option selected value=\"$message->id\">".$message->name."</option>";      
                      
                  } 
                  else 
                  {    
                        echo "<option value=\"$message->id\">".$message->name."</option>";       
                     
                  }
             
        } 
    }   
    catch(Exception $e)
    {
        exit('<b>catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
}

?>