
<?php 

 
if (isset($Action)) {
    # code...

switch ($Action) {
    case 'Entreprise':
        Entreprise();
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
                GetEDollarsList("");
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
    Entreprise();
}
