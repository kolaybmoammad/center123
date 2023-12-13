<a href="./index.php?page=addstudent">+ add new</a>
<?php

include_once("connection/connect.php");

?>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr><th>image</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>education level</th>
            <th>Age</th>
            <th>Address</th>
            <th>Management</th> 
        </tr>
    </thead>
    <tbody>
        <?php
          $query_select="select * from students";
          $resultstudent = mysqli_query($connexion, $query_select);
          while($studentrow=mysqli_fetch_array($resultstudent, MYSQLI_ASSOC))
        {
          ?>
              <tr class="odd gradeX">
                <td> <img style="width:70px" src="<?php echo $studentrow['pic']; ?>" > </td>
                  <td><?php echo $studentrow['fullname']; ?></td>
                  <td><?php echo $studentrow['phone']; ?></td>
                  <td><?php echo $studentrow['email']; ?></td>
                  <td class="center"><?php echo $studentrow['educ_level']; ?></td>
                  <td class="center"><?php echo $studentrow['age']; ?></td>
                  <td><?php echo $studentrow['addres']; ?></td>
                  <td>
                      <a href="./index.php?page=deletestudent&id=<?php  echo $studentrow['id'];  ?>"  >Delete</a> | 
                      <a href="./index.php?page=editstudent&id=<?php  echo $studentrow['id'];  ?>"  >Edit</a>
                  </td>
              </tr>
          <?php
        }
        ?>

    </tbody>
</table>
</div>