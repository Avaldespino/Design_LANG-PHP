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



if (!empty($_POST['foodItem']) && !empty($_POST['ItemPlu'])){
    $foodName = $_POST['foodItem'];
    $foodPLU = $_POST['ItemPlu'];
    
    $value = $_POST['foodItem'] . ' ' . $_POST['ItemPlu'];    
    array_push($_SESSION['item'],$value);
    
    



}
$items = $_SESSION['item'];
usort($items, 'strnatcasecmp');


for ($I = 0; $I < count($_SESSION['item']); $I++){
    
    
    $value = explode(" ", $_SESSION['item'][$I]);
    if(!empty($_POST[$value[0]])){
        $_SESSION['item'][$I] = $_SESSION['item'][$I] . " " . $_POST[$value[0]];
    }
    $view = $_SESSION['item'][$I];
    echo "<tr> <td>$view</td> <td>$value[1]</td> <tr>";
    
}








$items = $_SESSION['item'];

foreach ($items as $row){
    $value = explode(" ",$row);
    $imagePath = "<form action='' method = 'post'>
<input type='text' name = $value[0]>
<input type='submit'>
</form>";
    if(count($value)== 2){
    echo "<tr> <td>$value[0]</td> <td> $value[1]</td> <td> $imagePath </td> <td><img src='placeholder.png'> </td> <tr>"; 
	}
    else{
        
        echo "<tr> <td>$value[0]</td> <td> $value[1]</td> <td> <img src=$value[2]> </td><tr> <br>"; 
        #<img src='$value[2]' alt='OIP.jfif'> </td> 
    }
}
?>
</table>
</html>

