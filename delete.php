<?php
include 'conn.php';
$id = $_GET['id'];

if (isset($id)) {

$sql = "DELETE FROM users where userId = $id";
if ($conn->query($sql)) {
         header("location:manage_users.php");
}else {
        echo "<script>alert('<?php    echo 'Error' .$conn->error;  ?>');location.herf'index.php'</script>";

}

}
?>