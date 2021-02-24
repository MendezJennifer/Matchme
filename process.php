<!DOCTYPE html>
<html lang="en-CA">
<head>
    <!--add charset -->
    <meta charset="utf-8">
    <!-- meta viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Thank You for Submitting </title>
    <!-- Course Project: Jennifer Mendez-->
    <meta name="description" content= "Course Project - Phase One">
    <!-- add robots -->
    <meta name="robots" content="noindex, nofollow">
</head>
<body>
    <header>
        <h1> Matchme</h1>
        <h2> Welcome to your virtual closet! </h2>
    </header>
    <?php

        //Variables to store information
        $item = filter_input(INPUT_POST, 'Item');
        $season = filter_input(INPUT_POST, 'Season');
        $type = filter_input(INPUT_POST, 'Type');
        $color = filter_input(INPUT_POST, 'Color');
        $occasion = filter_input(INPUT_POST, 'Occasion');
        $worn = filter_input(INPUT_POST, 'Worn', FILTER_VALIDATE_INT);
        $Comments = filter_input(INPUT_POST, 'Comments');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
       
        //flag variable (debugging) 
        $ok = true; 

        //form validation 

        if($worn === false) {
            echo "<p> Please use a numeric value for times worn </p>"; 
            $ok = false; 
        }

        if($email === false) {
            echo "<p> Please use a valid email address </p>";
            $ok = false;  
        }

        if($ok === true) {
            try {
                //Connect to database 
                require('connect.php'); 
                //Set SQL query 
                $sql = "INSERT into closet (Item, Season, Type, Color, Occasion, Times_Worn, Comments, Email) VALUES (:Item, :Season, :Type, :Color, :Ocassion, :Worn, :Comments, :Email);";
                //Call the prepare method of the PDO object 
                $statement = $db->prepare($sql);

                //Bind parameters
                $statement->bindParam(':Item', $item);
                $statement->bindParam(':Season', $season);
                $statement->bindParam(':Type', $type);
                $statement->bindParam(':Color', $color);
                $statement->bindParam(':Ocassion', $occasion);
                $statement->bindParam(':Worn', $worn);
                $statement->bindParam(':Comments', $comments);
                $statement->bindParam(':Email', $email);

                //Execute query 
                $statement->execute(); 

                echo '<p> Success, your item has been added!  </p> ';
                echo "<a href='view.php'> View Your Closet </a>";  

                //Close database  connection 
                $statement->closeCursor(); 
            
            }
            catch(PDOException $e) {
            echo '<p> Whoops something went wrong! </p> '; 
            $error_message = $e->getMessage();
            echo $error_message; 

            }

        }
        ?>
    <footer>
        <p> &copy; <?php echo getdate()['year']; ?> </p>
    </footer> 
</body>
</html>