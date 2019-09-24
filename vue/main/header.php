 <?php //echo 'vue main...'; ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Parallax Website Demo</title>
  <link rel="stylesheet" href="css/style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status='..message perso .. '; return true;">
  <div class="pimg1" style="background-image:url('imgShowcase/<?php echo $showcase['showcase'] ?>');">
    <div class="ptext">
      <span class="title border background">
        <?php echo $showcase['site_name'] ?>
      </span>
      <p><br><?php echo $showcase['site_presentation'] ?></p>
    </div>
  </div>
  <div id="onScroll"></div>
  <section id="navbar" class="section section-first">
    <div  class="row">
      <?php foreach($books as $key => $book)
      { $active = $imageManager->getActive($book->book()); ?>
      <div>
        <div class="col-sm-1 title-nav">       
          <a  href="#<?php echo $book->book() ?>"><img  src="img/<?php echo $active['img_name'] ?>" ></a>        
        </div>
        <div class="imgName">
          <a href="#<?php  echo $book->book() ?>"><?php echo preg_replace('#(.{0})[\s](.*)#', '$1', substr($book->name(), 0, 15)) ?></a>
        </div>
      </div>
      <?php } ?>
    </div>
    <div id="nav"class="text-center">
      <a href="#<?php echo $books[0]->book() ?>"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
    </div>
  </section>



  

  