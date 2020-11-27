<!DOCTYPE html>
<html>
<body>
	<?php

	pre_r($_POST);
	$number=$_POST['N'];
	if(isset($_POST['Submit'])){
		echo "Your Input :  ".$_POST['N']."<br>";
		if(($number<2)||($number>100))
			{echo "<br>Your Input is Out of Range";
		exit();}
		else{
			$flag_nr=0;
			$x=$number/2;
			for($i=2;$i<=$x;$i++)
			{
				if($number%$i==0)
				{
					$flag_nr=1;
					break;
				}
			}
			if($flag_nr==0)
			{
				echo $number;
				echo " : is Prime number";
				echo "<br>Fabonacci Series is :<br>";
				$n1=0;
				$n2=1;
				$n3=0;
				echo $n1;
				echo " , ";
				echo $n2;
				for($i=2;$i<$number;++$i)
				{
					$n3=$n1+$n2;
					if($n3>$number)
						break;
					echo " , ";
					echo $n3;
					$n1=$n2;
					$n2=$n3;

				}

			}
			else{
				echo $number;
				echo " : is Composite number";
				echo "<br> Factorial of ";
				echo $number;
				echo "  is : ";
				$factorial=1;
				for($i=1;$i<=$number;$i++)
					$factorial=$factorial*$i;
				echo $factorial;
			}
		}
	}
	
	?>
<h3>Enter number in the range (2-100)</h3>
<form action="" method="POST">
	<input type="number" name="N"><br><br>
	<input type="submit" name="Submit">
</form>
<?php
function pre_r( $array )
{
	echo '<pre>';
	print_r($array);
echo '</pre>';
} 

?>
</body>
</html>