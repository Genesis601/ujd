<?php 
         if (isset($_POST["submit"])) {
            $Username = $_POST["Username"];
            $Password = $_POST["Password"];
            $errors = array();

             if (empty($Username) or empty($Password) ) {
                array_push($errors, "All fields are required");
             }
             
             if (strlen($Password)<8) {
                array_push($errors," Password must be atleast 8 characters long");
             }

             if (count($errors )>0) {
                foreach ($errors as $error) {
                   // echo " <div class='form-inputs'> $error</div>" ;
               
            
                }
             } else {
                require_once "IGdatabase.php";

                $sql = "INSERT INTO IG (Username, Password) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql );

                if ( $prepareStmt) {
                   mysqli_stmt_bind_param($stmt, "ss", $Username, $Password);
                   mysqli_stmt_execute($stmt);

                  // echo " <div class='form-inputs'> Login Successful</div>" ;
                } else {
                    die("Something went wrong");
                }
                
             }



         }
      
          
        ?>









