<!DOCTYPE html>
<html lang="en">

<head>
	  <?php echo $this->_metaHTTP;?>
	  <?php echo $this->_metaName;?>
   <?php echo $this->_title;?>
    <?php echo $this->_cssFiles;?>
</head>

<body>
<?php require_once 'html/header.php' ?>
<?php include_once BLOCK_PATH .'categoryShop.php';?>

<?php 
	require_once MODULE_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
?>

  <!--================ start footer Area  =================-->
  <?php require_once 'html/footer.php' ?>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <?php echo $this->_jsFiles;?>
</body>

</html>