<html>
<head>
<title>Registration form</title>
<style>
body {
font-family: Arial;
background-color: #f2f2f2;
}
.container {
width: 400px;
margin: 30px auto;
padding: 20px;
background-color: white;
border-radius: 10px;
box-shadow: 0 0 8px gray;
}
h1 {
text-align: center;
}
.form-group {
margin-bottom: 12px;
}
label {
display: block;
margin-bottom: 5px;
}
input, textarea, select {
width: 100%;
padding: 8px;
box-sizing: border-box;
}
button {
padding: 10px;
width: 100%;
background-color: blue;
color: white;
border: none;
cursor: pointer;
}

.error {
color: red;
font-size: small;
}
</style>
</head>
<body>
<center>
<div class="container">
<form method="POST">
<h1>Registration form</h1>
<div class="form-group">
<label for="name">Name:</label>
<input type="text" id="name" name="name" placeholder="Enter your name">
<label for="phone">Phone</label>
<input type="tel" id="phone" name="phone">
<label for="email">Email</label>
<input type="email" id="email" name="email"><br>
<label for="address">Address:</label>
<textarea id="address" name="address"></textarea><br>
<label for="qlf">Qualification:</label>
<select id="qlf" name="qlf">
<option value="">Select a Qualification</option>
<option value="B">Bachelor's Degree</option>
<option value="M">Master's Degree</option>
</select>
<br>
<label for="pass">Password:</label>
<input type="password" id="pass" name="pass"><br>
<label for="cpass">Confirm password: </label>
<input type="password" id="cpass" name="cpass"><br>
<button type="submit">Register</button>
</div>
</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$name=$_POST['name']??''; 
$phone=$_POST['phone']??''; 
$email=$_POST['email']??''; 
$qlf=$_POST['qlf']??''; 
$pass=$_POST['pass']??''; 
$cpass=$_POST['cpass']??''; 
$address=$_POST['address']??''; 

$errors=[];

if(empty($name)){
$errors['name']="Name is required";
}if(empty($phone)){
$errors['phone']="Phone is required";
}
else if(!preg_match("/^[0-9]{10}$/",$phone)){
$errors['phone']="Phone no. must be a valid 10 digit no.";
}
if(empty($email)||!filter_var($email,FILTER_VALIDATE_EMAIL)){
$errors['email']="Valid email is required";
}
if(empty($qlf)){
$errors['qlf']="Qualification is required";
}
if(empty($address)){
$errors['address']="Address is required";
}
if(empty($pass)||empty($cpass)){
$errors['pass']="Password is required";
} else if($pass!=$cpass){
$errors['cpass']="Passwords do not match";
}else if(strlen($pass)<8){
$errors['pass']="Password must be atleast 8 characters";
}
if(!empty($errors)){
foreach($errors as $field => $message){
echo "<p class='error'>$message</p>";
}

}else{
echo"<script>alert('Registration successful!');
</script>";
}}
?>
</div>
</center></body></html>
