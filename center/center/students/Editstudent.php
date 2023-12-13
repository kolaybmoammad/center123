<html>
    

<?php
    $id=$_GET["id"];
    include_once("connection/connect.php");
    $select_query = "SELECT * FROM students where id=".$id; 
    $result = mysqli_query($connexion, $select_query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC)
?> 

    <div class="row">
        <form method="post" role="form" action="./index.php?page=updatestudent>
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="col-md-6">
                <label  >name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['fullname']; ?>">
            </div>

            <div class="col-md-6">
                <label  >age:</label>
                <input type="text" class="form-control" name="age" value="<?php echo $row['age']; ?>">
            </div>

            <div class="col-md-6"> 
                <label  >email:</label>
                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
            </div>

            <div class="col-md-6"> 
                <label  >educ_level:</label>
                <input type="text" class="form-control" name="educ_level" value="<?php echo $row['educ_level']; ?>">
            </div>
            
            <div class="col-md-6"> 
                <label  >phone:</label>
                <input type="number" class="form-control" name="phone" value="<?php echo $row['phone']; ?>">
            </div>

            <div class="col-md-6"> 
                <label  >address:</label>
                <input type="text" class="form-control" name="address" value="<?php echo $row['addres']; ?>">
            </div>

            <div class="col-md-6">
                <input type="submit" value="save" name="submit" class="btn btn-primary">     
            </div>

        </form>
    </div>
</div>




</html>

