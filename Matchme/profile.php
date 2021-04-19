<?php
    require('header.php'); 
  // If they're not logged in, redirect them
  session_start();
  if(!$_SESSION['user'])
  {
    $_SESSION['errors'][]="Please log in";
    header("Location: index.php");
    exit();
  }
  // Assign the user
  $user=$_SESSION['user'];
  
?>

<header>
  <section>
    <div>
      <h1> Matchme</h1>
      <h2> Welcome to your virtual closet! </h2>
    </div>    
  </section>
</header>

  <body>
    <?php include_once('notification.php') ?>

    <script src="https://www.avatarapi.com/js.aspx?email=<?= $user['email'] ?>&size=50"></script>
    <div class="col-7">
      <h1 class="display-5">Hello <?= "{$user['username']}" ?></h1>
    </div>
    <main>
      <div id="search">
        <!--Search bar-->
        <h2> Search Item </h2> 
        <form action="search_results.php" method="get">
          <div class="row">
            <div class="col">
              <input type="text" name="search" class="form-control" placeholder="Item">
            </div>
            <div class="col">
              <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </main> 

<?php

    //Connect to database  
    require('connect.php'); 

    //Set query 
    $sql = "SELECT * FROM closet WHERE Email='{$_SESSION['user']['email']}'";

    //Prepare query 
    $statement = $db->prepare($sql); 

    //Execute the query 
    $statement->execute(); 

    //Store results
    $records = $statement->fetchAll(); 

    //Echo top of table 
    echo "<table class='table table-striped'><tbody>";
    echo "<thead><tr><th>Item</th><th>Season</th><th>Type</th><th>Color</th><th>Occasion</th><th>Times Worn</th><th>Comments</th><th>Email</th><th>Update</th><th>Delete</th></tr></thead>"; 

    foreach($records as $record) 
    {
        echo"<tr><td>". $record['Item']. "</td><td>" . $record['Season'] . "</td><td>" . $record['Type'] . "</td><td>" . $record['Color'] . "</td><td>" . $record['Occasion'] . "</td><td>" . $record['Times_Worn']. "</td><td>" . $record['Comments']."</td><td>" . $record['Email']. "</td><td><a href='insert_closet.php?id=" . $record['item_id']. "'> Update Item </a></td><td><a href='delete.php?id=" . $record['item_id']. "'>Delete Item </a></td></tr>"; 
    }

    echo "</tbody></table>"; 

    //Close database connection
    $statement->closeCursor(); 

    require('footer.php'); 
?>

    <a class="btn btn-primary" href="deleteUser.php" onclick="return confirm('Are you sure?')">Delete Profile</a>
  </body>
</html>