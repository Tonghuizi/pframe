

<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
</head>
<body>


<form action="/home/register" method="post">
  <div class="form-group">
    <label>name</label>
    <input type="text" name="name" value="<?=isset($name)?$name:''?>" class="form-control" placeholder="name">
    <label></label>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" value="<?=isset($password)?$password:'' ?>" class="form-control" placeholder="Password">
    <label><?= isset($msg)?$msg:''; ?></label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</body>
</html>