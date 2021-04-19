<?php
    ob_start();
    require('header.php'); 

        //Variables to store information
        $item = filter_input(INPUT_POST, 'Item');
        $season = filter_input(INPUT_POST, 'Season');
        $type = filter_input(INPUT_POST, 'Type');
        $color = filter_input(INPUT_POST, 'Color');
        $occasion = filter_input(INPUT_POST, 'Occasion');
        $worn = filter_input(INPUT_POST, 'Worn', FILTER_VALIDATE_INT);
        $comments = filter_input(INPUT_POST, 'Comments');
        $email = filter_input(INPUT_POST, 'Email', FILTER_VALIDATE_EMAIL);
       
        //Intiailize id 
        $id = null;
        $id = filter_input(INPUT_POST, 'item_id');  

        //Flag variable (debugging) 
        $ok = true; 

        //Form validation 

        if($worn === false || $worn<0) 
        {
            echo "<p> Please use a positive numeric value for times worn </p>"; 
            $ok = false; 
        }
        
        if(strcmp($season, "") === 0 || is_null($season))
        {
            echo "<p> Please select a season. </p>";
            $ok = false;  
        }
        
        if(strcmp($type, "") === 0 || is_null($type))
        {
            echo "<p> Please select a type of clothing. </p>";
            $ok = false;  
        }

        if(strcmp($occasion, "") === 0 || is_null($occasion))
        {
            echo "<p> Please select the appropiate ocassion for your item. </p>";
            $ok = false;  
        }

        if($ok === true) 
        {
            try 
            {
                //Connect to database 
                require('connect.php'); 
                
                //Set SQL query 
                if(!empty($id))
                {
                    echo"item updated";
                    $sql = "UPDATE closet SET Item=:Item, Season=:Season, Type=:Type, Color=:Color, Occasion=:Ocasion, Times_Worn=:Worn, Comments=:Comments, Email=:Email WHERE item_id = :item_id;"; 
                }    
                else
                {
                    $sql = "INSERT into closet (Item, Season, Type, Color, Occasion, Times_Worn, Comments, Email) VALUES (:Item, :Season, :Type, :Color, :Ocasion, :Worn, :Comments, :Email);";
                }
                
                //Call the prepare method of the PDO object 
                $statement = $db->prepare($sql);

                //Bind parameters
                $statement->bindParam(':Item', $item);
                $statement->bindParam(':Season', $season);
                $statement->bindParam(':Type', $type);
                $statement->bindParam(':Color', $color);
                $statement->bindParam(':Ocasion', $occasion);
                $statement->bindParam(':Worn', $worn);
                $statement->bindParam(':Comments', $comments);
                $statement->bindParam(':Email', $email);

                //Bind $id (if updating) 
                if(!empty($id)) 
                {
                    $statement->bindParam(':item_id', $id); 
                }   

                //Execute query 
                $statement->execute(); 

                echo '<p> Success, your item has been added!  </p> ';

                //Close database  connection and redirect to profile page
                $statement->closeCursor(); 
                header('location:profile.php');
            }
            
            catch(PDOException $e) 
            {
                header('location:error.php');  
            }
        }

    require('footer.php'); 
    ob_flush(); 

?>