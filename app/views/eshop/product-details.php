<?php $this->view("header",$data); ?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">

				</div>
				<!--start product-->
				<div class="col-sm-9 padding-right">
				<?php if($ROW):?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?=ROOT.$ROW->image?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="<?=ROOT.$ROW->image?>" alt=""></a>
 										</div>
										<div class="item">
										  <a href=""><img src="<?=ROOT.$ROW->image2?>" alt=""></a>
 										</div>
										<div class="item">
										  <a href=""><img src="<?=ROOT.$ROW->image3?>" alt=""></a>
 										</div>
										<div class="item">
										  <a href=""><img src="<?=ROOT.$ROW->image4?>" alt=""></a>
 										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?=$ROW->description?></h2>
								<p>Web ID: 1089772</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>US $<?=$ROW->price?></span>

									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					

					

					
				<!--end product-->
				<?php else: ?>
					<div style="padding: 1em;background-color: grey;color:white;margin:1em;text-align: center;"><h2>That product was not found</h2></div>
				<?php endif; ?>
				</div>

			</div>
		</div>
	</section>

<?php $this->view("footer",$data); ?>