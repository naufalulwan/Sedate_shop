<?php
include('config/database_connection.php');
 include_once 'template/header.php';
 
$message = '';
 
if(isset($_SESSION['user_id']))
{
 header('location:index.php');
}
 
if(isset($_POST["register"]))
{
 $username = trim($_POST["username"]);
 $password = trim($_POST["password"]);
 $check_query = "
 SELECT * FROM login 
 WHERE username = :username
 ";
 $statement = $connect->prepare($check_query);
 $check_data = array(
  ':username'  => $username
 );
 if($statement->execute($check_data)) 
 {
  if($statement->rowCount() > 0)
  {
   $message .= '<p><label>Nama sudah terdaftar !</label></p>';
  }
  else
  {
   if(empty($username))
   {
    $message .= '<p><label>Harap isi Nama !</label></p>';
   }
   if(empty($password))
   {
    $message .= '<p><label>Harap isi kata sandi !</label></p>';
   }
   else
   {
    if($password != $_POST['confirm_password'])
    {
     $message .= '<p><label>Kata sandi tidak sama !</label></p>';
    }
   }
   if($message == '')
   {
    $data = array(
     ':username'  => $username,
     ':password'  => password_hash($password, PASSWORD_DEFAULT)
    );
 
    $query = "
    INSERT INTO login 
    (username, password) 
    VALUES (:username, :password)
    ";
    $statement = $connect->prepare($query);
    if($statement->execute($data))
    {
     $message = "<label>Pendaftaran berhasil !</label>";
    }
   }
  }
 }
}
 
?>
 
   <h3 align="center">nfChat</a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading"><h4>Daftar Untuk Pengguna Baru</h4></div>
    <div class="panel-body">
     <form method="post">
      <span class="text-danger"><?php echo $message; ?></span>
      <div class="form-group">
       <label>Masukkan Nama</label>
       <input type="text" name="username" class="form-control form-control-lg" />
      </div>
      <div class="form-group">
       <label>Kata sandi</label>
       <input type="password" name="password" class="form-control form-control-lg" />
      </div>
      <div class="form-group">
       <label>Ulangi Kata sandi</label>
       <input type="password" name="confirm_password" class="form-control form-control-lg" />
      </div>
      <div class="form-group">
       <input type="submit" name="register" class="btn btn-danger btn-lg" value="Daftar" />
      </div>
      <div align="center">
       <a href="login.php"><u>Login</u></a>
      </div>
     </form>
    </div>
   </div>