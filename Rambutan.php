<?php

if (!isset($_SESSION))
{
	
    session_start();
    $_SESSION['item'] = array(
    "Akane 4098",
    "Alkmene 3000",
    "Beet 4537",
    "Dandelion 1234",
    "carrot 4567"
);

}

?>
<html>
<body>
<form action="Index.php">
    <input type="submit" value="Back to Input" />
</form>
</body>

<table>
	<tr>
	<th>Item</th>
    	<th>PLU</th>
	</tr>


<?php


$image2 = "<form action=''>
<input type='text' 'name='filename'>
<input type='submit'>
</form>";
if (!empty($_POST['foodItem']) && !empty($_POST['ItemPlu']) && !empty($_POST['$_Post[\'foodItem\']'])){
    
    $value = $_POST['foodItem'] . ' ' . $_POST['ItemPlu'] . ' ' . $_POST['filename']; 
    array_push($_SESSION['item'],$value);



}
elseif (!empty($_POST['foodItem']) && !empty($_POST['ItemPlu'])){
    $value = $_POST['foodItem'] . ' ' . $_POST['ItemPlu']; 
    array_push($_SESSION['item'],$value);
}

$items = $_SESSION['item'];
usort($items, 'strnatcasecmp');

foreach ($items as $row){
    $value = explode(" ",$row);
    if(count($value)== 2){
    echo "<tr> <td>$value[0]</td> <td> $value[1]</td> <td> <form action=''>
    <input type='text' 'name='value[0]'>
    <input type='submit'>
    </form> </td> <td><img src='placeholder.png'> </td> <tr>"; 
	}
    else{
        
        echo "<tr> <td>$value[0]</td> <td> $value[1]</td> <td> $value[2] </td><tr>"; 
        #<img src='$value[2]' alt='OIP.jfif'> </td> 
    }
}
?>
</table>
</html>

