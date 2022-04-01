<?php 

    
function SaveUser($noms,$email,$password)
{
   try{
            $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));    

            $q= $pdo->prepare("INSERT INTO user( noms,email,motdepasse  ) VALUES(".$pdo->quote($noms)." ,".$pdo->quote($email)." , ".$pdo->quote($password).")");
                
            if($q->execute())
            { 
                $id_user=$pdo->lastinsertid();
                
                if(isset($id_user))
                {
                    $data['Id_agent']= $id_user ;  
                  $data['noms']= $noms; 
                  $data['email']= $email;  
                  $data['password']= $password ;   

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
}  */


function ConnexionLockscreen($password)
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT * FROM user WHERE motdepasse=".$pdo->quote($password) );

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (!empty($messages)) 
            {
                
                foreach($messages as $message)
                {  

                    $data['Id_agent']= $message->Id_agent ;  
                    $data['noms']= $message->noms ;
                    $data['email']= $message->email ;  
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

                  $data['Id_agent']= $message->Id_agent ;  
                  $data['noms']= $message->noms ;
                  $data['email']= $message->email ;  
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



function countEntreDollars()
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT SUM(Montant_ED) as Nbre FROM e_dollars " );

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (!empty($messages)) 
        {
            
            foreach($messages as $message)
            {  
                //$nombre=$message->id_notification;
               echo "  <span class='label label-info pull-right'>". $message->Nbre ."</span>";
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

function countEntreFranc()
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT SUM(Montant_EF) as Nbre FROM e_franc " );

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (!empty($messages)) 
        {
            
            foreach($messages as $message)
            {  
                //$nombre=$message->id_notification;
               echo "  <span class='label label-info pull-right'>". $message->Nbre ."</span>";
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

function countSortieDollars()
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT SUM(Montant_SD) as Nbre FROM s_dollars " );

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (!empty($messages)) 
        {
            
            foreach($messages as $message)
            {  
                //$nombre=$message->id_notification;
               echo "  <span class='label label-success pull-right'>". $message->Nbre ."</span>";
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

function countSortieFranc()
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT SUM(Montant_SF) as Nbre FROM s_franc " );

        $messages = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (!empty($messages)) 
        {
            
            foreach($messages as $message)
            {  
                //$nombre=$message->id_notification;
               echo "  <span class='label label-success pull-right'>". $message->Nbre ."</span>";
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

/*function GetUserList()
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

}  */

function GetUserName($id)
{
            
    try
    {
        $pdo = new PDO(SQL_DSN, SQL_USER, SQL_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));                 

        $stmt = $pdo->query("SELECT noms FROM user WHERE Id_agent=$id " );

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


?>