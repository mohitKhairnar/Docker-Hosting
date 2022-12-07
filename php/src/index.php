<?php
    //These are the defined authentication environment in the db service

    // The MySQL service named in the docker-compose.yml.
    $host = 'db';

    // Database use name
    $user = 'MYSQL_USER';

    //database user password
    $pass = 'MYSQL_PASSWORD';

    //database name
    $mydatabase = 'MY_DATABASE';

    $conn = new mysqli($host, $user, $pass, $mydatabase);

    $errors = [];

    $_name = '';
    $_prn = '';
    $_email = '';
    $_number = '';
    $_password = '';
    $_confirmPassword = '';
    $_gender = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // validate form
        $_name = $_REQUEST['name'];
        $_prn = $_REQUEST['prn'];
        $_email = $_REQUEST['email'];
        $_number = $_REQUEST['number'];
        $_password = $_REQUEST['password'];
        $_confirmPassword = $_REQUEST['confirmPassword'];
        $_gender = $_REQUEST['gender'];
       

        if(!$_name){
            $errors[] = 'Enter Your Name';
        }
        if(!$_prn){
            $errors[] = 'Enter PRN';
        }
        if(!$_email){
            $errors[] = 'Enter Email';
        }
        if(!$_number){
            $errors[] = 'Enter Number';
        }
        if(!$_password){
            $errors[] = 'Enter Password';
        }   
        if(!$_confirmPassword){
          $errors[] = 'Enter password for confirmation';
        } 
        if(!$_gender){
          $errors[] = 'Enter gender';
        }

        if(empty($errors)){


            $sql = "INSERT INTO WCE_Student_Verification VALUES ('$_name','$_prn','$_email','$_number','$_password','$_confirmPassword','$_gender')";

            if(mysqli_query($conn, $sql)){
                
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
            
            $_name = '';
            $_prn = '';
            $_email = '';
            $_number = '';
            $_password = '';
            $_confirmPassword = '';
            $_gender = '';
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="style.css" class="style"> -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  /* background: linear-gradient(135deg, #caae80, #a9c397); */
  background-color:cadetblue
}
.image{
  padding-left: 40%
}
.collegename{
  padding-left: 20%;
}
.formkanam{
  padding-left: 32%;
}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
  background-color: #9b59b6;
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
   background-color:cadetblue;
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background-color: rgb(28, 87, 89);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
    </style>
</head>
<body>
<?php if(!empty($errors)): ?>

<div class="alert alert-danger">
    <?php foreach($errors as $error):?>
        <div><?php echo $error?></div>
    <?php endforeach;?>
</div>
<?php endif;?>
    <div class="container">
            <img  class="image" src="https://uni.wcoeapps.in/site/static/images/wcoe.jpg">
                <h3 class="collegename">Walchand College of Engineering, Sangli</h3>
            <p class="formkanam">Student Verification Form</p>
      <div class="content">
        <form method="POST">
          <div class="user-details">
            <div class="input-box">
              <label for="name" class="details">Full Name</label>
              <input type="text" placeholder="Enter your name" name="name" value="<?php echo $_name ?>" required>
            </div>
            <div class="input-box">
              <label for="prn" class="details">PRN Number</label>
              <input type="text" placeholder="Eg. 2020BTEIT00038" name="prn" value="<?php echo $_prn ?>" required>
            </div>
            <div class="input-box">
              <label for="email" class="details">Email</label>
              <input type="text" placeholder="@walchandsangli.ac.in" name="email" value="<?php echo $_email ?>" required>
            </div>
            <div class="input-box">
              <label for="number" class="details">Phone Number</label>
              <input type="text" placeholder="Enter your number" name="number" value="<?php echo $_number ?>" required>
            </div>
            <div class="input-box">
              <label for="password" class="details">Password</label>
              <input type="text" placeholder="Enter your password" name="password" value="<?php echo $_password ?>" required>
            </div>
            <div class="input-box">
              <label for="confirmPassword" class="details">Confirm Password</label>
              <input type="text" placeholder="Confirm your password" name="confirmPassword" value="<?php echo $_confirmPassword ?>" required>
            </div>
          </div>
          <div class="input-box">
              <label for="gender" class="details">Gender</label>
              <input type="text" placeholder="Enter Your Gender" name="gender" value="<?php echo $_gender ?>" required>
            </div>
          <!-- <div class="gender-details">
            <input type="radio" name="gender" value="m" id="dot-1">
            <input type="radio" name="gender" value="f" id="dot-2">
            <input type="radio" name="gender" value="o" id="dot-3">
            <span class="gender-title">Gender</span>
            <div class="category">
              <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
              </label>
            </div>
          </div> -->
          <div class="button">
            <input type="submit" value="Register" name="submit">
          </div>
        </form>
      </div>
    </div>
  
  </body>
</html>