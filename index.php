<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Join Us!</title>
</head>

<body>
<?php
// 定义变量并设置为空值
$nameErr = $emailErr = $qqErr = $schoolErr = $majorErr = "";
$err=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "姓名是必填的";$err=1;
   } else {
     $name = test_input($_POST["name"]);
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "电邮是必填的";$err=1;
   } else {
     $email = test_input($_POST["email"]);
	 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
     $emailErr = "无效的 email 格式！"; 
   }
   $email = test_input($_POST["email"]);

   if (empty($_POST["qq"])) {
     $qqErr = "QQ是必填的";$err=1;
   } else {
     $qq = test_input($_POST["name"]);
   }
   
   if (empty($_POST["school"])) {
     $schoolErr = "学校是必填的";$err=1;
   } else {
     $school = test_input($_POST["school"]);
   }
   
   if (empty($_POST["major"])) {
     $majorErr = "专业是必填的";$err=1;
   } else {
     $major = test_input($_POST["major"]);
   }
}
else $err=1;
if($err==0){
	$con = mysqli_connect("localhost","root","inszva961121");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error($con));
	  }

	mysqli_select_db( $con,"join");

	$sql="INSERT INTO user (name, sex,school,major,qq,email) VALUES	('$_POST[name]','$_POST[sex]','$_POST[school]','$_POST[major]','$_POST[qq]','$_POST[email]')";

	if (!mysqli_query($con,$sql))
	  {
	  die('Error: ' . mysqli_error($con));
	  }
	

	mysqli_close($con);
?>
<script>alert("提交成功，感谢您的参与，我们会在7个工作日内处理您的申请！");window.close();</script>
<?php
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <p>
    <label for="name">姓名</label>
    <input name="name" type="text" id="name" maxlength="12" /> 
    <?php echo $nameErr;?>
  </p>
  <p>性别
    <select name="sex" id="sex">
      <option value="boy">男</option>
      <option value="girl">女</option>
    </select>
  </p>
  <p>
    <label for="sex"></label>
    <label for="school">学校</label>
    <input name="school" type="text" id="school" maxlength="30" /> 
    <?php echo $schoolErr;?>
  </p>
  <p>
    <label for="major">专业</label>
    <input name="major" type="text" id="major" maxlength="30" /> 
    <?php echo $majorErr;?>
  </p>
  <p>
    <label for="qq">QQ </label>
    <input name="qq" type="text" id="qq" maxlength="10" /> 
    <?php echo $qqErr;?>
  </p>
  <p>邮箱
    <label for="email"></label>
    <input name="email" type="text" id="email" maxlength="45" /> 
    <?php echo $emailErr;?>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="提交" />
    <br />
  </p>
</form>
</body>
</html>