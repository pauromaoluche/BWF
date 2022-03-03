<?php

?>

<!-- Carousel================================================== -->
<div id="carouselHome" class="carousel slide hidden-xs hidden-sm" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php foreach ($banners as $key => $banner) : ?>
			<li class="paginationHome" data-target="#myCarousel" data-slide-to="<?= $key ?>" class="<? if ($key == 0) {
																										echo 'active';
																									} ?>"></li>
		<?php endforeach ?>
	</ol>
	<div class="carousel-inner">
		<?php $active = 0; ?>
		<?php foreach ($banners as $key => $banner) : ?>
			<div class="carousel-item <? if ($active == 0) {
											echo 'active';
											$active++;
										} ?>">
				<? if ($banner->link) { ?><a href="<?= $banner->link ?>" target="_blank"><?php } ?>
					<div style="clip-path: polygon(5% 0, 75% 0%, 100% 0, 88% 73%, 33% 96%, 0 13%);">
						<div id="img-bannerHome" style="background: url(<?= $banner->images[1]->folder_file ?><?= $banner->images[1]->file ?>)"></div>
					</div>

					<div class="carousel-caption">
						<h2><?= nl2br($banner->images[1]->title) ?></h2>
						<p><?= nl2br($banner->images[1]->legend) ?></p>
					</div>
					<? if ($banner->link) { ?>
					</a><?php } ?>
				<? if ($banner->images[0]->folder_file) : ?>
					<div class="logo"><img class="img-fluid" src="<?= $banner->images[0]->folder_file ?><?= $banner->images[0]->file ?>" title="<?= $banner->title ?>" width="200"></div>
				<?php endif ?>

			</div>
		<?php endforeach; ?>
	</div>

	<a style="color: black;" class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
		<i class="fas iconCarousel fa-chevron-left"></i>
	</a>
	<a style="color: black;" class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
		<i class="fas iconCarousel fa-chevron-right"></i>
	</a>
</div>
<!-- /.carousel -->

<div class="BannerMobile">
	<div id="carouselHomeMobile" class="carousel slide hidden-xs hidden-sm" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php foreach ($banners as $key => $banner) : ?>
				<li class="paginationHome" data-target="#myCarousel" data-slide-to="<?= $key ?>" class="<? if ($key == 0) {
																											echo 'active';
																										} ?>"></li>
			<?php endforeach ?>
		</ol>
		<div class="carousel-inner">
			<?php $active = 0; ?>
			<?php foreach ($banners as $key => $banner) : ?>
				<div class="carousel-item <? if ($active == 0) {
												echo 'active';
												$active++;
											} ?>">
					<? if ($banner->link) { ?><a href="<?= $banner->link ?>" target="_blank"><?php } ?>
						<!-- <img src="<?= $banner->images[1]->folder_file ?><?= $banner->images[1]->file ?>"> -->
						<div class="bannerM" style="background: url(<?= $banner->images[1]->folder_file ?><?= $banner->images[1]->file ?>)"></div>

						<div class="carousel-caption">
							<h2><?= nl2br($banner->images[1]->title) ?></h2>
						</div>
						<? if ($banner->link) { ?>
						</a><?php } ?>

				</div>
			<?php endforeach; ?>
		</div>
		<a class="carousel-control-prev" href="#carouselHomeMobile" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselHomeMobile" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

</div>

<?php if (count($oursolutions)) : ?>
	<!-- Nossas Soluções -->
	<section class="solutions">
		<div class="container">
			<div class="row">
				<?php foreach ($oursolutions as $key => $solutions) : ?>
					<div class="col-sm-12">
						<h2 style="text-align: center;"><?= $solutions->title ?></h2>
					</div>
					<div class="col-sm-6">
						<img class="img-fluid" src="<?= $solutions->images[0]->folder_file ?><?= $solutions->images[0]->file ?>" />
					</div>
					<div class="col-sm-6 VerticalLine">
						<h3><?= $solutions->titletext ?></h3>
						<p><?= $solutions->textsolution ?></p>
						<div class="container-fluid p-0 d-flex justify-content-end">
							<div class="btn p-0">
								<a class="btn btn-primary" href="/solutions" role="button">Saiba Mais</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if (count($controlimg)) : ?>
	<section class="control">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-12">
					<div class="container-fluid p-0 d-flex justify-content-center">
						<h2><b><?= page_information('control', 'title'); ?></b></h2>
					</div>
					<div class="container">
						<?php foreach ($controlimg as $key => $control) : ?>
							<? if ($control->images[0]->folder_file) : ?>
								<div class="imgLeft">
									<img class="img-fluid" src="<?= $control->images[0]->folder_file ?><?= $control->images[0]->file ?>">
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col-12 mt-5 ">
					<h2 class="mt-5 pt-5 pb-3 mb-2" style="color: #284287;"><b><?= page_information('titlecounter', 'title'); ?></b></h2>
				</div>
				<?php foreach ($controllist as $key => $list) : ?>
					<style>
						.title {
							padding-left: 5px;

						}

						.antes {
							padding-right: 5px;
						}
					</style>
					<div class="col-6 counter">
						<h3><?= $list->icon; ?></h3>
						<div class="d-inline-flex" data-counter="counterStart">
							<h4 class="antes"><?= $list->beforeNum ?> </h4>
							<h4 class="teste<?= $key ?> timer count-title count-number" data-to="<?= $list->num; ?>" data-speed="2999"></h4>
							<h4 class="title"><?= $list->title; ?></h4>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>


<?php if (count($whoweare)) : ?>
	<!-- Quem somos nós -->
	<section class="WhoweAre">
		<div class="container">
			<div class="row">
				<?php foreach ($whoweare as $key => $whweare) : ?>
					<?php if ($key == 0) {  ?>
						<div class="col-6 col-sm-5 col-md-5 col-sm-5">
							<div class="whoAre1">
								<h2><?= $whweare->title ?></h2>
								<p><?= $whweare->text ?></p>
							</div>
						</div>
						<div class="col-6 col-sm-7 col-md-7 col-lg-7">
							<div class="imgWhoAre1">
								<div class="imgHex" style=" background-image: url(<?= $whweare->images[0]->folder_file ?><?= $whweare->images[0]->file ?>);"></div>
							</div>
						</div>
					<?php } ?>
					<?php if ($key == 1) { ?>
						<div class="col-12" style="text-align: right;">
							<div class="row">
								<div class="col-7 col-sm-8 col-md-8 col-lg-8">
								</div>
								<div class="col-5 col-sm-4 col-md-4 col-lg-4">
									<div class="whoAre2">
										<?php ?>
										<h3><span style="color: #284287;"><?= $whweare->title ?></span></h3>
										<p><?= $whweare->text ?></p>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>


<?php if (count($testimunials)) : ?>
	<!-- testimonials -->
	<section class="testimonials">
		<div class="container testemunho">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2><?= page_information('testimonials', 'title'); ?></h2>
				</div>
				<div class="col-sm-12 text-center">
					<p><?= page_information('testimonials'); ?></p>
					<br> <br>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<? foreach ($testimunials as $key => $testimunial) : ?>
					<? if ($testimunial->images[0]->folder_file) : ?>
						<div class="col-sm-12 col-md-6 col-lg-4">
							<div class="card">
								<div class="row">
									<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-3 text-center TestimoUser">
										<div class="TestimoHex">
											<div class="shape">
												<img class="img-fluid" src="/images<?= $testimunial->images[0]->folder_file ?>250x250-1/<?= $testimunial->images[0]->file ?>">
											</div>
										</div>
									</div>
									<div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-9 collaboratorInfo">
										<h3><?= $testimunial->title ?></h3>
										<small><?= $testimunial->role ?></small>
										<small class="company">~<?= $testimunial->company ?></small>
									</div>
									<div class="col-md-12">
										<div class="testiminual-text">
											<p><?= $testimunial->text ?></p>
										</div>
									</div>

								</div>
							</div>
						</div>
					<? endif; ?>
				<? endforeach; ?>
			</div>
		</div>
		</div>
	</section>
<?php endif; ?>

<?php if (count($partners)) : ?>
	<!-- Patterns -->
	<section class="patterns">
		<div class="col-sm-12" style="text-align: center;">
			<h2><?= page_information('patterns', 'title'); ?></h2>
		</div>
		<div class="col-sm-12" style="text-align: center;">
			<p><?= page_information('patterns'); ?></p>
			<br><br>
		</div>
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="container">
						<div class="row">
							<? foreach ($partners as $key => $partner) : ?>
								<? if ($partner->images[0]->folder_file) : ?>
									<div class="col-6 col-sm-6 col-md-3">
										<div class="card">
											<img src="<?= $partner->images[0]->folder_file ?><?= $partner->images[0]->file ?>" title="<?= $partner->title ?>" class="img-fluid">
										</div>
										<br>
									</div>
								<? endif; ?>
								<? if (is_int(++$key / 4)) : ?>
						</div>
						<div class="row">
						<? endif; ?>
					<? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</section>
<?php endif; ?>