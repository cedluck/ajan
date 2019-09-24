<body>
    <div class="row">
        <div class="col-sm-6">
            <form class="form-control has-danger" action="/ajanpoo/controleur/admin/showcase.php" method="post" enctype="multipart/form-data">
                <p>
                    <span class="h3">Créer votre page d'accueil :</span><br/>
                    <label for="section">Nom du site : </label>
                    <input class="form-control" type="text" name="site" /><br/>
                    <label for="section">Texte de présentation : </label>
                    <input class="form-control" type="text" name="presentation" /><br/>
                    <label for="section">Image de fond (.jpg .jpeg .gif .png) : </label>
                    <input class="form-control" type="file" name="monfichier" /><br/>         
                    <input class="form-control bg-danger text-white" type="submit" value="Créer"/>
                </p>
            </form>
        </div>
        <div class="col-sm-6">
            <img src="imgShowcase/<?php echo $showcase['showcase'] ?>" height="300" /><br><span class="text-white"><?php echo $showcase['showcase'] ?></span><span class="text-white titles"><?php echo $showcase['site_name'] ?></span><span class="text-white titles"><?php echo $showcase['site_presentation'] ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-control has-danger" action="/ajanpoo/controleur/admin/create_table.php" method="post" enctype="multipart/form-data">
                <p>
                    <span class="h3">Créer un port-folio :</span><br/>
                    <label for="section">Nom du modèle : </label>
                    <input class="form-control" type="text" name="table" /><br/>
                    <label for="section">Image de fond (.jpg .jpeg .gif .png) : </label>
                    <input class="form-control" type="file" name="monfichier" /><br/>         
                    <input class="form-control bg-danger text-white" type="submit" value="Créer"/>
                </p>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
                <h5> Section : </h5>        
                <?php 
                foreach($books as $book)
                { ?>
                <div class="col-sm-1">
                    <a href="#<?php echo $book->id() ?>"><h6><?php echo $book->name() ?></h6></a>
                </div>
                <?php } ?>       
        </div>
    </div>
    <?php if(isset($_GET['message']) AND $_GET['message']!=NULL)
    { ?>    
    <div id="message" class="row">
        <div class="col-sm-12 ">
            <div class="alert alert-danger text-center" role="alert">               
                 <h3><strong>INFO !</strong> <?php echo $_GET['message'];?></h3><!--<a href=""><strong id="btn"><i class="fa fa-times" aria-hidden="true"></i></strong></a>-->
            </div>
        </div>
    </div>
    <?php   } ?>
    <div class="row">