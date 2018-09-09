
<?php
  
  require_once('logindatabase.php');

  if ( !isset($_SESSION['username'])){
  $conn = get_conn();
  if (!$conn) {
      die("Connection failed: " . $conn->connect_error);
  }
//if($_SERVER["REQUEST_METHOD"] == "POST") {
if(  isset($_POST['submitbutton'])){
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  echo $username;
  //$username = mysqli_real_escape_string($username);
  //$password = mysqli_real_escape_string($password);
  //$email = mysqli_real_escape_string($email);

  if ($email == ""){
    
    // login
    $query = "SELECT name FROM hospitals WHERE name='$username' and password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
    $count = mysqli_num_rows($result);
    echo $row['username'];
    $name = $row['username'];
    if($count == 1) {
      
      $_SESSION['username']= $name;
      echo "welcome ".$row['name'];
      echo $_SESSION['username'];
      session_destroy();
      header("location: index.html");
    } else {
      $error = "Your Login Name or Password is invalid";
    }

  }
  else{
    // signup
  }
}
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CureNX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./style/hospitallogin.css">
</head>
<body>
    
        <div class="login-page">
                <div class="form">
                  <form class="register-form" >
                    <input name="usernamesignup" type="text" placeholder="name"/>
                    <input name="passwordsignup" type="password" placeholder="password"/>
                    <input name="email" type="text" placeholder="email address"/>
                    <button >create</button>
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                  </form>
                  <form action="" method="POST" class="login-form">
                    <input name="username" type="text" placeholder="username"/>
                    <input name="password" type="password" placeholder="password"/>
                    <button name="submitbutton" type="submit" >login</button>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                  </form>
                </div>
              </div>



    <script>
    $('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
         });</script>
</body>
</html>