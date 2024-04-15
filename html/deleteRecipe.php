
        <?php
            include('connection.php');

            $recipeTitle=$_POST['recipeTitle'];
           
            $sql = "DELETE FROM addrecipe WHERE recipeTitle='$recipeTitle'" ;
            $result = $db->query($sql);
            header("Location: chefdashboard.php");
            $db->close();
        ?>
