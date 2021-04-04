<?php require('header.php'); ?>

<header>
    <section>
        <div>
            <h1> Matchme</h1>
            <h2> Welcome to your virtual closet! </h2>
        </div>    
    </section>
</header>
<main>
    <div id="search">
        <!--Search bar-->
        <h2> Search Item </h2> 
        <form action="search_results.php" method="get">
            <div class="row">
                <div class="col">
                    <input type ="text" name="user" placeholder="Color" class="form-control">
                </div>
                <div class="col">
                    <input type="text" name="search" class="form-control" placeholder="Item">
                </div>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </div>
        </form>
    </div>
</main>  

<?php
    //Connect to database  
    require('connect.php'); 

    //Set query 
    $sql = "SELECT * FROM closet"; 

    //Prepare query 
    $statement = $db->prepare($sql); 

    //Execute the query 
    $statement->execute(); 

    //Store results
    $records = $statement->fetchAll(); 

    //Echo top of table 
    echo "<table class='table table-striped'><tbody>";
    echo "<thead><tr><th>Item</th><th>Season</th><th>Type</th><th>Color</th><th>Occasion</th><th>Times Worn</th><th>Comments</th><th></th><th>Delete</th><th>Update</th></tr></thead>"; 

    foreach($records as $record) 
    {
        echo"<tr><td>". $record['Item']. "</td><td>" . $record['Season'] . "</td><td>" . $record['Type'] . "</td><td>" . $record['Color'] . "</td><td>" . $record['Occasion'] . "</td><td>" . $record['Times_Worn']. "</td><td>" . $record['Comments']."</td><td>" . $record['Email']. "</td><td><a href='delete.php?id=" . $record['item_id']. "'> Delete Item </a></td><td><a href='insert_closet.php?id=" . $record['item_id']. "'>Edit Item </a></td></tr>"; 
    }

    echo "</tbody></table>"; 

    //Close database connection
    $statement->closeCursor(); 

    require('footer.php'); 
?>