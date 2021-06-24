<?php
$style="../css/style.css";
session_start();
if ($_SESSION["roleId"] != 0){
    header("location: ../");
}
 include "../common/template.php";
 include "./adminContent/menuAdmin.php";
 ?>
 <div class="taillefenetre">
                    
 <?php
    if(!empty($_GET['page'])){
    include '../../src/pages/adminContent/'.$_GET['page'].'.php';
    }


?>
</div>

<?php
include "../common/footer.php";