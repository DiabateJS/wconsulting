<?php 

    
function SaveSfranc($type,$date,$montant,$description)
{
   try{
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

            $q= $pdo->prepare("INSERT INTO s_franc( Type_SF,Date_SF,Montant_SF,Description_SF  ) VALUES(".$pdo->quote($type)." ,".$pdo->quote($date)." , ".$pdo->quote($montant).", ".$pdo->quote($description).")");
                
            if($q->execute())
            { 
                $id_user=$pdo->lastinsertid();
                
                if(isset($id_user))
                {
                    $data['id_SF']= $id_user ;  
                  $data['Type_SF']= $type;  
                  $data['Date_SF']= $date ; 
                  $data['Montant_SF']= $montant;  
                  $data['Description_SF']= $description ;  

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

/*function DeleteUser($id)
{
   try{
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

            $q= $pdo->prepare("DELETE FROM users WHERE id=$id");
                
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

function UpdateUser($username,$id)
{
   try{
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

            $q= $pdo->prepare("UPDATE users SET username=".$pdo->quote($username)." WHERE id=$id");
                
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

function Connexion($email,$password)
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

}  


function GetUserList()
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT * FROM users " );

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

}  

function GetUserName($id)
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