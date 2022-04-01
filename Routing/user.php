<?php 

    function Login()
    { 
        include ROUTEMODULEUSERVIEW."Login.php"; 
      
    }
    function Login_admin()
    { 
        include ROUTEMODULEUSERVIEW."Login_admin.php"; 
      
    }
    function Lockscreen()
    { 
        include ROUTEMODULEUSERVIEW."lockscreen.php"; 
      
    }

    function UsersList($message)
    { 
        include ROUTEMODULEUSERVIEW."List.php"; 
      
    }

    function UsersListUpdate($id)
    { 
        include ROUTEMODULEUSERVIEW."Update.php"; 
      
    }

    function SignUp()
    { 
        include ROUTEMODULEUSERVIEW."Signup.php"; 
    }

    function Deconnexion()
    { 
        if (isset($_SESSION['Id_agent'])) 
        {
            session_destroy();
            Login();
        }
        else {
            Login();
        }
    }

    function DeconnexionLockScreen()
    { 
        if (isset($_SESSION['Id_agent'])) 
        {
            session_destroy();
            Lockscreen();
        }
        else {
            Login();
        }
    }
    function Delete($id)
    { 
        if (isset($_SESSION['id'])) 
        {
            DeleteUser($id);
            UsersList("<span class='text-success'>suppression réussi</span>");
        }
        else {
            UsersList("<span class='text-danger'>suppression echoué</span>");
        }
    }

    function Update($username,$id)
    { 
        if (isset($_SESSION['id'])) 
        {
            UpdateUser($username,$id);
            UsersList("<span class='text-success'>mises à jour réussi</span>");
        }
        else {
            UsersList("<span class='text-success'>mises à jour echoué</span>");
        }
    }
