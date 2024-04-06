<?php
$my_query = new WP_Query(
	array(
		'post_type' => 'class',
		'orderby'   => 'title',
		'order'     => 'ASC',
		'facetwp'   => true,
	),
);


if ( $my_query->have_posts() ) : ?>

	<div class="schedule-results">
		<div class="table-sort">
			<div class="table-sort-results-number" aria-live="polite" role="region">
				<?php echo intval( $my_query->found_posts ); ?> Classes
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
					<th class="schedule-table-header" scope="row">Course</th>
					<th class="schedule-table-header" scope="col">Course Number</th>
					<th class="schedule-table-header" scope="col">Department</th>
					<th class="schedule-table-header" scope="col">Location</th>
					<th class="schedule-table-header" scope="col">Days</th>
					<th class="schedule-table-header" scope="col">Time</th>
					<th class="schedule-table-header" scope="col">Dates</th>
					<th class="schedule-table-header" scope="col">Instructor</th>
					<th class="schedule-table-header" scope="col">Remaining Seats</th>
					<th class="schedule-table-header" scope="col">Credits</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ( $my_query->have_posts() ) :
					$my_query->the_post();
					$class_id             = get_the_ID();
					$course_title         = get_the_title();
					$course_number        = get_post_meta( $class_id, '_cmb_course_number', true );
					$course               = get_post_meta( $class_id, '_cmb_course', true );
					$course_title         = empty( $course_number ) ? $course_title : $course_title . ' - ' . $course_number;
					$start_date_timestamp = get_post_meta( $class_id, '_cmb_class_start_date', true );
					$start_date           = $start_date_timestamp ? date( 'M d, Y', $start_date_timestamp ) : 'N/A';//phpcs:ignore
					$end_date_timestamp   = get_post_meta( $class_id, '_cmb_class_end_date', true );
					$end_date             = $end_date_timestamp ? date( 'M d, Y', $end_date_timestamp ) : 'N/A';//phpcs:ignore
					$full_date            = $start_date . ' - ' . $end_date;
					$enrolled             = get_post_meta( $class_id, '_cmb_enrolled', true );
					$max_enrolled         = get_post_meta( $class_id, '_cmb_enrollment_max', true );
					$remaining_seats      = intval( $max_enrolled ) - intval( $enrolled );
					$days                 = get_post_meta( $class_id, '_cmb_class_days', true );
					$days                 = empty( $days ) ? 'N/A' : convert_days_fullnames( $days );
					$start_time           = get_post_meta( $class_id, '_cmb_class_start_time', true );
					$end_time             = get_post_meta( $class_id, '_cmb_class_end_time', true );
					$instuctor            = get_post_meta( $class_id, '_cmb_instructor', true );
					$credit_hours         = get_post_meta( $class_id, '_cmb_credit_hours', true );
					$semisters            = get_the_terms( $class_id, 'semester' );
					$semister             = ! is_wp_error( $semisters ) && isset( $semisters[0] ) ? $semisters[0]->name : '';
					$semister_html        = $full_date;
					$semister_html        = ! empty( $semister ) ?
													'<strong>Semester:</strong> ' . $semister . '<span>' . $semister_html . '<span>' :
													$semister_html;
					$full_time            = '';
					if ( ! empty( $start_time ) ) {
						$full_time = $start_time;
						if ( ! empty( $end_time ) ) {
							$full_time .= ' - ' . $end_time;
						}
					} else {
						$full_time = 'N/A';
					}
					?>
					<tr class="schedule-table-row">
						<th class="schedule-table-cell" scope="row">
							<a href="<?php echo esc_url( get_permalink( $class_id ) ); ?>">
								<?php echo esc_html( $course_title ); ?>
							</a>
						</th>
						<td class="schedule-table-cell"><?php echo esc_html( $course ); ?></td>
						<td class="schedule-table-cell">
							<?php
							$departments = get_the_terms( $class_id, 'department' );
							if ( ! empty( $departments ) && ! is_wp_error( $departments ) ) {
								echo implode( ' - ', wp_list_pluck( $departments, 'name' ) );//phpcs:ignore
							} else {
								echo 'N/A';
							}
							?>
						</td>
						<td class="schedule-table-cell">
							<?php
							$locations = get_the_terms( $class_id, 'location' );
							if ( ! empty( $locations ) && ! is_wp_error( $locations ) ) {
								echo implode( ' - ', wp_list_pluck( $locations, 'name' ) );//phpcs:ignore
							} else {
								echo 'N/A';
							}
							?>
						</td>
						<td class="schedule-table-cell"><?php echo esc_html( $days ); ?></td>
						<td class="schedule-table-cell"><?php echo esc_html( $full_time ); ?></td>
						<td class="schedule-table-cell"><?php echo wp_kses_post( $semister_html ); ?></td>
						<td class="schedule-table-cell"><?php echo esc_html( $instuctor ); ?></td>
						<td class="schedule-table-cell"><?php echo esc_html( $remaining_seats ); ?></td>
						<td class="schedule-table-cell"><?php echo esc_html( $credit_hours ); ?></td>
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
