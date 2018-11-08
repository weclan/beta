<!DOCTYPE html>
<html>
<head>
	<title>multi bahasa</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>marketplace/css/bootstrap.css">
</head>
<body>

	<div class="continer">
			
			<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= base_url() ?>bahasa">Home</a></li>
        <li><a href="<?= base_url() ?>bahasa/page2">Page2</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">bahasa <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url() ?>bahasa/change/english">English</a></li>
            <li><a href="<?= base_url() ?>bahasa/change/chinese">Mandarin</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
<div class="panel">
	<?= $this->lang->line('hello') ?>&nbsp;<?= $this->lang->line('world') ?>
</div>
</div>

		</div>
	</div>

<script type="text/javascript" src="<?= base_url() ?>marketplace/js/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>marketplace/js/bootstrap.js"></script>	

</body>
</html>