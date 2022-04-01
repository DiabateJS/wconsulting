
<?php 

 
if (isset($Action)) {
    # code...

switch ($Action) {
    case 'AboutUs':
      AboutUs();
        break;
    
    case 'SaveAffectation':
           
          
            $result= SaveAffectation($_POST['nom'],$_POST['date'],$_POST['agent'],$_POST['description'],$_POST['etat'] );
           if ($result==false) {
              ErrorPage("Erreur d'Enregistrement" , "une erreur s'est produite lors de votre enregistrement, <a class='already' href='index.php?Module=Affectation&Action=Affectation'>cliquez pour réessayer!</a> ");
           } else {
            
           // $_SESSION['id']=$result['id_ED'];
            /*$_SESSION['type']=$result['type'];
            $_SESSION['date']=$result['date'];
            $_SESSION['montant']=$result['montant'];
            $_SESSION['description']=$result['description'];*/
            RouteToControler("Affectation", "Affectation");
           }
            break;

            case 'Update_Tache':
               $id=(isset($_GET['id']))?  $_GET['id'] : false;//C'est une condition "if"
                
                       if ($id!=false) { 
                        TacheListUpdate($id) ;//Delete($id);
                       }
               break;
             case 'Delete':
            
                $id=(isset($_GET['id']))?  $_GET['id'] : false;//C'est une condition "if"
         
                if ($id!=false) {
                  DeleteTach($id);
                } else {
                     echo "jnn" ;//Delete($id);
                }
               
             break; 
             
             case 'List':
                GetAgent("");
                 break;


                 case 'Update':
                    
                  UpdateTach($_POST['etat'],$_POST['id']);
                  RouteToControler("Taches", "Tache");
                   
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
   Affectation();
}
