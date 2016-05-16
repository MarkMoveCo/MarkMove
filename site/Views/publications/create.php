<?php
namespace site\Views\publications;
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Create</title>
  <link href="images/logo.png" />
  <link rel="stylesheet" type="text/css" href="../style/reset.css">
  <link rel="stylesheet" type="text/css" href="../style/bootstrap-style.css">
  <link rel="stylesheet" type="text/css" href="../style/header-footer-style.css">
  <link rel="stylesheet" type="text/css" href="../style/default.css">
  <link rel="stylesheet" type="text/css" href="../style/create.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
  </script>
</head>
<body>
  <div id="wrapper">
    <header>
      <?php require_once 'Views/header.php';?>
    </header>

    <main>
        <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
                <li class="sidebar-brand">
                  <i class="fa fa-cog"></i>New draft
                </li>

                <li>
                  <button class="btn preview-button">Preview</button>
                  <button class="btn publish-button">Publish</button>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-newspaper-o"></i>Categories and Tags</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-image"></i>Featured Images</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-share-alt"></i>Sharing</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-wrench"></i>More options</a>
                </li>
          </ul>
      </div>

      <div class="container">
        <div class="content">
          <div class="element">
            <form role="form" action="" method="post" id="create-form">
              <div class="form-group">
                  <input class="form-control" type="text" name="title" placeholder="Title"></input> 
              </div>
            </form>
          </div>

          <div class="element">
            <form role="form" action="" method="post" id="create-form">
              <div class="form-group">
                  <input class="form-control" type="text" name="author" placeholder="Author"></input> 
              </div>
            </form>
          </div>
          
          <ul class="nav nav-tabs">
              <li class="active"><a href="#html" data-toggle="tab">HTML</a></li>
              <li><a data-toggle="tab" href="#visual">Visual</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="html">
              <textarea class="form-control" name="raw-HTML" rows="12" form="create-form"></textarea>
            </div>
            <div class="tab-pane" id="visual">
              
            </div>
          </div>

        </div>
      </div> <!-- container -->
    </main>
	
    <footer>
      <?php require_once 'Views/footer.php';?>
    </footer>
</body>
</html>