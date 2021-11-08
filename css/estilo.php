<?php
// Define que o arquivo terá a codificação de saída no formato CSS
header("Content-type: text/css");
$banner = $_GET["banner"];
?>

.banner-area{
    background: url(../conteudos/texto/<?php echo $banner; ?>) no-repeat center !important;
}