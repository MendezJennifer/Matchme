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

    //connect to database  
    require('connect.php'); 

    //Set query 
    $sql = "SELECT * FROM closet"; 

    //Prepare query 
    $statement = $db->prepare($sql); 

    //Execute the query 
    $statement->execute(); 

    //Store results 
    $records = $statement->fetchAll(); 

    //Echo out top of table 

    echo "<table><tbody>"; 

    foreach($records as $record) {
        echo"<tr><td>". $record['Item']. 
        "</td><td>" . $record['Season'] . "</td><td>" . $record['Type'] . "</td><td>" . $record['Color'] . "</td><td>" . $record['Occasion'] . "</td><td>" . $record['Times_Worn']. "</td><td>" . $record['Comments']."</td><td>" . $record['Email']. "</td></tr>"; 
    }

    echo "</tbody></table>"; 

    //Close database  connection
    $statement->closeCursor(); 

    ?>
  <footer>
        <p> &copy; <?php echo getdate()['year']; ?> </p>
    </footer> 
</body>
</html>