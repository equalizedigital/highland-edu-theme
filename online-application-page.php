<?
defined('ABSPATH') OR exit;
/**
 * Template Name: Online Application Page
 * Description: Template with Online Application Form.
 *
 * @package WordPress
 * @subpackage WP-Skeleton
 */

get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>
<main id="main-content">

	<div class="super-container interior-page">
		<div class="container">
			<div class="sixteen columns alpha">
				<div id="primary" class="full-width">
					<div id="content">
						<? the_post(); ?>
						<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
							<header class="entry-header">
								<h1 class="entry-title"><? the_title(); ?></h1>
							</header><!-- .entry-header -->
							<div class="entry-content">
								<? the_content(); ?>

								<!-- FORM: HEAD SECTION -->

								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<script type="text/javascript">
									document.addEventListener("DOMContentLoaded", function(){
										const FORM_TIME_START = Math.floor((new Date).getTime()/1000);
										let formElement = document.getElementById("tfa_0");
										let appendJsTimerElement = function(){
											let formTimeDiff = Math.floor((new Date).getTime()/1000) - FORM_TIME_START;
											let cumulatedTimeElement = document.getElementById("tfa_dbCumulatedTime");
											if (null !== cumulatedTimeElement) {
												let cumulatedTime = parseInt(cumulatedTimeElement.value);
												if (null !== cumulatedTime && cumulatedTime > 0) {
													formTimeDiff += cumulatedTime;
												}
											}
											let jsTimeInput = document.createElement("input");
											jsTimeInput.setAttribute("type", "hidden");
											jsTimeInput.setAttribute("value", formTimeDiff.toString());
											jsTimeInput.setAttribute("name", "tfa_dbElapsedJsTime");
											jsTimeInput.setAttribute("id", "tfa_dbElapsedJsTime");
											jsTimeInput.setAttribute("autocomplete", "off");
											if (null !== formElement) {
												formElement.appendChild(jsTimeInput);
											}
										};
										if (null !== formElement) {
											if(formElement.addEventListener){
												formElement.addEventListener('submit', appendJsTimerElement, false);
											} else if(formElement.attachEvent){
												formElement.attachEvent('onsubmit', appendJsTimerElement);
											}
										}
									});
								</script>

								<link href="https://www.tfaforms.com/form-builder/4.2.1/css/wforms-layout.css?v=500-1" rel="stylesheet" type="text/css" />

								<!--[if IE 8]>
								<link href="https://www.tfaforms.com/form-builder/4.2.1/css/wforms-layout-ie8.css" rel="stylesheet" type="text/css" />
								<![endif]-->
								<!--[if IE 7]>
								<link href="https://www.tfaforms.com/form-builder/4.2.1/css/wforms-layout-ie7.css" rel="stylesheet" type="text/css" />
								<![endif]-->
								<!--[if IE 6]>
								<link href="https://www.tfaforms.com/form-builder/4.2.1/css/wforms-layout-ie6.css" rel="stylesheet" type="text/css" />
								<![endif]-->
								<link href="https://www.tfaforms.com/themes/get/default" rel="stylesheet" type="text/css" />
								<link href="https://www.tfaforms.com/form-builder/4.2.1/css/wforms-jsonly.css?v=500-1" rel="alternate stylesheet" title="This stylesheet activated by javascript" type="text/css" />
								<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.9/js/wforms.js?v=500-1"></script>
								<script type="text/javascript">
									wFORMS.behaviors.prefill.skip = false;
								</script>
								<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.9/js/localization-en_US.js?v=500-1"></script>

								<!-- FORM: BODY SECTION -->
								<!--<div class="wFormContainer" style="max-width: 700px; width:auto;" >
									<div class=""><div class="wForm" id="tfa_0-WRPR" dir="ltr">
											<div class="codesection" id="code-tfa_0"></div>
											<h3 class="wFormTitle" id="tfa_0-T"><b><span style="font-size:22.0pt;font-family:Calibri;mso-ascii-theme-font:major-latin;
mso-hansi-theme-font:major-latin">Highland Community College</span></b>

												<!--EndFragment- -></h3>
                                            <form method="post" action="https://www.tfaforms.com/responses/processor" target="_blank" onsubmit="try {return window.confirm(&quot;You are submitting information to an external page.\nAre you sure?&quot;);} catch (e) {return false;}">
                                                <div><div>
















                                                        <p><b><span style="font-size:18.0pt;font-family:Calibri">Application for Admission</span></b></p>

                                                    </div></div>
                                                <div><div>



















                                                        <p>





















                                                        </p><table style="border:currentColor;border-collapse:collapse" border="1" cellspacing="0" cellpadding="0">
                                                            <tbody><tr>
                                                                <td style="padding:0in 5.4pt;border:currentColor;width:668pt" width="668">
                                                                    <p><span style="font-family:Verdana;font-size:9pt">All applicants must complete all the relevant
  details in the following sections. This page is secured with SSL technology.</span></p>
                                                                    <p><font face="Verdana"><b><span style="font-size:12px">Any questions with a red asterisk are required.  </span></b></font></p></td></tr>
                                                            </tbody></table></div></div>
                                                <div>
                                                    <label>Application Semester</label><br><div><select name="tfa_3"><option value="">Please select...</option>
                                                            <option value="tfa_3451">Spring 2018</option>
                                                            <option value="tfa_3455">Summer 2018</option>
                                                            <option value="tfa_3456">Fall 2018</option>
                                                            <option value="tfa_3457">Spring 2019</option>
                                                            <option value="tfa_3458">Summer 2019</option>
                                                            <option value="tfa_3459">Fall 2019</option></select></div>
                                                </div>
                                                <fieldset>
                                                    <legend>Personal Information</legend>
                                                    <div>
                                                        <label style="width:600px;min-width:0">Social Security Number</label><br><div>
                                                            <input type="password" name="tfa_10" value="" size="" maxlength="9"><span><span>Please enter SSN without dashes.</span></span>
                                                        </div>
                                                    </div>
                                                    <div><div><span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:x-small;line-height:normal;background-color:rgb(255,255,255)">In order to apply for admission, we are requesting your Social Security Number pursuant to Public Law 93-579 (which refers to </span><span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:x-small;line-height:normal;background-color:rgb(255,255,255)">privacy</span><div><span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:x-small;line-height:normal;background-color:rgb(255,255,255)">of personal information) for the college’s system of student records as well as for compliance with the federal and </span><span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:x-small;line-height:normal;background-color:rgb(255,255,255)">state reporting</span></div><div><span style="color:rgb(51,51,51);font-family:Arial,Helvetica,sans-serif;font-size:x-small;line-height:normal;background-color:rgb(255,255,255)">requirements. The Social Security Number is required if you are applying for financial aid.</span>Click here to enter text</div></div></div>
                                                    <div>
                                                        <div>
                                                            <label style="width:680pxpx;min-width:0">First Name</label><br><div><input type="text" name="tfa_11" value="" style="width:200px"></div>
                                                        </div>
                                                        <div>
                                                            <label style="width:680pxpx;min-width:0">Middle Name</label><br><div>
                                                                <input type="text" name="tfa_13" value="" style="width:140px"><span><span>Enter &quot;None&quot; if no middle name.</span></span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label style="width:680pxpx;min-width:0">Last Name</label><br><div><input type="text" name="tfa_12" value="" style="width:200px"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label style="width:680pxpx;min-width:0">Former Name/Maiden Name</label><br><div><input type="text" name="tfa_14" value="" style="width:200px"></div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <label>Email</label><br><div><input type="text" name="tfa_1873" value="" style="width:250px"></div>
                                                        </div>
                                                        <div>
                                                            <label style="width:680pxpx;min-width:0">Email Type</label><br><div><select name="tfa_1874"><option value="">Please select...</option>
                                                                    <option value="tfa_1875">Business</option>
                                                                    <option value="tfa_1876">Personal</option>
                                                                    <option value="tfa_1877">School</option></select></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <label style="width:680pxpx;min-width:0">Gender</label><br><div><select name="tfa_2522"><option value="">Please select...</option>
                                                                    <option value="tfa_2523">Male</option>
                                                                    <option value="tfa_2524">Female</option></select></div>
                                                        </div>
                                                        <div>
                                                            <label>Date of Birth</label><br><div><input type="text" name="tfa_2525" value="" style="width:170px"></div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Address Section</legend>
                                                    <div>
                                                        <label>Address</label><br><div><textarea name="tfa_1882"></textarea></div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <label>City</label><br><div><input type="text" name="tfa_1884" value="" style="width:190.18181824684143px"></div>
                                                        </div>
                                                        <div>
                                                            <label>State</label><br><div><select name="tfa_2123"><option value="">Please select...</option>
                                                                    <option value="tfa_2124">Alabama</option>
                                                                    <option value="tfa_2125">Alaska</option>
                                                                    <option value="tfa_2126">Arizona</option>
                                                                    <option value="tfa_2127">Arkansas</option>
                                                                    <option value="tfa_2128">California</option>
                                                                    <option value="tfa_2129">Colorado</option>
                                                                    <option value="tfa_2130">Connecticut</option>
                                                                    <option value="tfa_2131">Delaware</option>
                                                                    <option value="tfa_2132">District Of Columbia</option>
                                                                    <option value="tfa_2133">Florida</option>
                                                                    <option value="tfa_2134">Georgia</option>
                                                                    <option value="tfa_2135">Hawaii</option>
                                                                    <option value="tfa_2136">Idaho</option>
                                                                    <option value="tfa_2137">Illinois</option>
                                                                    <option value="tfa_2138">Indiana</option>
                                                                    <option value="tfa_2139">Iowa</option>
                                                                    <option value="tfa_2140">Kansas</option>
                                                                    <option value="tfa_2141">Kentucky</option>
                                                                    <option value="tfa_2142">Louisiana</option>
                                                                    <option value="tfa_2143">Maine</option>
                                                                    <option value="tfa_2144">Maryland</option>
                                                                    <option value="tfa_2145">Massachusetts</option>
                                                                    <option value="tfa_2146">Michigan</option>
                                                                    <option value="tfa_2147">Minnesota</option>
                                                                    <option value="tfa_2148">Mississippi</option>
                                                                    <option value="tfa_2149">Missouri</option>
                                                                    <option value="tfa_2150">Montana</option>
                                                                    <option value="tfa_2151">Nebraska</option>
                                                                    <option value="tfa_2152">Nevada</option>
                                                                    <option value="tfa_2153">New Hampshire</option>
                                                                    <option value="tfa_2154">New Jersey</option>
                                                                    <option value="tfa_2155">New Mexico</option>
                                                                    <option value="tfa_2156">New York</option>
                                                                    <option value="tfa_2157">North Carolina</option>
                                                                    <option value="tfa_2158">North Dakota</option>
                                                                    <option value="tfa_2159">Ohio</option>
                                                                    <option value="tfa_2160">Oklahoma</option>
                                                                    <option value="tfa_2161">Oregon</option>
                                                                    <option value="tfa_2162">Pennsylvania</option>
                                                                    <option value="tfa_2163">Rhode Island</option>
                                                                    <option value="tfa_2164">South Carolina</option>
                                                                    <option value="tfa_2165">South Dakota</option>
                                                                    <option value="tfa_2166">Tennessee</option>
                                                                    <option value="tfa_2167">Texas</option>
                                                                    <option value="tfa_2168">Utah</option>
                                                                    <option value="tfa_2169">Vermont</option>
                                                                    <option value="tfa_2170">Virginia</option>
                                                                    <option value="tfa_2171">Washington</option>
                                                                    <option value="tfa_2172">West Virginia</option>
                                                                    <option value="tfa_2173">Wisconsin</option>
                                                                    <option value="tfa_2174">Wyoming</option>
                                                                    <option value="tfa_2175">Puerto Rico</option>
                                                                    <option value="tfa_2176">Virgin Island</option>
                                                                    <option value="tfa_2177">Northern Mariana Islands</option>
                                                                    <option value="tfa_2178">Guam</option>
                                                                    <option value="tfa_2179">American Samoa</option>
                                                                    <option value="tfa_2180">Palau</option></select></div>
                                                        </div>
                                                        <div>
                                                            <label>Zip Code</label><br><div><input type="text" name="tfa_2196" value=""></div>
                                                        </div>
                                                        <div>
                                                            <label>County</label><br><div><input type="text" name="tfa_3410" value=""></div>
                                                        </div>
                                                        <div>
                                                            <label style="width:610px;min-width:0">Preferred Phone - This number may be used to notify you via text or auto call in cases <span style="font-weight:inherit">of emergency, with account information, important college calendar </span>reminders, or college orientation information. </label><br><div><input type="text" name="tfa_2197" value="" style="width:200px"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label style="width:680pxpx;min-width:0">Length of Time at Current Address</label><br><div>
                                                            <input type="text" name="tfa_2198" value="" style="width:200px"><span><span>Please enter in years and months, e.g. 1 year 6 months.</span></span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label style="width:680pxpx;min-width:0">Place of Employment</label><br><div><input type="text" name="tfa_2199" value="" style="width:200px"></div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <label>City</label><br><div><input type="text" name="tfa_2205" value="" style="width:190.18181824684143px"></div>
                                                        </div>
                                                        <div>
                                                            <label>State</label><br><div><select name="tfa_2444"><option value="">Please select...</option>
                                                                    <option value="tfa_2445">Alabama</option>
                                                                    <option value="tfa_2446">Alaska</option>
                                                                    <option value="tfa_2447">Arizona</option>
                                                                    <option value="tfa_2448">Arkansas</option>
                                                                    <option value="tfa_2449">California</option>
                                                                    <option value="tfa_2450">Colorado</option>
                                                                    <option value="tfa_2451">Connecticut</option>
                                                                    <option value="tfa_2452">Delaware</option>
                                                                    <option value="tfa_2453">District Of Columbia</option>
                                                                    <option value="tfa_2454">Florida</option>
                                                                    <option value="tfa_2455">Georgia</option>
                                                                    <option value="tfa_2456">Hawaii</option>
                                                                    <option value="tfa_2457">Idaho</option>
                                                                    <option value="tfa_2458">Illinois</option>
                                                                    <option value="tfa_2459">Indiana</option>
                                                                    <option value="tfa_2460">Iowa</option>
                                                                    <option value="tfa_2461">Kansas</option>
                                                                    <option value="tfa_2462">Kentucky</option>
                                                                    <option value="tfa_2463">Louisiana</option>
                                                                    <option value="tfa_2464">Maine</option>
                                                                    <option value="tfa_2465">Maryland</option>
                                                                    <option value="tfa_2466">Massachusetts</option>
                                                                    <option value="tfa_2467">Michigan</option>
                                                                    <option value="tfa_2468">Minnesota</option>
                                                                    <option value="tfa_2469">Mississippi</option>
                                                                    <option value="tfa_2470">Missouri</option>
                                                                    <option value="tfa_2471">Montana</option>
                                                                    <option value="tfa_2472">Nebraska</option>
                                                                    <option value="tfa_2473">Nevada</option>
                                                                    <option value="tfa_2474">New Hampshire</option>
                                                                    <option value="tfa_2475">New Jersey</option>
                                                                    <option value="tfa_2476">New Mexico</option>
                                                                    <option value="tfa_2477">New York</option>
                                                                    <option value="tfa_2478">North Carolina</option>
                                                                    <option value="tfa_2479">North Dakota</option>
                                                                    <option value="tfa_2480">Ohio</option>
                                                                    <option value="tfa_2481">Oklahoma</option>
                                                                    <option value="tfa_2482">Oregon</option>
                                                                    <option value="tfa_2483">Pennsylvania</option>
                                                                    <option value="tfa_2484">Rhode Island</option>
                                                                    <option value="tfa_2485">South Carolina</option>
                                                                    <option value="tfa_2486">South Dakota</option>
                                                                    <option value="tfa_2487">Tennessee</option>
                                                                    <option value="tfa_2488">Texas</option>
                                                                    <option value="tfa_2489">Utah</option>
                                                                    <option value="tfa_2490">Vermont</option>
                                                                    <option value="tfa_2491">Virginia</option>
                                                                    <option value="tfa_2492">Washington</option>
                                                                    <option value="tfa_2493">West Virginia</option>
                                                                    <option value="tfa_2494">Wisconsin</option>
                                                                    <option value="tfa_2495">Wyoming</option>
                                                                    <option value="tfa_2496">Puerto Rico</option>
                                                                    <option value="tfa_2497">Virgin Island</option>
                                                                    <option value="tfa_2498">Northern Mariana Islands</option>
                                                                    <option value="tfa_2499">Guam</option>
                                                                    <option value="tfa_2500">American Samoa</option>
                                                                    <option value="tfa_2501">Palau</option></select></div>
                                                        </div>
                                                        <div>
                                                            <label>Zip Code</label><br><div><input type="text" name="tfa_2517" value=""></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <label style="width:680pxpx;min-width:0">Number of Hours Employed Each Week</label><br><div><input type="text" name="tfa_2519" value="" style="width:110px"></div>
                                                        </div>
                                                        <div>
                                                            <label>Work Phone</label><br><div><input type="text" name="tfa_2520" value="" style="width:110px"></div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Ethnicity/Residency</legend>
                                                    <div>
                                                        <label style="width:680pxpx;min-width:0">Are you a citizen or permanent resident of the United States?</label><div><select name="tfa_2527"><option value="">Please select...</option>
                                                                <option value="tfa_2528">Yes</option>
                                                                <option value="tfa_2529">No</option></select></div>
                                                    </div>
                                                    <div>
                                                        <label>Are you Hispanic, Latino or of Spanish Origin? </label><div><select name="tfa_2530"><option value="">Please select...</option>
                                                                <option value="tfa_2539">Yes</option>
                                                                <option value="tfa_2540">No</option></select></div>
                                                    </div>
                                                    <div>
                                                        <label>Please identify your primary racial/ethnic group. </label><div><select name="tfa_2531"><option value="">Please select...</option>
                                                                <option value="tfa_2532">American Indian/Alaskan Native</option>
                                                                <option value="tfa_2533">Asian</option>
                                                                <option value="tfa_2534">Black or African American</option>
                                                                <option value="tfa_2535">Hispanic or Latino</option>
                                                                <option value="tfa_2536">Native Hawaiian or other Pacific Islander</option>
                                                                <option value="tfa_2537">White</option>
                                                                <option value="tfa_2538">Choose to Not Respond</option></select></div>
                                                    </div>
                                                    <div>
                                                        <label>Are you from one or more of the following racial groups? (Select all that apply.)</label><br><div><span><span><input type="checkbox" value="tfa_2543" name="tfa_2543"><label>American Indian or Alaskan Native</label></span><span><input type="checkbox" value="tfa_2544" name="tfa_2544"><label>Asian</label></span><span><input type="checkbox" value="tfa_2545" name="tfa_2545"><label>Black or African American</label></span><span><input type="checkbox" value="tfa_2546" name="tfa_2546"><label>Native Hawaiian or other Pacific Islander</label></span><span><input type="checkbox" value="tfa_2547" name="tfa_2547"><label>White</label></span><span><input type="checkbox" value="tfa_2548" name="tfa_2548"><label>Choose to not respond</label></span></span></div>
                                                    </div>
                                                    <div>
                                                        <label>Are you in the United States on a Visa Non-Resident Alien?</label><div><select name="tfa_2549"><option value="">Please select...</option>
                                                                <option value="tfa_2551">Yes</option>
                                                                <option value="tfa_2552">No</option></select></div>
                                                    </div>
                                                    <div>
                                                        <label>Country of Origin</label><div><input type="text" name="tfa_2550" value=""></div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Admissions Information</legend>
                                                    <div>
                                                        <label>Admissions Type</label><div><select name="tfa_2554"><option value="">Please select...</option>
                                                                <option value="tfa_3411">First-time student in college-level coursework (new to higher education)</option>
                                                                <option value="tfa_3412">Transfer student (from another college)</option>
                                                                <option value="tfa_3413">Returning student</option>
                                                                <option value="tfa_3414">New General Studies or Vocational Skills student</option></select></div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <label style="width:160px;min-width:0">If readmitted, Semester:</label><div><select name="tfa_2559"><option value="">Please select...</option>
                                                                    <option value="tfa_2560">Spring</option>
                                                                    <option value="tfa_2561">Summer</option>
                                                                    <option value="tfa_2562">Fall</option></select></div>
                                                        </div>
                                                        <div>
                                                            <label style="width:80pxpx;min-width:0">Year</label><div><input type="text" name="tfa_2563" value="" style="width:50px"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label style="width:80pxpx;min-width:0">Has either parent earned a bachelor&#39;s degree?</label><div><select name="tfa_2565"><option value="">Please select...</option>
                                                                <option value="tfa_2566">Yes</option>
                                                                <option value="tfa_2567">No</option></select></div>
                                                    </div>
                                                    <div>
                                                        <label style="width:80pxpx;min-width:0">While attending HCC, I plan to: </label><div><select name="tfa_2569"><option value="">Please select...</option>
                                                                <option value="tfa_3415">Prepare for transfer to a four-year college or university</option>
                                                                <option value="tfa_3416">Improve skills for my present job</option>
                                                                <option value="tfa_3429">Prepare for a future job immediately after attending community college</option>
                                                                <option value="tfa_3419">Prepare for GED test or improve basic academic skills</option>
                                                                <option value="tfa_3420">Personal interest/self development, not career oriented</option>
                                                                <option value="tfa_3421">Other</option></select></div>
                                                    </div>
                                                    <div>
                                                        <label style="width:80pxpx;min-width:0">If you plan to transfer to another institution after HCC, where to?</label><div><input type="text" name="tfa_2577" value="" style="width:220px"></div>
                                                    </div>
                                                    <div>
                                                        <label style="width:80pxpx;min-width:0">I plan to attend HCC: </label><div><select name="tfa_2578"><option value="">Please select...</option>
                                                                <option value="tfa_2579">Part-time (less than 12 credit hours per semester)</option>
                                                                <option value="tfa_2580">Full-time (12 credit hours or more per semester)</option></select></div>
                                                    </div>
                                                    <div>
                                                        <label style="width:80pxpx;min-width:0">Enrollment Objective</label><div><select name="tfa_2581"><option value="">Please select...</option>
                                                                <option value="tfa_2582">To complete one or two courses</option>
                                                                <option value="tfa_3422">To complete a certificate</option>
                                                                <option value="tfa_2585">To complete an associates degree</option></select></div>
                                                    </div>
                                                    <div>
                                                        <label style="width:80pxpx;min-width:0">Current Education Level</label><div><select name="tfa_2586"><option value="">Please select...</option>
                                                                <option value="tfa_2587">GED</option>
                                                                <option value="tfa_2588">High School Diploma</option>
                                                                <option value="tfa_2589">Completed at least one or more college courses</option>
                                                                <option value="tfa_2590">Certificate</option>
                                                                <option value="tfa_2591">Associate&#39;s Degree</option>
                                                                <option value="tfa_2592">Bachelor&#39;s Degree</option>
                                                                <option value="tfa_2593">Master&#39;s Degree</option>
                                                                <option value="tfa_2594">First Professional Degree</option>
                                                                <option value="tfa_2595">Doctorate Degree</option>
                                                                <option value="tfa_2596">Other</option>
                                                                <option value="tfa_2597">None</option></select></div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>School Information</legend>
                                                    <div>
                                                        <div>
                                                            <label style="width:80pxpx;min-width:0">Graduating High School  </label><div><input type="text" name="tfa_2599" value="" style="width:210px"></div>
                                                        </div>
                                                        <div>
                                                            <label style="width:80pxpx;min-width:0">Year</label><div><input type="text" name="tfa_2600" value="" style="width:40px"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <label style="width:80pxpx;min-width:0">City</label><div><input type="text" name="tfa_2602" value="" style="width:80px"></div>
                                                        </div>
                                                        <div>
                                                            <label>State</label><div><select name="tfa_2893"><option value="">Please select...</option>
                                                                    <option value="tfa_2894">Alabama</option>
                                                                    <option value="tfa_2895">Alaska</option>
                                                                    <option value="tfa_2896">Arizona</option>
                                                                    <option value="tfa_2897">Arkansas</option>
                                                                    <option value="tfa_2898">California</option>
                                                                    <option value="tfa_2899">Colorado</option>
                                                                    <option value="tfa_2900">Connecticut</option>
                                                                    <option value="tfa_2901">Delaware</option>
                                                                    <option value="tfa_2902">District Of Columbia</option>
                                                                    <option value="tfa_2903">Florida</option>
                                                                    <option value="tfa_2904">Georgia</option>
                                                                    <option value="tfa_2905">Hawaii</option>
                                                                    <option value="tfa_2906">Idaho</option>
                                                                    <option value="tfa_2907">Illinois</option>
                                                                    <option value="tfa_2908">Indiana</option>
                                                                    <option value="tfa_2909">Iowa</option>
                                                                    <option value="tfa_2910">Kansas</option>
                                                                    <option value="tfa_2911">Kentucky</option>
                                                                    <option value="tfa_2912">Louisiana</option>
                                                                    <option value="tfa_2913">Maine</option>
                                                                    <option value="tfa_2914">Maryland</option>
                                                                    <option value="tfa_2915">Massachusetts</option>
                                                                    <option value="tfa_2916">Michigan</option>
                                                                    <option value="tfa_2917">Minnesota</option>
                                                                    <option value="tfa_2918">Mississippi</option>
                                                                    <option value="tfa_2919">Missouri</option>
                                                                    <option value="tfa_2920">Montana</option>
                                                                    <option value="tfa_2921">Nebraska</option>
                                                                    <option value="tfa_2922">Nevada</option>
                                                                    <option value="tfa_2923">New Hampshire</option>
                                                                    <option value="tfa_2924">New Jersey</option>
                                                                    <option value="tfa_2925">New Mexico</option>
                                                                    <option value="tfa_2926">New York</option>
                                                                    <option value="tfa_2927">North Carolina</option>
                                                                    <option value="tfa_2928">North Dakota</option>
                                                                    <option value="tfa_2929">Ohio</option>
                                                                    <option value="tfa_2930">Oklahoma</option>
                                                                    <option value="tfa_2931">Oregon</option>
                                                                    <option value="tfa_2932">Pennsylvania</option>
                                                                    <option value="tfa_2933">Rhode Island</option>
                                                                    <option value="tfa_2934">South Carolina</option>
                                                                    <option value="tfa_2935">South Dakota</option>
                                                                    <option value="tfa_2936">Tennessee</option>
                                                                    <option value="tfa_2937">Texas</option>
                                                                    <option value="tfa_2938">Utah</option>
                                                                    <option value="tfa_2939">Vermont</option>
                                                                    <option value="tfa_2940">Virginia</option>
                                                                    <option value="tfa_2941">Washington</option>
                                                                    <option value="tfa_2942">West Virginia</option>
                                                                    <option value="tfa_2943">Wisconsin</option>
                                                                    <option value="tfa_2944">Wyoming</option>
                                                                    <option value="tfa_2945">Puerto Rico</option>
                                                                    <option value="tfa_2946">Virgin Island</option>
                                                                    <option value="tfa_2947">Northern Mariana Islands</option>
                                                                    <option value="tfa_2948">Guam</option>
                                                                    <option value="tfa_2949">American Samoa</option>
                                                                    <option value="tfa_2950">Palau</option></select></div>
                                                        </div>
                                                        <div>
                                                            <label style="width:80pxpx;min-width:0">Zip</label><div><input type="text" name="tfa_2952" value="" style="width:80px"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <label style="width:80pxpx;min-width:0">If you are not a High School graduate, do you have a GED?</label><div><select name="tfa_2953"><option value="">Please select...</option>
                                                                    <option value="tfa_2954">Yes</option>
                                                                    <option value="tfa_2955">No</option></select></div>
                                                        </div>
                                                        <div>
                                                            <label style="width:80pxpx;min-width:0">Date Completed</label><div><input type="text" name="tfa_2956" value="" style="width:100px"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label style="width:80pxpx;min-width:0">Have you attended any other college/university/trade school?</label><div><select name="tfa_2958"><option value="">Please select...</option>
                                                                <option value="tfa_2988">Yes</option>
                                                                <option value="tfa_2989">No</option></select></div>
                                                    </div>
                                                    <div><table>
                                                            <tr>
                                                                <th> </th>
                                                                <th>College/Trade School        </th>
                                                                <th>City   </th>
                                                                <th>State         </th>
                                                                <th>Degree Earned   </th>
                                                                <th>Credit Hrs     </th>
                                                                <th>Date      </th>
                                                            </tr>
                                                            <tr>
                                                                <th> </th>
                                                                <td><div><div><input type="text" name="tfa_2965" value="" style="width:120px"></div></div></td>
                                                                <td><div><div><input type="text" name="tfa_2966" value="" style="width:80px"></div></div></td>
                                                                <td><div><div><input type="text" name="tfa_3424" value="" style="width:20px"></div></div></td>
                                                                <td><div><div><input type="text" name="tfa_2981" value="" style="width:100px"></div></div></td>
                                                                <td><div><div><input type="text" name="tfa_2983" value="" style="width:30px"></div></div></td>
                                                                <td><div><div><input type="text" name="tfa_3409" value="" style="width:90px"></div></div></td>
                                                                <td> </td>
                                                            </tr>
                                                        </table></div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Field of Study Codes and Program Titles</legend>
                                                    <div><div>



                                                            <div title="Page 2">
                                                                <div>
                                                                    <div>
                                                                        <p><span style="font-size:10pt;font-family:&#39;Calibri&#39;"><b>The Field of Study Codes are arranged in the following manner:</b>
</span></p>
                                                                        <ol style="list-style-type:upper-latin">
                                                                            <li style="font-size:10pt;font-family:&#39;Calibri&#39;">
                                                                                <p><span style="font-size:10pt">Transfer (Planning to complete a two-year degree at Highland and transferring to another college/or taking courses that will transfer to another
</span></p>
                                                                                <p><span style="font-size:10pt">college without a degree.)</span></p>
                                                                            </li>
                                                                            <li style="font-size:10pt;font-family:&#39;Calibri&#39;">
                                                                                <p><span style="font-size:10pt">Two-Year Non-Transfer Degree (Completing a two-year vocational degree either as you work or before entering the work world.)
</span></p>
                                                                            </li>
                                                                            <li style="font-size:10pt;font-family:&#39;Calibri&#39;">
                                                                                <p><span style="font-size:10pt">Certificate (Pursuing one of Highland’s less than two-year programs either as you work or before entering the work world.)
</span></p>
                                                                            </li>
                                                                            <li style="font-size:10pt;font-family:&#39;Calibri&#39;">
                                                                                <p><span style="font-size:10pt">Other </span></p>
                                                                            </li>
                                                                        </ol>
                                                                    </div>
                                                                </div>
                                                            </div></div></div>
                                                    <div>
                                                        <label>Major Category:</label><br><div><select name="tfa_3028"><option value="">Please select...</option>
                                                                <option value="tfa_3294">Transfer Course Enrollee</option>
                                                                <option value="tfa_3295">Associate of Science Degrees</option>
                                                                <option value="tfa_3296">Associate of Engineering Science</option>
                                                                <option value="tfa_3297">Associate of Arts Degrees</option>
                                                                <option value="tfa_3299">Associate of General Studies (non-transfer)</option>
                                                                <option value="tfa_3300">Associate of Applied Science Degrees</option>
                                                                <option value="tfa_3301">Certificates</option>
                                                                <option value="tfa_3302">Early Childhood Education Certificates</option>
                                                                <option value="tfa_3303">Equine Certificates</option>
                                                                <option value="tfa_3304">Industrial Manufacuring Technology Certificates</option></select></div>
                                                    </div>
                                                    <div>
                                                        <label>Major:</label><br><div><select name="tfa_3047"><option value="">Please select...</option>
                                                                <optgroup label="Transfer Course Enrollee"><option value="tfa_3193">0101-Transfer Course Enrollee</option></optgroup>
                                                                <optgroup label="Associate of Science Degrees">
                                                                    <option value="tfa_3195">303-Associate of Science</option>
                                                                    <option value="tfa_3197">402-Agriculture</option>
                                                                    <option value="tfa_3198">403-Biology</option>
                                                                    <option value="tfa_3199">404-Biology Education</option>
                                                                    <option value="tfa_3201">406-Chemistry</option>
                                                                    <option value="tfa_3202">407-Computer Science</option>
                                                                    <option value="tfa_3203">517-Criminal Justice</option>
                                                                    <option value="tfa_3204">612-Engineering Technology</option>
                                                                    <option value="tfa_3461">405-Environmental Science</option>
                                                                    <option value="tfa_3205">409-Geology</option>
                                                                    <option value="tfa_3206">410-Mathematics</option>
                                                                    <option value="tfa_3208">411-Physics</option>
                                                                    <option value="tfa_3209">430-Pre-Chiropractic</option>
                                                                    <option value="tfa_3210">412-Pre-Dentistry</option>
                                                                    <option value="tfa_3211">416-Pre-Medical Technology</option>
                                                                    <option value="tfa_3212">418-Pre-Medicine</option>
                                                                    <option value="tfa_3213">422-Pre-Pharmacy</option>
                                                                    <option value="tfa_3214">424-Pre-Veterinary Medicine</option>
                                                                </optgroup>
                                                                <optgroup label="Associate of Engineering Science"><option value="tfa_3215">414-Associate of Engineering Science</option></optgroup>
                                                                <optgroup label="Associate of Arts Degrees">
                                                                    <option value="tfa_3217">304-Associate of Arts</option>
                                                                    <option value="tfa_3219">302-Art/Graphic Design</option>
                                                                    <option value="tfa_3200">204-Business Administration</option>
                                                                    <option value="tfa_3464">517-Criminal Justice</option>
                                                                    <option value="tfa_3463">307-English</option>
                                                                    <option value="tfa_3220">502-History</option>
                                                                    <option value="tfa_3221">509-Human/Social Services</option>
                                                                    <option value="tfa_3222">310-Mass Communication</option>
                                                                    <option value="tfa_3223">306-Music</option>
                                                                    <option value="tfa_3224">504-Political Science</option>
                                                                    <option value="tfa_3225">506-Paraprofessional Education</option>
                                                                    <option value="tfa_3207">510-Physical Education</option>
                                                                    <option value="tfa_3226">516-Psychology</option>
                                                                    <option value="tfa_3227">508-Sociology</option>
                                                                    <option value="tfa_3228">308-Speech/Theatre</option>
                                                                </optgroup>
                                                                <optgroup label="Associate of General Studies (non-transfer)"><option value="tfa_3233">101-Associate of General Studies (non-transfer)</option></optgroup>
                                                                <optgroup label="Associate of Applied Science Degrees">
                                                                    <option value="tfa_3235">203-Accounting</option>
                                                                    <option value="tfa_3237">630-Agricultural Management</option>
                                                                    <option value="tfa_3238">622-Auto Body Repair</option>
                                                                    <option value="tfa_3239">604-Automotive Mechanics</option>
                                                                    <option value="tfa_3240">420-Medical Assistant</option>
                                                                    <option value="tfa_3432">238-Criminal Justice</option>
                                                                    <option value="tfa_3241">703-Early Childhood Education</option>
                                                                    <option value="tfa_3467">704-Early Childhood Education online</option>
                                                                    <option value="tfa_3242">425-Emergency Medical Services</option>
                                                                    <option value="tfa_3243">633-Equine Science</option>
                                                                    <option value="tfa_3466">301-Graphic Design</option>
                                                                    <option value="tfa_3244">217-Hospitality Management</option>
                                                                    <option value="tfa_3245">634-Industrial Training</option>
                                                                    <option value="tfa_3246">206-Information Systems</option>
                                                                    <option value="tfa_3247">233-Information Technology - Healthcare</option>
                                                                    <option value="tfa_3445">642-Mechatronics</option>
                                                                    <option value="tfa_3248">421-Nursing/ADN</option>
                                                                    <option value="tfa_3249">505-Paraprofessional Education</option>
                                                                </optgroup>
                                                                <optgroup label="Certificates">
                                                                    <option value="tfa_3252">213-Accounting</option>
                                                                    <option value="tfa_3254">214-Accounts Clerk</option>
                                                                    <option value="tfa_3255">605-Agriculture Production</option>
                                                                    <option value="tfa_3256">629-Auto Body Repair</option>
                                                                    <option value="tfa_3257">636-Automotive Service Level I</option>
                                                                    <option value="tfa_3258">637-Automotive Service Level II</option>
                                                                    <option value="tfa_3259">429-Basic Nursing Assistant (BNA)</option>
                                                                    <option value="tfa_3260">241-Clerical Business</option>
                                                                    <option value="tfa_3261">231-Clerk Typist</option>
                                                                    <option value="tfa_3262">619-Computer Technician</option>
                                                                    <option value="tfa_3263">606-Cosmetology</option>
                                                                    <option value="tfa_3436">237-Criminal Justice</option>
                                                                    <option value="tfa_3264">212-Customer Service</option>
                                                                    <option value="tfa_3265">222-Desktop Publishing</option>
                                                                    <option value="tfa_3266">305-Graphic Design</option>
                                                                    <option value="tfa_3267">234-Information Technology Health Care - Medical Coding</option>
                                                                    <option value="tfa_3268">232-Information Technology Health Care - Medical Transcriptionist</option>
                                                                    <option value="tfa_3269">221-Information Word Processing</option>
                                                                    <option value="tfa_3270">635-Nail Technician</option>
                                                                    <option value="tfa_3272">507-Paraprofessional Education</option>
                                                                    <option value="tfa_3273">216-Professional Tax Preparer</option>
                                                                    <option value="tfa_3274">215-Quickbooks Professional</option>
                                                                </optgroup>
                                                                <optgroup label="Early Childhood Education Certificates">
                                                                    <option value="tfa_3276">726-Early Child Education Infant/Toddler Certificate</option>
                                                                    <option value="tfa_3278">724-Early Child Education Infant/Toddler Certificate - Level 2</option>
                                                                    <option value="tfa_3279">725-Early Child Education Infant/Toddler Certificate- Level 3</option>
                                                                    <option value="tfa_3280">723-Early Childhood Education Level 2 ECE Credential</option>
                                                                    <option value="tfa_3281">713-Early Childhood Education Level 3 ECE Credential</option>
                                                                </optgroup>
                                                                <optgroup label="Equine Certificates">
                                                                    <option value="tfa_3284">638-Equine Massage Therapist</option>
                                                                    <option value="tfa_3285">640-Equine Riding Instructor</option>
                                                                    <option value="tfa_3282">641-Equine Science - General</option>
                                                                    <option value="tfa_3286">639-Equine Stable Manager</option>
                                                                </optgroup>
                                                                <optgroup label="Industrial Manufacuring Technology Certificates">
                                                                    <option value="tfa_3293">628-Basic Welding</option>
                                                                    <option value="tfa_3287">601-Computer-Aided Design Mechanical/Architectural</option>
                                                                    <option value="tfa_3289">615-Industrial Electronics &amp; Controls</option>
                                                                    <option value="tfa_3290">623-Industrial Maintenance Technology</option>
                                                                    <option value="tfa_3291">607-Machine Processes</option>
                                                                    <option value="tfa_3292">614-Welding &amp; Fabrication</option>
                                                                </optgroup></select></div>
                                                    </div>
                                                    <div>
                                                        <label>Major Emphasis (If applicable to your major): </label><br><div><select name="tfa_2990"><option value="">Please select...</option>
                                                                <optgroup label="0101-Transfer Course Enrollee"></optgroup>
                                                                <optgroup label="303-Associate of Science"></optgroup>
                                                                <optgroup label="402-Agriculture"></optgroup>
                                                                <optgroup label="403-Biology"></optgroup>
                                                                <optgroup label="404-Biology Education"></optgroup>
                                                                <optgroup label="204-Business Administration"></optgroup>
                                                                <optgroup label="406-Chemistry"></optgroup>
                                                                <optgroup label="407-Computer Science"></optgroup>
                                                                <optgroup label="517-Criminal Justice"></optgroup>
                                                                <optgroup label="612-Engineering Technology"></optgroup>
                                                                <optgroup label="409-Geology"></optgroup>
                                                                <optgroup label="410-Mathematics"></optgroup>
                                                                <optgroup label="510-Physical Education"></optgroup>
                                                                <optgroup label="411-Physics"></optgroup>
                                                                <optgroup label="430-Pre-Chiropractic"></optgroup>
                                                                <optgroup label="412-Pre-Dentistry"></optgroup>
                                                                <optgroup label="416-Pre-Medical Technology"></optgroup>
                                                                <optgroup label="418-Pre-Medicine"></optgroup>
                                                                <optgroup label="422-Pre-Pharmacy"></optgroup>
                                                                <optgroup label="424-Pre-Veterinary Medicine"></optgroup>
                                                                <optgroup label="414-Associate of Engineering Science"></optgroup>
                                                                <optgroup label="304-Associate of Arts"></optgroup>
                                                                <optgroup label="302-Art/Graphic Design"></optgroup>
                                                                <optgroup label="509-Human/Social Services"></optgroup>
                                                                <optgroup label="310-Mass Communication">
                                                                    <option value="tfa_3399">Public Relations/Marketing Emphasis</option>
                                                                    <option value="tfa_3400">Multimedia Journalism Emphasis</option>
                                                                    <option value="tfa_3401">Multimedia Production Emphasis</option>
                                                                </optgroup>
                                                                <optgroup label="306-Music"></optgroup>
                                                                <optgroup label="504-Political Science"></optgroup>
                                                                <optgroup label="506-Paraprofessional Education"></optgroup>
                                                                <optgroup label="516-Psychology"></optgroup>
                                                                <optgroup label="508-Sociology"></optgroup>
                                                                <optgroup label="308-Speech/Theatre"></optgroup>
                                                                <optgroup label="101-Associate of General Studies (non-transfer)"></optgroup>
                                                                <optgroup label="203-Accounting"></optgroup>
                                                                <optgroup label="630-Agricultural Management">
                                                                    <option value="tfa_3402">Agribusiness Emphasis</option>
                                                                    <option value="tfa_3403">Crop Management Emphasis</option>
                                                                    <option value="tfa_3404">Dairy/Livestock Management Emphasis</option>
                                                                </optgroup>
                                                                <optgroup label="622-Auto Body Repair"></optgroup>
                                                                <optgroup label="604-Automotive Mechanics"></optgroup>
                                                                <optgroup label="420-Medical Assistant"></optgroup>
                                                                <optgroup label="703-Early Childhood Education"></optgroup>
                                                                <optgroup label="425-Emergency Medical Services"></optgroup>
                                                                <optgroup label="633-Equine Science"></optgroup>
                                                                <optgroup label="217-Hospitality Management"></optgroup>
                                                                <optgroup label="634-Industrial Training"></optgroup>
                                                                <optgroup label="206-Information Systems">
                                                                    <option value="tfa_3405">Programming Emphasis</option>
                                                                    <option value="tfa_3406">Office Administration Emphasis</option>
                                                                    <option value="tfa_3407">Computer Technician Empahsis</option>
                                                                    <option value="tfa_3408">Business Emphasis</option>
                                                                </optgroup>
                                                                <optgroup label="233-Information Technology - Healthcare">
                                                                    <option value="tfa_3397">Medical Transcription Emphasis</option>
                                                                    <option value="tfa_3398">Medical Coding Emphasis</option>
                                                                </optgroup>
                                                                <optgroup label="421-Nursing/ADN"></optgroup>
                                                                <optgroup label="505-Paraprofessional Education"></optgroup>
                                                                <optgroup label="213-Accounting"></optgroup>
                                                                <optgroup label="214-Accounts Clerk"></optgroup>
                                                                <optgroup label="605-Agriculture Production"></optgroup>
                                                                <optgroup label="629-Auto Body Repair"></optgroup>
                                                                <optgroup label="636-Automotive Service Level I"></optgroup>
                                                                <optgroup label="637-Automotive Service Level II"></optgroup>
                                                                <optgroup label="429-Basic Nursing Assistant (BNA)"></optgroup>
                                                                <optgroup label="241-Clerical Business"></optgroup>
                                                                <optgroup label="231-Clerk Typist"></optgroup>
                                                                <optgroup label="619-Computer Technician"></optgroup>
                                                                <optgroup label="606-Cosmetology"></optgroup>
                                                                <optgroup label="212-Customer Service"></optgroup>
                                                                <optgroup label="222-Desktop Publishing"></optgroup>
                                                                <optgroup label="305-Graphic Design"></optgroup>
                                                                <optgroup label="234-Information Technology Health Care - Medical Coding"></optgroup>
                                                                <optgroup label="232-Information Technology Health Care - Medical Transcriptionist"></optgroup>
                                                                <optgroup label="221-Information Word Processing"></optgroup>
                                                                <optgroup label="635-Nail Technician"></optgroup>
                                                                <optgroup label="426-Paramedic"></optgroup>
                                                                <optgroup label="507-Paraprofessional Education"></optgroup>
                                                                <optgroup label="216-Professional Tax Preparer"></optgroup>
                                                                <optgroup label="215-Quickbooks Professional"></optgroup>
                                                                <optgroup label="726-Early Child Education Infant/Toddler Certificate"></optgroup>
                                                                <optgroup label="724-Early Child Education Infant/Toddler Certificate - Level 2"></optgroup>
                                                                <optgroup label="725-Early Child Education Infant/Toddler Certificate- Level 3"></optgroup>
                                                                <optgroup label="723-Early Childhood Education Level 2 ECE Credential"></optgroup>
                                                                <optgroup label="713-Early Childhood Education Level 3 ECE Credential"></optgroup>
                                                                <optgroup label="641-Equine Science - General"></optgroup>
                                                                <optgroup label="638-Equine Massage Therapist"></optgroup>
                                                                <optgroup label="640-Equine Riding Instructor"></optgroup>
                                                                <optgroup label="639-Equine Stable Manager"></optgroup>
                                                                <optgroup label="601-Computer-Aided Design Mechanical/Architectural"></optgroup>
                                                                <optgroup label="615-Industrial Electronics &amp; Controls"></optgroup>
                                                                <optgroup label="607-Machine Processes"></optgroup>
                                                                <optgroup label="614-Welding &amp; Fabrication"></optgroup>
                                                                <optgroup label="628-Basic Welding"></optgroup>
                                                                <optgroup label="502-History"></optgroup>
                                                                <optgroup label="238-Criminal Justice"></optgroup>
                                                                <optgroup label="237-Criminal Justice"></optgroup>
                                                                <optgroup label="642-Mechatronics"></optgroup>
                                                                <optgroup label="623-Industrial Maintenance Technology"></optgroup>
                                                                <optgroup label="405-Environmental Science"></optgroup>
                                                                <optgroup label="307-English"></optgroup>
                                                                <optgroup label="704-Early Childhood Education online"></optgroup>
                                                                <optgroup label="301-Graphic Design"></optgroup></select></div>
                                                    </div>
                                                </fieldset>
                                                <div>
                                                    <input type="button" value="Cancel"><input type="submit" value="Submit">
                                                </div>
                                                <div style="clear:both"></div>
                                                <input type="hidden" value="377876" name="tfa_dbFormId"><input type="hidden" value="" name="tfa_dbResponseId"><input type="hidden" value="3abdd5f9974a7f85eee11f97cfc7c39e" name="tfa_dbControl"><input type="hidden" value="124" name="tfa_dbVersionId"><input type="hidden" value="" name="tfa_switchedoff">
                                            </form>

                                        </div></div>
									<p class="supportInfo" >
										<a href="https://www.tfaforms.com/forms/help/377876" target="new"
										   style="font-size: 0.7em;"  >
											Need assistance with this form?    </a>

									</p>
								</div>-->
                                <iframe src="https://www.tfaforms.com/377876" width="100%" height="3000px" ></iframe>

							</div><!-- .entry-content -->
						</article><!-- #post-<? the_ID(); ?> -->
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</main>
<? get_footer(); ?>