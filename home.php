<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIMPLE API</title>
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
<?php 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://amit.byethost12.com/clients/simplerestapi/currencies");
curl_setopt( $ch, CURLOPT_HTTPHEADER, [
	"http-authorization: Bearer kdjf4u50943f78emjfoidjfg9rkue0"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
?>
<div class="container">
    <h1 align="center">SIMPLE API</h1>
<table class="table table-bordered">
    <tr>
        <th>Currency Name</th>
        <th>Currency Rate</th>
    </tr>
    <?php if(!empty(json_decode($response))){ 
        foreach(json_decode($response) as $value){
    ?>
    <tr>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->rate; ?></td>
    </tr>
    <?php }} ?>
</table>
</div>
</body>
</html>
