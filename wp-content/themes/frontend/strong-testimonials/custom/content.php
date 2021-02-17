<?php

/**
 * Template Name: MyCustom
 * Description: The MyCustom template.
 */
?>
<?php do_action('wpmtst_before_view'); ?>

<div style="margin-top: 15px;" class="strong-view " <?php wpmtst_container_data(); ?>>

	<?php do_action('wpmtst_view_header'); ?>

	<div class="strong-content row  small-gutters equal">
		<?php do_action('wpmtst_before_content'); ?>

		<?php while ($query->have_posts()) : $query->the_post(); ?>
			<div class=" <?php wpmtst_container_class(); ?>">
				<div class="row site-block-shadow site-review">
					<?php do_action('wpmtst_before_testimonial'); ?>
					<div class="row">

						<div class="col-2">
							<div class="site-review-photo site-block-shadow">
								<div class="not-photo"><i class="i-graduate-student-avatar"></i></div>
								<?php wpmtst_the_thumbnail(); ?>
							</div>
						</div>

						<div class="col-10">

							<div class="site-review-info">
								<div class="site-review-info__header">
									<?php wpmtst_the_client(); ?>
								</div>



								<div class="front-desc">
									<?php wpmtst_the_content(); ?>
								</div>
							</div>
							<?php do_action('wpmtst_after_testimonial_content'); ?>

						</div>

					</div>
					<div class="row">

						<div class="col-12">

							<div class="site-review-info front-desc site-review-info-mobile" style="padding: 0px !important;">
								<?php wpmtst_the_content(); ?>
							</div>
							<?php do_action('wpmtst_after_testimonial_content'); ?>

						</div>

					</div>
					<?php do_action('wpmtst_after_testimonial'); ?>

				</div>
			</div>
		<?php endwhile; ?>

		<?php do_action('wpmtst_after_content'); ?>
	</div>

	<?php do_action('wpmtst_view_footer'); ?>
</div>

<?php do_action('wpmtst_after_view'); ?>