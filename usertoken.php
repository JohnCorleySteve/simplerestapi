<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIMPLE API</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<?php 
if(isset($_POST['make_token'])){
    $token = bin2hex(md5($_POST['fullname'].$_POST['email'].date('yyyy-mm-dd h:i:s')));
    $query = mysqli_query($db,'INSERT INTO users SET fullname="'.$_POST['fullname'].'",email="'.$_POST['email'].'",token="'.$token.'"');
    if($query){
        $success = "Your token is : ".$token;
    }else{
        $error = "Error";
    }
}
?>
<div class="container">
    <h1 align="center">Get User Token</h1>
    <?php if(isset($success)){?>
    <div class="alert alert-success"><?php echo $success; ?></div>
    <?php } ?>
    <?php if(isset($error)){?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>
    <form method="POST" action="">
        <div class="row">
        <div class="col-sm-4">&nbsp;</div>
        <div class="col-sm-4">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullname" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control"/>
        </div>
        <hr>
        <div class="form-group">
           <button class="btn btn-success" name="make_token">Submit</button>
        </div>
        </div>
        </div>
    </form>
</div>
</body>
</html>
