<?php 

    function AboutUs()
    { 
        include ROUTEMODULEABOUTUSVIEW."about-us.php"; 
      
    }
    function TacheListUpdate($id)
    { 
        include ROUTEMODULEAFFECTATIONVIEW."Update.php"; 
      
    }
    function DeleteTach($id)
    { 
       // if (isset($_SESSION['id'])) 
        //{
            DeleteTache($id);
            HomeList();
       // }
      /*  else {
            echo"<span class='text-danger'>suppression echoué</span>";
        }*/
    }

    function UpdateTach($etat,$id)
    { 
        //if (isset($_SESSION['id'])) 
        //{
            UpdateTache($etat,$id);
            //HomeList();
        //}
        /*else {
            HomeList("<span class='text-success'>mises à jour echoué</span>");
        }*/
    }
    function HomeList()
    { 
        include ROUTEMODULEHOMEVIEW."Home.php"; 
      
    }