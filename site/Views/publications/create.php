<?php
namespace site\Views\publications;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
		<link rel="stylesheet" type="text/css" href="../style/bootstrap-style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="wrapper">
    <header>
      <?php require_once 'Views/header.php';?>
    </header>

    <main>
      <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#html" data-toggle="tab">HTML</a></li>
            <li><a data-toggle="tab" href="#visual">Visual</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="html">
            <textarea class="form-control" name="raw-HTML" rows="10" form="create-form"></textarea>
          </div>
          <div class="tab-pane" id="visual">
            
          </div>
        </div>
        <form role="form" action="" method="post" id="create-form">
          <div class="form-group">
              <label for="text">Name:</label>
              <input class="form-control" type="text" name="title"></input> 
          </div>
          <button type="submit" name="create" class="btn btn-default">Create</button>
        </form>
      </div> <!-- container -->
    </main>
	
    <footer>
      <?php require_once 'Views/footer.php';?>
    </footer>
</body>
</html>