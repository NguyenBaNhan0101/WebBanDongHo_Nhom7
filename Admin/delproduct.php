<?php
    require '../inc/myconnect.php';
    $id = $_GET['id'];

    $sql_disable_fk = "SET FOREIGN_KEY_CHECKS=0";
    $conn->query($sql_disable_fk);  

    $sql_delete_orderdetail = "DELETE FROM orderdetail WHERE ma_sp=".$id;
    $conn->query($sql_delete_orderdetail);

    // sql to delete a record
    $sql = "DELETE FROM product WHERE ma_sp=".$id;

    if ($conn->query($sql) === TRUE) {
        header('Location: qlysanpham.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $sql_enable_fk = "SET FOREIGN_KEY_CHECKS=1";
    $conn->query($sql_enable_fk);

$conn->close();
?>
        <script>
function myFunction() {
    alert("Xóa thành công");
}
</script>