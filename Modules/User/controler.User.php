
<?php 

 
if (isset($Action)) {
    # code...

switch ($Action) {
    case 'Login':
        Login();
        break;
        case 'Login_admin':
            Login_admin();
            break;
    case 'SignUp':
        SignUp();
        break;
        case 'Lockscreen':
            Lockscreen();
            break;
            
        case 'Update_Users':
            $id=(isset($_GET['id']))?  $_GET['id'] : false;//C'est une condition "if"
             
                    if ($id!=false) { 
                        UsersListUpdate($id) ;//Delete($id);
                    }
            break;
    case 'SaveUser':
           
        if ($_POST['password']==$_POST['confirmpassword']) {
          
            $result= SaveUser($_POST['noms'],$_POST['email'],$_POST['password'] );
           if ($result==false) {
              ErrorPage("Erreur d'Inscription" , "une erreur s'est produite lors de votre inscrption, <a class='already' href='index.php?Module=User&<action=Login'>cliquez pour réessayer!</a> ");
           } else {
            

            $_SESSION['Id_agent']=$result['Id_agent'];
            $_SESSION['email']=$result['email'];
            $_SESSION['noms']=$result['noms'];
            RouteToControler("User", "Login");
           }


        } else {
            
            ErrorPage("Erreur d'Inscription" , "les deux mots de passe saisis doivent être identiques <a class='already' href='index.php?Module=User&Action=SignUp'>cliquez pour réessayer!</a> ");
           
           }
           
            
            break;

            case 'ConnexionLockscreen':
                $result= ConnexionLockscreen($_POST['motdepasse'] );
                if ($result==false) {
                   ErrorPage("Erreur de connexion" , "une erreur s'est produite lors de votre connexion, <a class='already' href='index.php?Module=User&Action=Lockscreen'>cliquez pour réessayer!</a> ");
                } else {
                 
                    $_SESSION['Id_agent']=$result['Id_agent'];
                    $_SESSION['email']=$result['email'];
                    $_SESSION['noms']=$result['noms'];
                    RouteToControler("Home", "Home");
                }

                break;

            case 'Connexion':
                
                $result= Connexion($_POST['email'],$_POST['password'] );
                if ($result==false) {
                   ErrorPage("Erreur de connexion" , "une erreur s'est produite lors de votre connexion, <a class='already' href='index.php?Module=User&Action=Login'>cliquez pour réessayer!</a> ");
                } else {
                 
     
                 $_SESSION['Id_agent']=$result['Id_agent'];
                 $_SESSION['email']=$result['email'];
                 $_SESSION['noms']=$result['noms'];
                 RouteToControler("Home", "Home");
                }

                break;
            case 'Deconnexion':
                    
                    Deconnexion();
                    break;

                    case 'DeconnexionLockScreen':
                        DeconnexionLockScreen();
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
   Login();
}
