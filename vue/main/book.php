  <!-- SECTION-->
  <section>
    <!--BG image and title-->
    <div id="<?php echo $thebook ?>" class="pimg" style="background-image:url('img/<?php echo $theactive['img_name'] ?>'); ">
      <div class="ptext">
        <span class="border <?php echo $thestyle ?>">
          <?php echo strtoupper($thename);?>
        </span>
      </div>
    </div>  
    <div class="section <?php echo $thecolor ?>">
      <p>
        <div id="carousel<?php echo $theid ?>" class="carousel slide" data-ride="carousel">
          <!--Indicators display-->
          <ol class="carousel-indicators">
          <?php
          foreach($images as $key => $image)
          { ?>
            <li data-target="#carousel<?php echo $theid ?>" data-slide-to="<?php echo $key ?>" class="ind-frame <?php echo $image->isActive() ?>"></li>         
          <?php
          }; ?>
          </ol>
          <!--Images display-->
          <div class="carousel-inner" role="listbox">
          <?php
          foreach($images as $image)
          { ?>
            
            <div class="carousel-item <?php echo $image->isActive() ?>">
              <div class="img-frame">
                <img class="d-block img-fluid mx-auto" src="img/<?php echo $image->imgName() ?>"/>
              </div>
            </div>
          <?php
          }; ?>
          </div>
          <!-- Navigation arrow display-->
          <a class="carousel-control-prev" href="#carousel<?php echo $theid ?>" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel<?php echo $theid ?>" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </p>
      <!-- Down Arrow display-->
      <div class="arrow-down text-center">
        <?php 
        if($thenextbook != $thebook)
        { ?>
          <a href="#<?php echo $thenextbook ?>"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
        <?php }
        else
        { ?>
           <a href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
        <?php } ?>
      </div>
    </div>
  </section>