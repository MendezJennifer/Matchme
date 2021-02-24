<!DOCTYPE html>
<html lang="en-CA">
<head>
    <!--add charset -->
    <meta charset="utf-8">
    <!-- meta viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Matchme </title>
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
    <main>
    <form action="process.php" method="post">
            <input type="text" name="Item" id="Item" placeholder="Item">
            <article>
                <select name="Season" id="Season"> 
                    <option value="Season"> Season </option>
                    <option value="Summer"> Summer </option>
                    <option value="Fall"> Fall </option>
                    <option value="Winter"> Winter </option>
                    <option value="Spring"> Spring </option>
                </select>
            </article>
            <article>
                <select name="Type" id="Type">
                    <option value="Type"> Type </option>
                    <option value="Outerwear"> Outerwear </option>
                    <option value="Top"> Top </option>
                    <option value="Bottom"> Bottom </option>
                    <option value="One_Piece"> One Piece </option>
                    <option value="Footwear"> Footwear </option>
                    <option value="Accessories"> Accessories </option>
                </select>
            </article>
            <input type="text" name="Color" id="Color" placeholder="Color"> 
            <article>
                <select name="Occasion" id="Occasion">
                    <option value="Occasion"> Occasion </option>
                    <option value="Casual"> Casual </option>
                    <option value="Dressy_Casual "> Dressy Casual </option>
                    <option value="Business"> Business </option>
                    <option value="Cocktail"> Cocktail </option>
                    <option value="Semi-Formal"> Semi-Formal </option>
                    <option value="Formal"> Formal </option>
                </select>
            </article>
            <input type="number" name="Worn" id="Worn" placeholder="Times Worn"> 
            <input type="text" name="Comments" id="Comments" placeholder="Comments">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="submit" value="submit" name="submit">
        </form>
    </main>
    <footer>
        <p> &copy; <?php echo getdate()['year']; ?> </p>
    </footer>
</body>
</html>