<?php 
session_start();
require_once("include/conn.php");
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Medical Center</title>
  
  
  
  <link rel="stylesheet" href="css/bitnami.css">

  
</head>
<?php 
require_once("include/conn.php");
if(isset($_POST['signin'])){
    extract($_POST);

    $q = "select * from users where  name like '$username_login' and password like '$password_login' ";
            //echo $q;
    $res = mysqli_query($conn,$q) or die("query problem : ".mysqli_error($conn));
    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_array($res);
               // print_r($row);
        $_SESSION['userId'] = $row['id'];
        $_SESSION['userName'] = $row['name'];
        header("location:mainpage.html");
    }else{

        $_REQUEST['error']=1;

                //header("location:index.php");
    }
}

?>
<body style="background-image: url('Pictures Folder/bg image/bg.jpg');">
  <div class="wrapper"  align="center">
      <div class="container " >
        <h1 align="center">Welcome to Movies4U.com</h1>
        <div >
        <form  align="center" class="form"  action="" method="post"  autocomplete="on">
            <div class="form-group">
                <div class="row">
                    <br>
                    <span class="text-success">We have a Lot of Fun and Entertaintment for you here...</span>
                </div>
                <div class="row" style="margin-top: 50px; ">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4" >
                      <input  align="center" type="text" class="form-control " placeholder="Username" id="username" name="username_login" autocomplete="off" required="required" >
                      <br><br>
                      <input  align="center" type="password" placeholder="Password" id="password" name="password_login" class="form-control ">
                      <br><br>
                      <button type="submit"  class="btn btn-primary col-xs-4"  name="signin" >Login</button>
                  </div>
              </div>
          </div>
      </form>
      </div>
  </div> 
</div>

</body>
</html>
