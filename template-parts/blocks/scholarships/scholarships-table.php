<?php
$my_query = new WP_Query(
	array(
		'post_type'   => 'scholarship',
		'orderby'     => 'title',
		'order'       => 'ASC',
		'post_status' => 'publish',
		'facetwp'     => true,
	),
);


if ( $my_query->have_posts() ) : ?>

	<div class="schedule-results">
		<div class="table-sort">
			<div class="table-sort-results-number" aria-live="polite" role="region" data-label="Scholarships">
				<?php echo intval( $my_query->found_posts ); ?> Scholarships
			</div>
			<!-- per page -->
			<div class="table-sort-per-page">
				<label for="fwp_results_per_page">Results Per Page</label>
				<?php echo do_shortcode( '[facetwp facet="results_per_page"]' ); ?>
			</div>
		</div>
		<h2 class="sr-only">Results</h2>
		<table class="schedule-table">
			<thead>
				<tr>
					<th class="schedule-table-header" scope="col">Scholarship</th>
					<th class="schedule-table-header" scope="col">Academic Interest</th>
					<th class="schedule-table-header" scope="col">Enrollment Status</th>
					<th class="schedule-table-header" scope="col">Ethnicity</th>
					<th class="schedule-table-header" scope="col">GPA</th>
					<th class="schedule-table-header" scope="col">Residence</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ( $my_query->have_posts() ) :
					$my_query->the_post();
					$sholarship_id    = get_the_ID();
					$sholarship_title = get_the_title();
					?>
					<tr class="schedule-table-row">
						<th class="schedule-table-cell" scope="row">
							<a href="<?php echo esc_url( get_permalink( $sholarship_id ) ); ?>">
								<?php echo esc_html( $sholarship_title ); ?>
							</a>
						</th>
						<td class="schedule-table-cell">
							<?php
							$interests = get_the_terms( $sholarship_id, 'academic_interest' );
							if ( ! empty( $interests ) && ! is_wp_error( $interests ) ) {
								echo implode( ' - ', wp_list_pluck( $interests, 'name' ) );//phpcs:ignore
							} else {
								echo 'N/A';
							}
							?>
						</td>
						<td class="schedule-table-cell">
							<?php
							$enrollment_status = get_the_terms( $sholarship_id, 'enrollment_status' );
							if ( ! empty( $enrollment_status ) && ! is_wp_error( $enrollment_status ) ) {
								echo implode( ' - ', wp_list_pluck( $enrollment_status, 'name' ) );//phpcs:ignore
							} else {
								echo 'N/A';
							}
							?>
						</td>
						<td class="schedule-table-cell">
							<?php
							$scholarship_ethnicity = get_the_terms( $sholarship_id, 'scholarship_ethnicity' );
							if ( ! empty( $scholarship_ethnicity ) && ! is_wp_error( $scholarship_ethnicity ) ) {
								echo implode( ' - ', wp_list_pluck( $scholarship_ethnicity, 'name' ) );//phpcs:ignore
							} else {
								echo 'N/A';
							}
							?>
						</td>
						<td class="schedule-table-cell">
							<?php
							$scholarship_gpa = get_the_terms( $sholarship_id, 'scholarship_gpa' );
							if ( ! empty( $scholarship_gpa ) && ! is_wp_error( $scholarship_gpa ) ) {
								echo implode( ' - ', wp_list_pluck( $scholarship_gpa, 'name' ) );//phpcs:ignore
							} else {
								echo 'N/A';
							}
							?>
						</td>
						<td class="schedule-table-cell">
							<?php
							$scholarship_residence = get_the_terms( $sholarship_id, 'scholarship_residence' );
							if ( ! empty( $scholarship_residence ) && ! is_wp_error( $scholarship_residence ) ) {
								echo implode( ' - ', wp_list_pluck( $scholarship_residence, 'name' ) );//phpcs:ignore
							} else {
								echo 'N/A';
							}
							?>
						</td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
		<div class="table-pagination">
			<?php echo do_shortcode( '[facetwp facet="pagination_schedule"]' ); ?>
		</div>
	</div>
	<?php
else :
	?>
	<div class="no-results">
		<p>Sorry, no results were found.</p>
	</div>
<?php endif; ?>
