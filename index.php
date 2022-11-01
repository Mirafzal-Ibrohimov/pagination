<!DOCTYPE html>
<html>
<head>
  <title>Pagination in PHP</title>
</head>
<body>

<?php
//connect to database
$db=mysqli_connect("localhost","root","","market");


$page=$_GET['page'];
if($page == '' || $page == 1)
{
	$page1 = 0;
}
else
{
	$page1=($page*5)-5;
}


$sql = "select * from abouttextthree limit $page1,5";
$result=mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	echo $row['id']. ")" .$row['title']. "</br>";
}


$sql1 = "select * from abouttextthree";
$result1=mysqli_query($db,$sql1);
$count=mysqli_num_rows($result1);

$a = ceil($count/5);

echo "<br><br>";

for($b=1;$b<=$a;$b++)
{
	?><a href="?view=pagination?page=<?php echo $b; ?>" style="text-decoration:none"><?php echo $b." "; ?></a> <?php
}

?>




</body>
</html>