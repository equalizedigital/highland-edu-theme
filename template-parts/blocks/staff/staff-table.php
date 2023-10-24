<?php
$my_query = new WP_Query(
	array(
		'post_type'   => 'staff',
		'orderby'     => 'title',
		'order'       => 'ASC',
		'post_status' => 'publish',
		'facetwp'     => true,
	),
);
?>
<div class="schedule-results">
<?php
if ( $my_query->have_posts() ) : ?>

		<div class="table-sort">
			<div class="table-sort-results-number" aria-live="polite" role="region" data-label="Staff Members">
				<?php echo intval( $my_query->found_posts ); ?> Staff Members
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
					<th class="schedule-table-header" scope="col">Name</th>
					<th class="schedule-table-header" scope="col">Title</th>
					<th class="schedule-table-header" scope="col">Location</th>
					<th class="schedule-table-header" scope="col">Phone</th>
					<th class="schedule-table-header" scope="col">Email</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ( $my_query->have_posts() ) :
					$my_query->the_post();
					$staff_id    = get_the_ID();
					$staff_title = get_the_title();
					$staff_grade = get_post_meta( $staff_id, '_cmb_staff_grade', true );
					$staff_phone = get_post_meta( $staff_id, '_cmb_staff_phone', true );
					$staff_email = get_post_meta( $staff_id, '_cmb_staff_email', true );
					?>
					<tr class="schedule-table-row">
						<th class="schedule-table-cell" scope="row">
							<?php echo esc_html( $staff_title ); ?>
						</th>
						<td class="schedule-table-cell">
							<?php
							echo esc_html( $staff_grade );
							?>
						</td>
						<td class="schedule-table-cell">
							<?php
							$staff_location = get_the_terms( $staff_id, 'staff-member-location' );
							if ( ! empty( $staff_location ) && ! is_wp_error( $staff_location ) ) {
								echo implode( ' - ', wp_list_pluck( $staff_location, 'name' ) );//phpcs:ignore
							} else {
								echo 'N/A';
							}
							?>
						</td>
						<td class="schedule-table-cell">
							<?php
							if ( ! empty( $staff_phone ) ) {
								echo '<a href="tel:' . esc_attr( $staff_phone ) . '" aria-label="Call ' . esc_attr( $staff_phone ) . '">' . esc_html( $staff_phone ) . '</a>';
							} else {
								echo 'N/A';
							}
							?>
						</td>
						<td class="schedule-table-cell">
							<?php
							if ( ! empty( $staff_email ) ) {
								echo '<a href="mailto:' . esc_attr( $staff_email ) . '" aria-label="Send email to ' . esc_attr( $staff_email ) . '">' . esc_html( $staff_email ) . '</a>';
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

<?php endif; ?>
</div>
