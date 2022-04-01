
<?php 
 switch ($Action) {
    case 'Home':
        Home();
        break;
    
    default:
        # code...
        break;
    }
/*if (isset($_SESSION['Id_agent'])) 
{
switch ($Action) {
    case 'Home':
        Home();
        break;
    
    default:
        # code...
        break;
    }
}else {
    Login();
}*/
?>