<?php 
    require('header.php'); 

    //Initialize variables (used if user is editing)
    $id=null;
    $item = null;
    $season = null;
    $type = null;
    $color = null;
    $occasion = null;
    $worn = null;
    $comments = null;
    $email = null;

    if(!empty($_GET['id']) && (is_numeric(($_GET['id'])))) 
    {
        //Store id from the url
        $id = filter_input(INPUT_GET, 'id'); 
        
        //Connect to database
        require('connect.php'); 
        
        //Set SQL query  
        $sql = "SELECT * FROM closet WHERE item_id = :item_id;";
        
        //Call the prepare method of the PDO object 
        $statement = $db->prepare($sql);
        
        //Bind parameters 
        $statement->bindParam(':item_id', $id);  
        
        //Execute query
        $statement->execute(); 

        //Store results
        $records = $statement->fetchAll(); 

        foreach($records as $record) :
            //$id=$record['id'];
            $item = $record['Item'];
            $season = $record['Season'];
            $type = $record['Type'];
            $color = $record['Color'];
            $occasion = $record['Occasion'];
            $worn = $record['Times_Worn'];
            $comments = $record['Comments'];
            $email = $record['Email'];
        endforeach;   
        
        //Close database connection
        $statement->closeCursor(); 
    }

?>

<header>
    <section>
        <div>
            <h1> Matchme</h1>
            <h2> Welcome to your virtual closet! </h2>
        </div>    
    </section>
</header>
<main>
    <form action="process.php" method="post">
        <input type="hidden" name="item_id" value="<?php echo $id ?>">
        <div class="form-group">
            <label for="Item"> Item* </label>
            <input type="text" name="Item" id="Item" class="form-control" placeholder="Dress" value="<?php echo $item; ?>" required >
        </div>
        <div class="form-group">
            <label for="Season"> Season* </label>
            <article>
                <select name="Season" id="Season" class="form-control" required> 
                    <option value="" disabled selected hidden> 
                        <?php 
                            if(is_null($season)) {echo 'Choose a season';} 
                            else { echo 'Previous choice: ',$season;}
                        ?> 
                    </option>
                    <option value="Summer"> Summer </option>
                    <option value="Fall"> Fall </option>
                    <option value="Winter"> Winter </option>
                    <option value="Spring"> Spring </option>
                </select>
            </article>
        </div>
        <div class="form-group">
            <label for="Type"> Type* </label>    
            <article>
                <select name="Type" id="Type" class="form-control" required>
                    <option value="" disabled selected hidden> 
                        <?php 
                            if(is_null($type)) {echo 'Choose a type';} 
                            else { echo 'Previous choice: ',$type;}
                        ?> 
                    </option>
                    <option value="Outerwear"> Outerwear </option>
                    <option value="Top"> Top </option>
                    <option value="Bottom"> Bottom </option>
                    <option value="One_Piece"> One Piece </option>
                    <option value="Footwear"> Footwear </option>
                    <option value="Accessories"> Accessories </option>
                </select>
            </article>
        </div>
        <div class="form-group">
            <label for="Color"> Color* </label>  
            <input type="text" name="Color" id="Color" class="form-control" placeholder="Blue" value="<?php echo $color; ?>" required  > 
        </div>
        <div class="form-group">
            <label for="Occasion"> Occasion* </label>  
            <article>
                <select name="Occasion" id="Occasion" class="form-control" required>
                    <option value="" disabled selected hidden> 
                        <?php 
                            if(is_null($occasion)) {echo 'Choose an occasion';} 
                            else { echo 'Previous choice: ',$occasion;}
                        ?> 
                    </option>
                    <option value="Casual"> Casual </option>
                    <option value="Dressy_Casual "> Dressy Casual </option>
                    <option value="Business"> Business </option>
                    <option value="Cocktail"> Cocktail </option>
                    <option value="Semi-Formal"> Semi-Formal </option>
                    <option value="Formal"> Formal </option>
                </select>
            </article>
        </div>
        <div class="form-group">
            <label for="Worn"> Times Worn* </label> 
            <input type="number" name="Worn" id="Worn" class="form-control" placeholder="1" value="<?php echo $worn; ?>" required > 
        </div> 
        <div class="form-group">
            <label for="Comments"> Comments </label>    
            <input type="text" name="Comments" id="Comments" class="form-control" placeholder="Comfortable" value="<?php echo $comments; ?>" >
        </div>  
        <div class="form-group">
            <label for="Email"> Email </label>  
            <input type="email" name="Email" id="Email" class="form-control" placeholder="example@gmail.com" value="<?php $email; ?>" >
        </div>

        <!-- Add the recaptcha field -->
        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

        <input type="submit" value="submit" name="submit" class="btn btn-primary">
    </form>

    <!-- Add the recaptcha scripts -->
    <?php include_once('recaptcha.php') ?>

    <script src="https://www.google.com/recaptcha/api.js?render=<?= SITEKEY ?>"></script>
    <script>
      grecaptcha.ready(() => 
      {
        grecaptcha.execute("<?= SITEKEY ?>", { action: "register" })
        .then(token => document.querySelector("#recaptchaResponse").value = token)
        .catch(error => console.error(error));
      });
    </script>  
</main>
<?php  require('footer.php'); ?>