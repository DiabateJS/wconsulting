
<?php 

 
if (isset($Action)) {
    # code...

    switch ($Action) {
      case 'Particulier':
         Particulier();
          break;
    
    case 'SaveEfranc':
           
          
            $result= SaveEfranc($_POST['type1'],$_POST['date1'],$_POST['montant1'],$_POST['description1'] );
           if ($result==false) {
              ErrorPage("Erreur d'Enregistrement" , "une erreur s'est produite lors de votre enregistrement, <a class='already' href='index.php?Module=Efranc&Action=entreeF'>cliquez pour réessayer!</a> ");
           } else {
            
           // $_SESSION['id']=$result['id_ED'];
            /*$_SESSION['type']=$result['type'];
            $_SESSION['date']=$result['date'];
            $_SESSION['montant']=$result['montant'];
            $_SESSION['description']=$result['description'];*/
            RouteToControler("Efranc", "EntreeF");
           }
            break;

            
             case 'Delete':
            
                $id=(isset($_GET['id']))?  $_GET['id'] : false;//C'est une condition "if"
         
                if ($id!=false) {
                     Delete($id);
                } else {
                     echo "jnn" ;//Delete($id);
                }
               
             break; 
             
             case 'List':
                UsersList("");
                 break;


                 case 'Update':
                    
                      Update($_POST['email'],$_POST['identifiant']);
                   
                   /* if ($_POST['password']==$_POST['confirmpassword']) {
          
                        $result= UpdateUser($_POST['email'],$_POST['id'] );
                       if ($result==false) {
                          ErrorPage("Erreur de mises à jour" , "une erreur s'est produite, <a class='already' href='index.php?Module=User&<action=Update_Users'>cliquez pour réessayer!</a> ");
                       } else {

                        RouteToControler("User", "List");
                       }
            
            
                    } else {
                        
                        ErrorPage("Erreur d'Inscription" , "les deux mots de passe saisis doivent être identiques <a class='already' href='index.php?Module=User&<action=SignUp'>cliquez pour réessayer!</a> ");
                       
                       }
                   */
                 break; 
    default:
        # code...
        break;
}} else {
   Particulier();
}
