<!--content-->
<div class="col-md-12" id="<?php echo $theid ?>">
	<div class="mycard <?php echo $thecolor?>" >
			<div class="card-block">                  
					<div class="row" >
							<div class="col-md-4">
									<!--change_style button -->
									Changer le style du titre : <a href="controleur/admin/change_style.php?style=<?php echo $thestyle ?>&id=<?php echo $theid ?>" class="badge badge-danger" title="Changer le style du titre."><?php echo $thestyle ?></a><br>
									<a href="" data-toggle="modal" data-target="#<?php echo $thebook,$theid,$theid ?>" class="badge badge-danger" title="Changer le titre."><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></a> 
									<!-- name -->
									<span class="h1 border <?php echo $thestyle ?>"><?php echo $thename ?></span>
									<!--change_name modal-->
									<div id="<?php echo $thebook,$theid,$theid ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">                              
													<div class="modalbody">
														<a href="" class="badge badge-danger" title="Annuler" data-dismiss="modal">Annuler</a> Entrez un nouveau titre : 
													</div>
													<form class="form-control has-danger" action="controleur/admin/change_name.php" method="post"> 
														<input class="form-control" type="text" name="newname" /><br>
														<input class="form-control sr-only" type="text" name="id" value="<?php echo $theid ?>">
														<input class="form-control bg-danger text-white" type="submit" value="Changer"/>
													</form>  
											</div>                               
									</div>
									<!--del_table button-->
									<a href="" data-toggle="modal" data-target="#<?php echo $thebook ?>" class="text-center" title="Efface tout le port-folio."><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
									<!-- SECTION DELETE MODAL -->
									<div id="<?php echo $thebook ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">                              
													<div class="modalbody">
													VOULEZ-VOUS VRAIMENT EFFACER CE PORT-FOLIO ?
													</div>    
													<div class="modalfooter">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
															<a href="controleur/admin/del_table.php?id=<?php echo $theid ?>&table=<?php echo $thebook ?>&name=<?php echo $thename ?>" class="text-center"><button type="button" class="btn btn-danger">OUI</button></a>
													</div>
											</div>                               
									</div><!-- ./SECTION DELETE MODAL -->
									<!--section_down button-->
									<a href="controleur/admin/section_down.php?name=<?php echo $thename ?>&id=<?php echo $theid ?>"><i class="fa fa-arrow-down fa-2x" aria-hidden="true" title="Descend le port folio d'un cran."></i></a>
									<!--section_up button-->
									<a href="controleur/admin/section_up.php?name=<?php echo $thename ?>&id=<?php echo $theid ?>"><i class="fa fa-arrow-up fa-2x" aria-hidden="true" title="Remonte le port folio d'un cran."></i></a>
									<br><br>
									<form class="form-control has-danger" action="/ajanpoo/controleur/admin/add_img.php?name=<?php echo $thename ?>" method="post" enctype="multipart/form-data">
											<!--Add Photo form -->
											<span class="h3">Ajouter une photo :</span><br />
											<p>
													<label for="exampleSelect1">(.jpg .jpeg .gif .png)</label>
													<input class="form-control sr-only" type="text" name="table" value="<?php echo $thebook ?>">
													<input class="form-control" type="file" name="monfichier" /><br />
													<input class="form-control bg-danger text-white" type="submit" value="Envoyer le fichier"/>
											</p>
									</form>                    
									<strong class="icon"><i class="fa fa-times" aria-hidden="true"></i></strong> : efface l'image ou le port-folio.<br/>
									<strong class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></strong> : change l'image de fond.<br/>
									<strong class="icon"><i class=" fa fa-arrow-left" aria-hidden="true"></i> <i class="fa fa-arrow-up" aria-hidden="true"></i> <i class="fa fa-arrow-right" aria-hidden="true"></i> <i class="fa fa-arrow-down" aria-hidden="true"></i></strong> : Modifie les positions.<br/>
									<strong class="icon">en rouge</strong> : désigne l'image de fond.<br/><br/>
									<!--change_color button-->
									<h5>Changer la couleur de fond : <a href="controleur/admin/change_color.php?color=<?php echo $thecolor ?>&id=<?php echo $theid ?>" title="Change la couleur de fond de la section" class="badge badge-danger"><?php echo $thecolor ?></a></h5>
							</div>
							<div class="col-md-8">
									<div class="row">                
											<?php foreach($donnees as $key => $donnee){													
													$theactive = $donnee->isActive();							
													$theimg = $donnee->imgName();
													$theid = $donnee->id();												
											?>                   
											<div class="col-md-2">
													<div class="mycard <?php echo $theactive ?>" style="width: 100%; height: 14%;margin-bottom: 5px;">
															<!--output carousel number-->
															<p class="card-title text-center"><?php echo $key+1 ?></p>
															<!--display image--> 
															<div class="card-img-top" style="margin:auto;" >
																	<img style="height: 2rem;"class="card-img-top" src="img/<?php echo $theimg ?>">
															</div>
															<!--output image title-->
															<span class="card-title text-center" style="font-size:10px;"><?php echo $theimg ?><br/>
															</span>
															<!--push_bwd button-->
															<a href="controleur/admin/push_bwd.php?table=<?php echo $thebook ?>&id=<?php echo $theid ?>&img=<?php echo $theimg ?>" class="text-center" title="Avance la photo dans le caroussel"><i class="fa fa-arrow-left <?php echo $theactive ?>" aria-hidden="true"></i></a>
															<!--del_img button-->
															<a href="" data-toggle="modal" data-target="#<?php echo $thebook,$theid ?>" class="text-center" title="Enlève la photo."><i class="fa fa-times <?php echo $theactive ?>" aria-hidden="true"></i></a>
															<!-- PHOTO DELETE MODAL -->
															<div id="<?php echo $thebook,$theid ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">          
																			<div class="modalbody">
																			VOULEZ-VOUS VRAIMENT EFFACER CETTE PHOTO ?
																			</div>    
																			<div class="modalfooter">
																					<button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
																					<a href="controleur/admin/del_img.php?table=<?php echo $thebook ?>&name=<?php echo $thename ?>&img_name=<?php echo $theimg ?>&id=<?php echo $theid ?>" class="text-center"><button type="button" class="btn btn-danger">OUI</button></a>
																			</div>
																	</div>                               
															</div><!-- ./PHOTO DELETE MODAL -->
															<!--make_active button -->
															<a href="controleur/admin/make_active.php?table=<?php echo $thebook ?>&name=<?php echo $thename ?>&img_name=<?php echo $theimg ?>&id=<?php echo $theid ?>" class="text-center" title="Photo de fond d'écran."><i class="fa fa-check-square <?php echo $theactive ?>" aria-hidden="true"></i></a>
															<!--push_fwd button -->
															<a href="controleur/admin/push_fwd.php?table=<?php echo $thebook ?>&id=<?php echo $theid ?>&img=<?php echo $theimg ?>" class="text-center" title="Recule la photo dans le caroussel"><i class="fa fa-arrow-right <?php echo $theactive ?>" aria-hidden="true"></i></a>
													</div>                           
											</div>
											<?php }; ?>
									</div>
							</div>                  
					</div>
			</div>
	</div>
	<br/>
</div>