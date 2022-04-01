<?php 

include_once 'Config/init.php'; 

if (isset($_GET['Module']) && isset($_GET['Action'])) {

    # code...
        $Module=ucfirst($_GET['Module']);
        $Action=ucfirst($_GET['Action']);

        

        RouteToControler($Module, $Action);

} 
else if (isset($_POST['Module']) && isset($_POST['Action'])) {
  
                # code...
        $Module=ucfirst($_POST['Module']);
        $Action=ucfirst($_POST['Action']);

        RouteToControler($Module, $Action );

}  
else{
    RouteToControler("", "" );
}



?>