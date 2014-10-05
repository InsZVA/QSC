<?php 
function dowith_sql($str)
//实现将特征码两边加.
{  
$refuse_str="exec|and|or|select|update|from|where|order|by|*|delete||insert|into|values|create|table|

database|set|char|asc|cast|declare|<script|script|iframe|3bomb|c.js|;"; 
//定义防注入的字符
   $arr=explode("|",$refuse_str);
//将$refuse_str中的值单独取出
   for($i=0;$i<count($arr);$i++)
   {
     $replace="[".$arr[$i]."]";
     $str=str_replace($arr[$i],$replace,$str);
//在变量$str中搜索字符串$arr[$i]，并将其替换为字符串[$replace]
   }
   return $str;
}
foreach ($_GET as $key=>$value)
//遍历获GET方法获得的参数$_GET的值传给$key,并赋值给$value
{
  $_GET[$key]=dowith_sql($value);
//将$value中的特征码处理传个$_GET[$key]
}
foreach ($_POST as $key=>$value)
{
  $_POST[$key]=dowith_sql($value);
}
?>


