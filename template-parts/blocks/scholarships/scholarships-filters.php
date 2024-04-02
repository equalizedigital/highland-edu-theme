<div class="schedule-filters scholarships-filters">
	<div class="schedule-filter schedule-label">
		<h2>Filter Scholarships</h2>
	</div>

	<div class="schedule-filter keyword-filter">
		<button class="keyword-filter-button dropdown-toggle"
		aria-label="keyword Filters"
		aria-expanded="false"
		aria-controls="keyword-filters"
		id="keyword-filters-button"
		>Keyword Search</button>
		<div class="keyword-filter-dropdown dropdown-toggle-content" id="keyword-filters" aria-labelledby="keyword-filters-button" aria-hidden="true">
			<div class="dropdown-content">
			<label for="fwp_keyword_filter">Keyword Search</label>
			<?php echo do_shortcode( '[facetwp facet="keyword_search"]' ); ?>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Location Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Location Filters">Cancel</button>
			</div>
		</div>
	</div>


	<div class="schedule-filter interest-filter">
		<button class="interest-filter-button dropdown-toggle"
		aria-label="Academic Interest Filters"
		aria-expanded="false"
		aria-controls="interest-filters"
		id="interest-filters-button"
		>Academic Interest</button>
		<div class="interest-filter-dropdown dropdown-toggle-content" id="interest-filters" aria-labelledby="interest-filters-button" aria-hidden="true">
			<div class="dropdown-content">
				<label for="fwp_ineterst_filter">Academic Interest</label>
				<?php echo do_shortcode( '[facetwp facet="ineterst_filter"]' ); ?>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Academic Interest Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Academic Interest Filters">Cancel</button>
			</div>
		</div>
	</div>
	<div class="schedule-filter enrollment-filter">
		<button class="enrollment-filter-button dropdown-toggle"
		aria-label="Enrollment Status Filters"
		aria-expanded="false"
		aria-controls="enrollment-filters"
		id="enrollment-filters-button"
		>Enrollment Status</button>
		<div class="enrollment-filter-dropdown dropdown-toggle-content" id="enrollment-filters" aria-labelledby="enrollment-filters-button" aria-hidden="true">
			<div class="dropdown-content">
				<fieldset>
					<legend>Enrollment Status</legend>
					<?php echo do_shortcode( '[facetwp facet="enrollment_status"]' ); ?>
				</fieldset>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Enrollment Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Enrollment Filters">Cancel</button>
			</div>
		</div>
	</div>

	<div class="schedule-filter fasfa-filter">
		<button class="fasfa-filter-button dropdown-toggle"
		aria-label="fasfa Filters"
		aria-expanded="false"
		aria-controls="fasfa-filters"
		id="fasfa-filters-button"
		>FAFSA</button>
		<div class="fasfa-filter-dropdown dropdown-toggle-content" id="fasfa-filters" aria-labelledby="fasfa-filters-button" aria-hidden="true">
			<div class="dropdown-content">
			<label for="fwp_fasfa_filter">FAFSA</label>
			<?php echo do_shortcode( '[facetwp facet="fafsa_filter"]' ); ?>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Location Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Location Filters">Cancel</button>
			</div>
		</div>
	</div>
	
	<div class="schedule-filter gpa-filter">
		<button class="gpa-filter-button dropdown-toggle"
		aria-label="GPA filters"
		aria-expanded="false"
		aria-controls="gpa-filters"
		id="gpa-filters-button"
		>GPA</button>
		<div class="gpa-filter-dropdown dropdown-toggle-content" id="gpa-filters" aria-labelledby="gpa-filters-button" aria-hidden="true">
			<div class="dropdown-content">
				<label for="fwp_gpa_filter">GPA</label>
				<?php
				echo do_shortcode( '[facetwp facet="gpa_filter"]' );
				?>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply GPA Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel GPA Filters">Cancel</button>
			</div>
		</div>
	</div>
	<div class="schedule-filter residence-filter">
		<button class="residence-filter-button dropdown-toggle"
		aria-label="Residence Filters"
		aria-expanded="false"
		aria-controls="residence-filters"
		id="residence-filters-button"
		>Residence</button>
		<div class="residence-filter-dropdown dropdown-toggle-content" id="residence-filters" aria-labelledby="residence-filters-button" aria-hidden="true">
			<div class="dropdown-content">
				<fieldset>
					<legend>Residence</legend>
					<?php
					echo do_shortcode( '[facetwp facet="residence_filter"]' );
					?>
				</fieldset>
			</div>
			<div class="dropdown-footer">
				<button class="dropdown-apply" aria-label="Apply Residence Filters">Apply</button>
				<button class="dropdown-cancel" aria-label="Cancel Residence Filters">Cancel</button>
			</div>
		</div>
	</div>
	<div class="schedule-filter reset-filter">
		<?php
		echo do_shortcode( '[facetwp facet="reset_schedule"]' );
		?>
	</div>
</div>


<style>
.facetwp-facet-keyword_search i.facetwp-icon{
    display: none;
}

</style>
