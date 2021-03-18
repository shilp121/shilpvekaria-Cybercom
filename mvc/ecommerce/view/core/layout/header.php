<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/<?php //echo $_GET['a'] ?>.css"> -->
    <title>Document</title>
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/admin/js/jquery-3.6.0.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/admin/js/index.php'); ?>"></script>

</head>
<body>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item ">
     <!--  <a class="nav-link"  onclick="object.setUrl('<?php// echo $this->getUrl()->getUrl('grid','customer'); ?>').load(); " href="">Customer</a>-->    
     <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','customer',null,true); ?>"><b>Customer</b></a> 
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','product',null,true); ?>">Product</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','category',null,true); ?>">Category</a>
    </li>
     <li class="nav-item ">
      <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','shipping',null,true); ?>">Shipping</a>
    </li>
    </li>
     <li class="nav-item ">
      <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','payment',null,true); ?>">Payment</a>
    </li>
     </li>
     <li class="nav-item ">
      <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','customerGroup',null,true); ?>">customerGroup</a>
    </li>
     </li>
     <li class="nav-item ">
      <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','admin',null,true); ?>">Admin</a>
    </li>
  </ul>
</nav>
