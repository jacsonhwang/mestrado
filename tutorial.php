<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="inner clearfix">
			
			<?php
			if(isset($_SESSION["email"])) {
			?>				
			
				<!-- <div class="bx-wrapper"> -->

				<ul class="bxslider">
					<li><img src="http://bxslider.com/images/home_slides/picto.png" class="img-slider" /></li>
					<li><img src="http://bxslider.com/images/home_slides/houses.jpg" class="img-slider" /></li>
					<li><img src="http://bxslider.com/images/home_slides/hillside.jpg" class="img-slider" /></li>
				</ul>

			<!-- </div> -->
					
			<?php
			} else {
			?>
			
				<div class="col-lg-10 col-lg-offset-1">
					<?php echo ERRO_LOGAR; ?>
				</div>
				
			<?php
			}
			?>
			
			<div class="col-lg-12">
				<a class="btn btn-info" href="#" role="button" style="float: left;">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>