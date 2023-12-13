
<style>
.logi_div{
    width: 50%;
    background: #a59c9c80;
    padding: 15px;
    margin: 0px auto;
    border-radius: 20px;
}
</style>

<div class="container logi_div">
    <div class="row">              
        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
</div>
    <div class="row">
    <form role="form" method="POST" action="">
    
        <div class="form-group"  style="text-align: center;"> 
            <label >Email</label>
            <input name="emailnotdb" class="form-control" />
        </div>

        <div class="form-group"  style="text-align: center;">
            <label>Password</label>
            <input name="passwordnotdb" class="form-control" />
        </div>

        <div class="form-group" style="text-align:center;">
            <button type="submit" name="btclicked" class="btn btn-primary"> login </button>
        </div>
    </form>
    </div>



<?php
include_once("connection/connect.php");
if(isset($_POST["btclicked"])){

$emailabc=$_POST["emailnotdb"];
$passwordabc=$_POST["passwordnotdb"];

$query_login="select * from users where email='".$emailabc."' and password='".$passwordabc."'  ";

$result=mysqli_query($connexion,$query_login);


if(mysqli_num_rows($result)>0){
    
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);

    $_SESSION["session_user_id"]=$row["id"];
    $_SESSION["session_user_name"]=$row["username"];
    header('location:index.php?page=students');

}else{
?>
<div class="alert alert-danger" role="alert">
    Invalid email or password!!!!!!!!!
</div>

<?php } } ?>

</div>