<?php 

    function RouteToControler($module, $Action )
    { 
       
       if ( $module!="") {
           # code...
             $controler_file_exist="Modules/".$module."/controler.".$module.".php";

            if ( file_exists($controler_file_exist)==true) 
            {
                include $controler_file_exist;
            }
            else
            {

                Error404();
    
            }
        } else {
//echo "hhh";
            //DEFAULT
            //Login();
         Home();
        }
    
      
    }
    
    