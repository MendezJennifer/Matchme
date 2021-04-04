<?php 
    session_start();
    require('header.php'); 
?>

<header>
    <section>
        <div>
            <h1> Matchme</h1>
            <h2> Welcome to your virtual closet! </h2>
        </div>    
    </section>
</header>
    
<?php

    //Get search term and display results 
    $submit=filter_input(INPUT_GET,'submit');
    $search_term=filter_input(INPUT_GET,'search');

    //Connect to database 
    require('connect.php');

    $_SESSION['user']=$name;

    //Set SQL query
    $query="SELECT * FROM closet WHERE Item LIKE :search_term;";

    //Preprare
    $stmt=$db->prepare($query);

    //Bind parameter
    $stmt->bindValue(':search_term', '%'.$search_term.'%');

    //Execute query 
    $stmt->execute();

    echo "<h3> Your search for ". $search_term. " gave the following results:</h3>";
    
    //Echo top of table 
    echo "<table class='table table-striped'><tbody>";

    //Display result (if there is one)
    if($stmt->rowCount()>=1)
    {
        echo "<thead><tr><th>Item</th><th>Season</th><th>Type</th><th>Color</th><th>Occasion</th><th>Times Worn</th><th>Comments</th><th>Email</th><th>Delete</th><th>Update</th></tr></thead>"; 

        while ($results=$stmt->fetch())
        {
            echo"<tr><td>". $results['Item']. "</td><td>" . $results['Season'] . "</td><td>" . $results['Type'] . "</td><td>" . $results['Color'] . "</td><td>" . $results['Occasion'] . "</td><td>" . $results['Times_Worn']. "</td><td>" . $results['Comments']."</td><td>" . $results['Email']. "</td><td><a href='delete.php?id=" . $results['item_id']. "'> Delete Item </a></td><td><a href='index.php?id=" . $result['item_id']. "'>Edit Item </a></td></tr>"; 
        }
    }
    else
    {
        echo"<p> No results found </p>";
    }

    echo "</tbody></table>"; 

    //Close database connection
    $stmt->closeCursor();

    require('footer.php');
    
?>