<?php
    session_start();
    //session_destroy();
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>To-Do List:</title>
            <meta charset="utf-8">
            <!--below is how to link your CSS style elements to your main HTML document-->
            <!--<link rel="stylesheet" type="text/css" href="style.css">-->
            <script src = https://cdn.jsdelivr.net/npm/vue></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
    

        <body style = "text-align:center;">

        <div>
            <nav class="navbar navbar-dark bg-dark" style="width: 100%;">
            <h1><a class="navbar-brand" style="color:#4CAF50;"> Welcome to your To Do App! </a></h1>
        </div>  

        <div class="container"> 

            <h2>What would you like to remember?</h2>

            <form role = "form" action = <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method = 'post'>
                <input type = "text" name = "todoEntry" required="required" autofocus>
                <button type = "submit" class="btn btn-success">Add</button>
      


        <?php 

            if (isset( $_POST['todoEntry'])) {
                if (!( isset ( $_SESSION ['listItems']))) {
                    
                    $_SESSION ['listItems'] = array();
                //    $_SESSION ['listItems'][] = $_POST['todoEntry'];
                 //   var_dump($_SESSION['listItems'] );
                
                    
                    // echo "<ul>";
                    //     foreach ($_SESSION['listItems'] as $item) {
                    //         echo "<li>" . $item . "</li>"; }  
                    //         echo "<ul>";
                    }

               // else {

                    $_SESSION ['listItems'][] = $_POST['todoEntry'];
                  //  var_dump ($_SESSION ['listItems'] );
               
            
                header('location:'.$_SERVER['PHP_SELF']);
            }
            

            if ( isset ( $_SESSION ['listItems'])){
            echo "<ul>";
                    foreach ($_SESSION['listItems'] as $item) {
                        echo "<li>" .$item. "</li>"; 
                    }
             echo "</ul>";
                    
                }


            //if ($_POST) {echo "<br>"."\n<li>\n<li>".$_POST['todoEntry']."\n<li>\n<li>";};


        ?>
                
    </form>
        <script>

            $(document).ready(function(){ 
                var itemDone = 0; 
                updateDisplay();
            $("li").click (function() {
                var checkNum = $(this).index();
            
            if (!(sessionStorage.getItem(checkNum))) {
                sessionStorage.setItem(checkNum, 0);  }
            
            if (sessionStorage.getItem(checkNum, 0) == 0 ) { 
                
                $(this).css ("text-decoration", "line-through"); 
                    itemDone = 1;
                sessionStorage.setItem(checkNum, itemDone);
            
            }else { 
                $(this).css ("text-decoration", "none"); 
                itemDone = 0; 
                sessionStorage.setItem(checkNum, itemDone);
                    }
                }); 
            });
          
            
            function updateDisplay () {
                
                for ( var n = 0; n < sessionStorage.length; n++ ) {
                    if ( sessionStorage.getItem(sessionStorage.key(n)) == 1 ) {
                        $("li").eq(sessionStorage.key(n)).css("text-decoration", "line-through"); }
                        }
                    }
 


        </script>

</div>

        </body>
        </html>