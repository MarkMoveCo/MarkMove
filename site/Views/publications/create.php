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
                  <a href="#" class="dropdown-toggle" data-toggle="collapse"
                  data-target="#cats-tags" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-newspaper-o"></i>Categories and Tags</a>
                  <div id="cats-tags" class="collapse">
                    <form class="form">
                      <p>Categories</p>
                      <div class="checkbox">
                        <label><input type="checkbox">Nature</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox">Goli kaki</label>
                      </div>
                      <div class="checkbox disabled">
                        <label><input type="checkbox" value="" disabled checked>Uncategorized</label>
                      </div>
                      <a class="fa fa-folder-open" href="#"> Add new category</a>
                      <p>Tags</p>
                      <input type="text" name="">
                    </form>
                  </div>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="collapse"
                  data-target="#images" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-image"></i>Featured Images</a>
                  <div id="images" class="collapse">
                    <button type="button">
                      <i class="fa fa-image"></i>
                      <span>Set Featured Image</span>
                    </button>              
                  </div>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="collapse" 
                  data-target="#sharing"role="button" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-share-alt"></i>Sharing</a>
                  <div id="sharing" class="collapse">
                    <p>Connect and select social media services to automatically share this post.</p>
                    <p><strong>Facebook</strong></p>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Nqkoi si tam</label>
                    </div>
                    <p><strong>Twitter</strong></p>
                    <div class="checkbox">
                      <label><input type="checkbox" value="">Koi si ti be</label>
                    </div>
                  </div>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="collapse" 
                  data-target="#more" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-wrench"></i>More options</a>
                  <div id="more" class="collapse">
                    <p>Location</p>
                    <button type="button">
                      <i class="fa  fa-location-arrow"></i>
                      <span>Get current location</span>
                    </button>
                    <input type="search" name="" placeholder="Search..." role="search">
                  </div>
                </li>
          </ul>
      </div>

      <div class="container">
        <div class="content">
          <div style="margin-top:10px;">
            <form role="form" action="" method="post" id="create-form">
              <div class="col-sm-8 form-group">
                  <input class="form-control" type="text" name="title" placeholder="Title"></input> 
              </div>
            </form>
          </div>

          <div>
            <form role="form" action="" method="post" id="create-form">
              <div class="col-sm-8 form-group">
                  <input class="form-control" type="text" name="author" placeholder="Author"></input> 
              </div>
            </form>
          </div>
          
          <div class="col-sm-8">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#html" data-toggle="tab">HTML</a></li>
              <li><a data-toggle="tab" href="#visual">Visual</a></li>
            </ul>
          </div>

          <div class="col-sm-8 tab-content">
            <div class="control-box">
              <button class="element fa fa-image" role="presentation" tabindex="-1">
              </button>

              <button class="element dropdown" role="presentation" tabindex="-1">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paragraph<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><h1>Heading 1<h1></a></li>
                  <li><a href="#"><h2>Heading 2</h2></a></li>
                  <li><a href="#"><h3>Heading 3</h3></a></li>
                  <li><a href="#"><h4>Heading 4</h4></a></li>
                  <li><a href="#"><h5>Heading 5</h5></a></li>
                  <li><a href="#"><h6>Heading 6</h6></a></li>
                </ul>
              </button>

              <button class="element fa fa-bold" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-italic" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-underline" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-list-ul" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-list-ol" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-link" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-quote-left" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-align-left" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-align-center" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-align-right" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-align-justify" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-font" role="presentation" tabindex="-1">
              </button>

              <button class="element fa fa-eraser" role="presentation" tabindex="-1">
              </button>
            </div>

            <div class="tab-pane active" id="html">
              <textarea class="form-control" name="raw-HTML" rows="16" form="create-form"></textarea>
            </div>

            <div class="tab-pane" id="visual" style="width: 100%; height: 738px; display: block;">
               <!DOCTYPE html>
                <html style="overflow-y: hidden;">
                <head>
                  <title></title>
                </head>
                <body style="overflow-y: hidden; padding-left: 1px; padding-right: 1px; padding-bottom: 50px;">
                  <p> </p>
                </body>
                </html>       
            </div>
          </div>
        </div> <!-- content -->
      </div> <!-- container -->
    </main>
</body>
</html>