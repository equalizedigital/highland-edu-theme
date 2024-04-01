<div class="schedule-filters staff-filters">
	<div class="schedule-filter schedule-label">
		<h2>Filter Staff</h2>
	</div>
	<div class="schedule-filter name-filter">
		<button class="name-filter-button dropdown-toggle"
		aria-label="Last Name Filters"
		aria-expanded="false"
		aria-controls="name-filters"
		id="name-filters-button"
		>Last Name</button>
		<div class="name-filter-dropdown dropdown-toggle-content" id="name-filters" aria-labelledby="name-filters-button" aria-hidden="true">
			<div class="dropdown-content">
				<label for="fwp_staff_name">Staff Member Last name</label>
				<?php echo do_shortcode( '[facetwp facet="last_name"]' ); ?>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Last Name Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Last Name Filters">Cancel</button>
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
	<div class="schedule-filter reset-filter">
		<?php
		echo do_shortcode( '[facetwp facet="reset_schedule"]' );
		?>
	</div>
</div>
<div class="staff-az">
	<?php echo do_shortcode( '[facetwp facet="staff_az"]' ); ?>
</div>
