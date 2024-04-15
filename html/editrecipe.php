
<html>
    <body>

        <?php
            include('connection.php');
          
             $recipeTitle=$_POST['recipeTitle'];
             $sql = "SELECT * FROM addrecipe WHERE recipeTitle='$recipeTitle'";
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) 
                    {
                        $row = $result->fetch_assoc();
                        
                        $chefName=$row["chefName"];
                        $category=$row["category"];
                        $recipeTitle=$row["recipeTitle"];
                        $ingredients=$row["ingredients"];
                        $description=$row["description"];

                        echo"
                        <html>
                        <body>
                        <form method='post' action='updateRecipe.php'>
                            <label>Chef Name:</label>
                            <input type='text' name='chefName' value='$chefName'/><br><br>
                            <label>Category:&nbsp;&nbsp;</label>
                            <input type='text' name='category' value='$category'/> <br><br>
                            <label>Recipe Name:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type='text' name='recipeTitle' value='$recipeTitle'/> <br><br>
                            <label>Ingredients:&nbsp;&nbsp;&nbsp;</label>
                            <textarea name='ingredients' id='ingredients' value=''  rows='5' cols='100'>".
                            $row['ingredients'].
                            "</textarea><br><br>
                            <label>Directions:&nbsp;&nbsp;&nbsp;</label>
                            <textarea name='description' id='description' value='' rows='10' cols='100'>".
                            $row['description'].
                            "</textarea><br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='submit' name='submit' value='Submit' />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='button' value='Reset' />
                        </form>
                        </body></html>";
                    }
                    else 
                    {
                        echo " Not Found";
                    }
                    
             

            $db->close();
            ?>

</body>
</html>