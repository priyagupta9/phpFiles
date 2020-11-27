<?php

$name_server = "localhost";
$name_user = "root";
$password = "";
$name_db="Cmp_Employee";


$conn = new mysqli($name_server, $name_user, $password); //For creating connection


if ($conn->connect_error)               //Checking Connection
 {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully............<br>";



$sql = "CREATE DATABASE Cmp_Employee";      //Creating Database

if ($conn->query($sql) === TRUE){
  echo "Database created successfully..........<br>";
} 

else{ 
 echo "Error creating database: " . $conn->error;
}

echo "........................................<br>";

$conn->close();

$conn = new mysqli($name_server, $name_user, $password,$name_db);


if ($conn->connect_error)
 {
  die("Connection failed: " . $conn->connect_error);
}

echo "DataBase Connected successfully.......................<br>";


 //creating table

$sql = "CREATE TABLE Employee(
Emp_ID INT(10) UNSIGNED  PRIMARY KEY,
Emp_Name VARCHAR(100) NOT NULL,
City VARCHAR(100) NOT NULL,
Email VARCHAR(100),
Salary INT(10))";

if ($conn->query($sql)=== TRUE){
  echo "Table Employee Created successfully<br>";
} 

else {
  echo "Error creating table: " . $conn->error;
}

echo "..................................<br>";

$sql = "INSERT INTO Employee(Emp_ID, Emp_Name, City, Email, Salary) VALUES (2100,'Priya','Delhi','priyagupta9u@gmail.com',75000);";

$sql .= "INSERT INTO Employee(Emp_ID,Emp_Name,City,Email,Salary) VALUES (3210,'Saksham','Banglore','saksh13f@gmail.com',45000);";

$sql .= "INSERT INTO Employee(Emp_ID,Emp_Name,City,Email,Salary) VALUES (1003,'Deepali','Chennai','deepali123@gmail.com',40000);";

$sql .= "INSERT INTO Employee(Emp_ID,Emp_Name,City,Email,Salary) VALUES (1234,'Nitika','Banglore','nitika75@gmail.com',32000)";

$sql .= "INSERT INTO Employee(Emp_ID,Emp_Name,City,Email,Salary) VALUES (3412,'Shruti','Delhi','shruti909@gmail.com',30000);";

if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully................<br>";
}

 else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo ".........................<br>";


$conn->close();


$conn = mysqli_connect($name_server, $name_user, $password, $name_db);


if (!$conn) {                               // Checking connection
  die("Connection failed: " . mysqli_connect_error());
}

//Showing Table
echo "<h2>Employee Table</h2>";
$sql = "SELECT * FROM Employee";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<table><tr><th>Emp_ID</th><th>Emp_Name</th><th>City</th><th>Email</th><th>Salary</th></tr>";


  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row['Emp_ID']. "</td><td>" . $row['Emp_Name']. "</td><td> " . $row['City']. "</td><td> " . $row['Email']. "</td><td>" . $row['Salary'] . "</td><tr>";
    
  } echo "</table>";
}

// Average Salary

$sql = "SELECT AVG(Salary) AS average FROM Employee";
$result= mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result); 

$average = $row['average'];

echo ("<br><h4>The Average Salary of Employee :</h4> $average");

//Employee lived in Banglore

echo "<br><h4>Employee who lives in Banglore city </h4>";
$sql="SELECT Emp_Name FROM Employee WHERE City='Banglore' ";
$result= mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  echo "<table><tr><th>Emp_Name</th></tr>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["Emp_Name"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "No employee lives in banglore ☹";
}

//Drop Database

/*
$sql = "DROP DATABASE Cmp_Employee";

if (mysqli_query($conn, $sql)) {

  echo "Database Dropped successfully---------------<br>";
} 

else {

  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

*/
mysqli_close($conn);

?>