<?
defined('ABSPATH') OR exit;
/**
 * Template Name: Request Information Page
 * Description: Adds Request Information Form below the content block.
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

								<!-- FORM: HEAD SECTION - ->

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

								<link href="https://www.tfaforms.com/form-builder/4.2.0/css/wforms-layout.css?v=500-1" rel="stylesheet" type="text/css" />

								< !--[if IE 8] >
								<link href="https://www.tfaforms.com/form-builder/4.2.0/css/wforms-layout-ie8.css" rel="stylesheet" type="text/css" />
								<![endif]- ->
								< !--[if IE 7]>
								<link href="https://www.tfaforms.com/form-builder/4.2.0/css/wforms-layout-ie7.css" rel="stylesheet" type="text/css" />
								< ![endif]- ->
								<!--[if IE 6]>
								<link href="https://www.tfaforms.com/form-builder/4.2.0/css/wforms-layout-ie6.css" rel="stylesheet" type="text/css" />
								<![endif]- ->
								<link href="https://www.tfaforms.com/themes/get/17259" rel="stylesheet" type="text/css" />
								<link href="https://www.tfaforms.com/form-builder/4.2.0/css/wforms-jsonly.css?v=500-1" rel="alternate stylesheet" title="This stylesheet activated by javascript" type="text/css" />
								<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.8/js/wforms.js?v=500-1"></script>
								<script type="text/javascript">
									wFORMS.behaviors.prefill.skip = false;
								</script>
								<script type="text/javascript" src="https://www.tfaforms.com/wForms/3.8/js/localization-en_US.js?v=500-1"></script>

								<!-- FORM: BODY SECTION - ->
								<div class="wFormContainer" style="max-width: 600; width:auto;" >
									<div class=""><div class="wForm" id="tfa_3590416182989-WRPR" dir="ltr">
											<div class="codesection" id="code-tfa_3590416182989">
												<script>wFORMS.behaviors.paging.showTabNavigation = true;</script>
											</div>
											<h3 class="wFormTitle" id="tfa_3590416182989-T">General Information Request</h3>
                                            <form method="post" action="https://www.tfaforms.com/responses/processor" target="_blank" onsubmit="try {return window.confirm(&quot;You are submitting information to an external page.\nAre you sure?&quot;);} catch (e) {return false;}">
                                                <div><div><h4><span style="font-size:14px;background-color:rgb(255,255,255)"><span style="font-weight:normal">For Comments or Questions, please provide the following information</span></span><br></h4></div></div>
                                                <div>
                                                    <label>First Name</label><div><input type="text" name="tfa_3590416182990" value="" title="First Name"></div>
                                                </div>
                                                <div>
                                                    <label>Last Name</label><div>
                                                        <input type="text" name="tfa_3590416182991" value="" title="Last Name"><div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label>Address</label><div><input type="text" name="tfa_3590416183273" value="" title="Address"></div>
                                                </div>
                                                <div>
                                                    <label>City</label><div><input type="text" name="tfa_3590416183274" value="" title="City"></div>
                                                </div>
                                                <div><div>
                                                        <div>
                                                            <label>State</label><div><select name="tfa_3590416183542" title="State"><option value="">Please select...</option>
                                                                    <option value="tfa_3590416183543">Alabama</option>
                                                                    <option value="tfa_3590416183544">Alaska</option>
                                                                    <option value="tfa_3590416183545">Arizona</option>
                                                                    <option value="tfa_3590416183546">Arkansas</option>
                                                                    <option value="tfa_3590416183547">California</option>
                                                                    <option value="tfa_3590416183548">Colorado</option>
                                                                    <option value="tfa_3590416183549">Connecticut</option>
                                                                    <option value="tfa_3590416183550">Delaware</option>
                                                                    <option value="tfa_3590416183551">District Of Columbia</option>
                                                                    <option value="tfa_3590416183552">Florida</option>
                                                                    <option value="tfa_3590416183553">Georgia</option>
                                                                    <option value="tfa_3590416183554">Hawaii</option>
                                                                    <option value="tfa_3590416183555">Idaho</option>
                                                                    <option value="tfa_3590416183556">Illinois</option>
                                                                    <option value="tfa_3590416183557">Indiana</option>
                                                                    <option value="tfa_3590416183558">Iowa</option>
                                                                    <option value="tfa_3590416183559">Kansas</option>
                                                                    <option value="tfa_3590416183560">Kentucky</option>
                                                                    <option value="tfa_3590416183561">Louisiana</option>
                                                                    <option value="tfa_3590416183562">Maine</option>
                                                                    <option value="tfa_3590416183563">Maryland</option>
                                                                    <option value="tfa_3590416183564">Massachusetts</option>
                                                                    <option value="tfa_3590416183565">Michigan</option>
                                                                    <option value="tfa_3590416183566">Minnesota</option>
                                                                    <option value="tfa_3590416183567">Mississippi</option>
                                                                    <option value="tfa_3590416183568">Missouri</option>
                                                                    <option value="tfa_3590416183569">Montana</option>
                                                                    <option value="tfa_3590416183570">Nebraska</option>
                                                                    <option value="tfa_3590416183571">Nevada</option>
                                                                    <option value="tfa_3590416183572">New Hampshire</option>
                                                                    <option value="tfa_3590416183573">New Jersey</option>
                                                                    <option value="tfa_3590416183574">New Mexico</option>
                                                                    <option value="tfa_3590416183575">New York</option>
                                                                    <option value="tfa_3590416183576">North Carolina</option>
                                                                    <option value="tfa_3590416183577">North Dakota</option>
                                                                    <option value="tfa_3590416183578">Ohio</option>
                                                                    <option value="tfa_3590416183579">Oklahoma</option>
                                                                    <option value="tfa_3590416183580">Oregon</option>
                                                                    <option value="tfa_3590416183581">Pennsylvania</option>
                                                                    <option value="tfa_3590416183582">Rhode Island</option>
                                                                    <option value="tfa_3590416183583">South Carolina</option>
                                                                    <option value="tfa_3590416183584">South Dakota</option>
                                                                    <option value="tfa_3590416183585">Tennessee</option>
                                                                    <option value="tfa_3590416183586">Texas</option>
                                                                    <option value="tfa_3590416183587">Utah</option>
                                                                    <option value="tfa_3590416183588">Vermont</option>
                                                                    <option value="tfa_3590416183589">Virginia</option>
                                                                    <option value="tfa_3590416183590">Washington</option>
                                                                    <option value="tfa_3590416183591">West Virginia</option>
                                                                    <option value="tfa_3590416183592">Wisconsin</option>
                                                                    <option value="tfa_3590416183593">Wyoming</option>
                                                                    <option value="tfa_3590416183594">Puerto Rico</option>
                                                                    <option value="tfa_3590416183595">Virgin Island</option>
                                                                    <option value="tfa_3590416183596">Northern Mariana Islands</option>
                                                                    <option value="tfa_3590416183597">Guam</option>
                                                                    <option value="tfa_3590416183598">American Samoa</option>
                                                                    <option value="tfa_3590416183599">Palau</option></select></div>
                                                        </div>
                                                        <div>
                                                            <label>Zip </label><div><input type="text" name="tfa_3590416183278" value="" title="Zip "></div>
                                                        </div>
                                                    </div></div>
                                                <div>
                                                    <label>Email</label><div><input type="text" name="tfa_3590416182993" value="" title="Email"></div>
                                                </div>
                                                <div>
                                                    <label>Phone Number</label><div><input type="text" name="tfa_3590416182994" value="" title="Phone Number"></div>
                                                </div>
                                                <div>
                                                    <label>Contact Preference</label><div><select name="tfa_3590416182995" title="Contact Preference"><option value="">Please select...</option>
                                                            <option value="tfa_3590416182996">Email</option>
                                                            <option value="tfa_3590416182997">Phone</option>
                                                            <option value="tfa_3590416182998">No Preference</option></select></div>
                                                </div>
                                                <div>
                                                    <label>What Fields of Study Are You Interested In?</label><div><input type="text" name="tfa_3590416183602" value="" title="What Fields of Study Are You Interested In?"></div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <label>Please send me information about:</label><div><span><span><input type="checkbox" value="tfa_3590416183263" name="tfa_3590416183263"><label>Campus Tour</label></span></span></div>
                                                    </div>
                                                    <div><div><span><span><input type="checkbox" value="tfa_3590416183281" name="tfa_3590416183281"><label>Admissions/Registration</label></span></span></div></div>
                                                    <div><div><span><span><input type="checkbox" value="tfa_3590416183286" name="tfa_3590416183286"><label>Financial Aid</label></span></span></div></div>
                                                    <div>
                                                        <label>Edit this text</label><div><span><span><input type="checkbox" value="tfa_3590416183290" name="tfa_3590416183290"><label>Housing</label></span></span></div>
                                                    </div>
                                                    <div><div><span><span><input type="checkbox" value="tfa_3590416183294" name="tfa_3590416183294"><label>Scholarships</label></span></span></div></div>
                                                    <div><div><span><span><input type="checkbox" value="tfa_3590416183298" name="tfa_3590416183298"><label>Campus Clubs/Student Organizations</label></span></span></div></div>
                                                </div>
                                                <div>
                                                    <label>Comments or Questions</label><br><div><textarea maxlength="255" name="tfa_3590416183258" title="Comments or Questions"></textarea></div>
                                                </div>
                                                <div><div><p>Thanks for contacting us.<br></p></div></div>
                                                <input type="hidden" name="tfa_3590416183299" value="HCC Website - General Inquiry"><input type="hidden" name="tfa_3590416183600" value="701o0000000mq7m"><input type="hidden" name="tfa_3590416183601" value="Website"><div>
                                                    <input type="button" value="Cancel"><input type="submit" value="Send">
                                                </div>
                                                <div style="clear:both"></div>
                                                <input type="hidden" value="376908" name="tfa_dbFormId"><input type="hidden" value="" name="tfa_dbResponseId"><input type="hidden" value="14bdbeed8536329191eecec14ef58e88" name="tfa_dbControl"><input type="hidden" value="35" name="tfa_dbVersionId"><input type="hidden" value="" name="tfa_switchedoff">
                                            </form>
										</div></div>
									<p class="supportInfo" >
										<a href="https://www.tfaforms.com/forms/help/376908" target="new"
										   style="font-size: 0.7em;"  >
											Need assistance with this form?    </a>

									</p>
								</div>-->

                                <!--<iframe src="https://www.tfaforms.com/376908" width="100%" height="1000px" ></iframe>-->

							</div><!-- .entry-content -->
						</article><!-- #post-<? the_ID(); ?> -->
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</main><!-- #main-content -->
<? get_footer(); ?>