<div class="schedule-filters">
	<div class="schedule-filter schedule-label">
		<h2>Filter Classes</h2>
	</div>
	<div class="schedule-filter semester-filter">
		<button class="semester-filter-button dropdown-toggle"
		aria-label="Semester Filters"
		aria-expanded="false"
		aria-controls="semester-filters"
		id="semester-filters-button"
		>Semester</button>
		<div class="semester-filter-dropdown dropdown-toggle-content" id="semester-filters" aria-labelledby="semester-filters-button" aria-hidden="true">
			<div class="dropdown-content">
				<fieldset>
					<legend>Semester</legend>
					<?php echo do_shortcode( '[facetwp facet="semester_filter"]' ); ?>
				</fieldset>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Semester Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Semester Filters">Cancel</button>
			</div>
		</div>
	</div>
	<div class="schedule-filter department-filter">
		<button class="department-filter-button dropdown-toggle"
		aria-label="Department Filters"
		aria-expanded="false"
		aria-controls="department-filters"
		id="department-filters-button"
		>Department</button>
		<div class="department-filter-dropdown dropdown-toggle-content" id="department-filters" aria-labelledby="department-filters-button" aria-hidden="true">
			<div class="dropdown-content">
				<label for="fwp_schedule_department">Department</label>
				<?php echo do_shortcode( '[facetwp facet="schedule_department"]' ); ?>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Department Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Department Filters">Cancel</button>
			</div>
		</div>
	</div>
	<div class="schedule-filter location-filter">
		<button class="location-filter-button dropdown-toggle"
		aria-label="Location Filters"
		aria-expanded="false"
		aria-controls="location-filters"
		id="location-filters-button"
		>Location</button>
		<div class="location-filter-dropdown dropdown-toggle-content" id="location-filters" aria-labelledby="location-filters-button" aria-hidden="true">
			<div class="dropdown-content">
			<fieldset>
				<legend>Location</legend>
				<?php
				echo do_shortcode( '[facetwp facet="schedule_location"]' );
				?>
			</fieldset>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Location Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Location Filters">Cancel</button>
			</div>
		</div>
	</div>
	<div class="schedule-filter time-filter">
		<button class="time-filter-button dropdown-toggle"
		aria-label="Time of day filters"
		aria-expanded="false"
		aria-controls="time-filters"
		id="time-filters-button"
		>Time of Day</button>
		<div class="time-filter-dropdown dropdown-toggle-content" id="time-filters" aria-labelledby="time-filters-button" aria-hidden="true">
			<div class="dropdown-content">
			<fieldset>
				<legend>Time of day</legend>
				<?php
				echo do_shortcode( '[facetwp facet="time_schedule"]' );
				?>
				</div>
			</fieldset>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Time Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Time Filters">Cancel</button>
			</div>
		</div>
	</div>
	<div class="schedule-filter instructor-filter">
		<button class="instructor-filter-button dropdown-toggle"
		aria-label="Instructor Filters"
		aria-expanded="false"
		aria-controls="instructor-filters"
		id="instructor-filters-button"
		>Instructor</button>
		<div class="instructor-filter-dropdown dropdown-toggle-content" id="instructor-filters" aria-labelledby="instructor-filters-button" aria-hidden="true">
			<div class="dropdown-content">
				<label for="fwp_instructor_schedule">Instructor</label>
				<?php
				echo do_shortcode( '[facetwp facet="instructor_schedule"]' );
				?>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Instructor Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Instructor Filters">Cancel</button>
			</div>
		</div>
	</div>
	<div class="schedule-filter reset-filter">
		<?php
		echo do_shortcode( '[facetwp facet="reset_schedule"]' );
		?>
	</div>
</div>