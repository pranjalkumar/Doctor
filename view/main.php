<html>
<head>
    <?php include 'includes/styles.html';?>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php include 'includes/navbar.php';?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<div class="text-center">
<form class="search-form" action="detail.php" method="get" autocomplete="off">
    <div class="input-group col-md-12">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input id="text" list="completion" name="text" type="text" class="form-control input-lg" placeholder="Enter the branch of doctor you want to contact">

        <datalist id="completion">
        </datalist>

        <div class="input-group-btn">
            <button class="btn btn-primary btn-lg search-btn" type="submit" id="search">&nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;</button>
        </div>
    </div>    
</form>
</div>
</div>
    </div>
</div>

<?php include 'includes/scripts.html';?>

<script src="js/searchAjax.js"></script>
</body>
</html>