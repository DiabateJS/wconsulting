<?php 

    
function SaveAffectation($nom_tache,$date,$nom_agent,$description,$etat)
{
   try{
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

            $q= $pdo->prepare("INSERT INTO tache( Nom_de_la_tache,Date_tache,Nom_agent,Description_tache,Etat ) VALUES(".$pdo->quote($nom_tache)." ,".$pdo->quote($date)." , ".$pdo->quote($nom_agent).", ".$pdo->quote($description).", ".$pdo->quote($etat).")");
                
            if($q->execute())
            { 
                $id_user=$pdo->lastinsertid();
                
                if(isset($id_user))
                {
                    $data['id_tache']= $id_user ;  
                  $data['Nom_de_la_tache']= $nom_tache;  
                  $data['Date_tache']= $date ; 
                  $data['Nom_agent']= $nom_agent;  
                  $data['Description_tache']= $description ;  
                  $data['Etat']= $etat ;

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

function DeleteTache($id)
{
   try{
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

            $q= $pdo->prepare("DELETE FROM tache WHERE id_tache=$id");
                
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

function UpdateTache($Etat,$id)
{
   try{
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

            //$q= $pdo->prepare("UPDATE tache SET Nom_de_la_tache=".$pdo->quote($Nom_de_la_tache).",Date_tache=".$pdo->quote($Date_tache).",Nom_agent=".$pdo->quote($Nom_agent).",Description=".$pdo->quote($Description).",Etat=".$pdo->quote($Etat)." WHERE id_tache=$id");
            $q= $pdo->prepare("UPDATE tache SET Etat=".$pdo->quote($Etat)." WHERE id_tache=$id");
                
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

/*function Connexion($email,$password)
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT * FROM user WHERE email=".$pdo->quote($email)."  AND motdepasse=".$pdo->quote($password) );

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages)) 
            {
                
                foreach($messages as $message)
                {  

                  $data['id']= $message->id ;  
                  $data['email']= $message->username ;  
                  $data['password']= $message->motdepasse ;   

                  return $data;
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

}  */


function GetAgent()
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT noms FROM user " );

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages)) 
            {
                
                foreach($messages as $message)
                {  

                   echo " 
                  
                  <option>".  $message->noms ."</option>";
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

function GetAllTaches($nom,$date,$agent,$description,$etat,$id)
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT Nom_de_la_tache,Date_tache,Nom_agent,Description_tache,Etat FROM tache WHERE id_tache=$id " );

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages)) 
            {
                
                foreach($messages as $message)
                {  

                   echo " 
                  
                  <option>".  $message->noms ."</option>";
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

/*function GetUserName($id)
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT noms FROM user WHERE id=$id " );

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages)) 
            {
                
                foreach($messages as $message)
                {  

                   echo "  
                    <tr>
                         
                        <td>".  $message->username ."</td>
                        <td>".  $message->motdepasse ."</td>
                        <td><a class='btn btn-info' href='index.php?Module=User&Action=Delete&id=".  $message->id ."'>delete</a>
                         <a class='btn btn-info' href='index.php?Module=User&Action=Update_Users&id=".  $message->id ."'>update</a></td>


                    </tr>";
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

} */ 


?>