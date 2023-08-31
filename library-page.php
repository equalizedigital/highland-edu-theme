<?
defined('ABSPATH') OR exit;
/**
 * Template Name: Library Page
 * Description: Adds Prairie Cat Code Above Content Area.
 *
 * @package WordPress
 * @subpackage WP-Skeleton
 */


get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>

    <script type="text/javascript">
        //<![CDATA[
        function limittoFullText(myForm) {
            if (myForm.fulltext_checkbox.checked) myForm.clv0.value = "Y";
            else myForm.clv0.value = "N";
        }function limittoScholarly(myForm) {
            if(myForm.scholarly_checkbox.checked) myForm.clv1.value = "Y";
            else myForm.clv1.value = "N";
        }function limittoCatalog(myForm) {
            if(myForm.catalog_only_checkbox.checked) myForm.clv2.value = "Y";
            else myForm.clv2.value = "N";
        }function limittoIR(myForm) {
            if(myForm.IR_only_checkbox.checked) myForm.clv3.value = "Y";
            else myForm.clv3.value = "N";
        }function ebscoPreProcess(myForm) {
            myForm.bquery.value = myForm.search_prefix.value + myForm.uquery.value;
        }function limittoArticles(myForm) {
            myForm.bquery.value += ' AND ZT Article';
        }function limittoBooks(myForm) {
            myForm.bquery.value += ' AND PT Book';
        }function limittoeBooks(myForm) {
            myForm.bquery.value += ' AND PT eBook';
        }function limittoVideos(myForm) {
            myForm.bquery.value += ' AND (PT Video)';
        }//]]>
    </script>

    <div class="super-container title-holder">
        <div class="container">
            <div class="sixteen columns alpha omega primary-nav-holder">
                <header>
                    <h1><? the_title(); ?></h1>
                </header><!-- access -->
            </div><!-- menu-holder -->
        </div>
    </div>

    <div class="super-container interior-page">
        <div class="container">
            <div class="sixteen columns alpha">
                <div id="primary" class="full-width">
                    <div id="content">
                        <div class="two-thirds column alpha">
                            <main class="main" id="main-content">
                                <? the_post(); ?>
                                <article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
                                    <div class="entry-content">
                                        <div class="sixteen columns alpha omega athletics">
                                            <div class="prairie-cat-holder">
                                                <div class="customSimpleTabs">
                                                    <ul class="simpleTabsNavigation" role="tablist">
                                                        <li class="library-search-tab current" role="tab" id="discovery-tab" aria-controls="tabber57_div_0" aria-selected="true">Discovery</li>
                                                        <li class="library-search-tab" role="tab" id="prairie-cat-tab" aria-controls="tabber57_div_1">PrairieCat</li>
                                                        <li class="library-search-tab" role="tab" id="ebooks-tab" aria-controls="tabber57_div_2">eBooks</li>
                                                        <li class="library-search-tab" role="tab" id="articles-tab" aria-controls="tabber57_div_3">Articles</li>
                                                        <li class="library-search-tab" role="tab" id="videos-tab" aria-controls="tabber57_div_4">Videos</li>
                                                    </ul>
                                                    <div class="simpleTabsContent" role="tabpanel" aria-labelledby="discovery-tab" id="tabber57_div_0" aria-hidden="false">
                                                        <!-- BEGIN: General Custom Search Box-->
                                                        <form action="https://search.ebscohost.com/login.aspx" method="get" target="_blank" style="margin-bottom: 0" onsubmit="ebscoPreProcess(this)">
                                                            <!-- Dropdown menu to prepend the selected value below to the user's search term -->
                                                            <label for="search_prefix">Search By:</label>
                                                            <select onchange="#" size="1" name="search_prefix" style="width: 100px" id="search_prefix">
                                                            <option selected="selected" value="">Keyword</option>
                                                            <option value="TI ">Title</option>
                                                            <option value="AU ">Author</option>
                                                            </select>
                                                            <input name="direct" value="true" type="hidden"><input name="scope" value="site" type="hidden">
                                                            <!-- target an EDS profile -->
                                                            <input name="site" value="eds-live" type="hidden"><input name="profile" value="eds" type="hidden">
                                                            <!-- Auth type -->
                                                            <input name="authtype" value="ip,sso" type="hidden"><input name="custid" value="s8992009" type="hidden"><input name="groupid" value="main" type="hidden">
                                                            <input name="cli0" value="FT1" type="hidden">
                                                            <input name="clv0" value="Y" type="hidden">
                                                            <!-- search box and submit button -->
                                                            <input name="bquery" value="" type="hidden">
                                                            <div class="floating-label">
                                                                <input name="uquery" size="65" type="text" id="discovery_input" placeholder="Search Keywords">
                                                                <label for="discovery_input">
                                                                    Search Keywords
                                                                </label>
                                                            </div>
                                                            <input value="Search" type="submit">
                                                            <div class="clear"></div>
                                                            <a href="https://search.ebscohost.com/login.aspx?authtype=ip,sso&direct=true&type=1&profile=eds&custid=s8992009" target="_blank">Advanced Search</a>
                                                        </form>
                                                    </div>


                                                    <div   class="simpleTabsContent" role="tabpanel" aria-labelledby="prairie-cat-tab" id="tabber57_div_1" aria-hidden="true">
                                                        <form action="http://search.ebscohost.com/login.aspx" method="get" target="_blank" style="margin-bottom: 0;" onsubmit="ebscoPreProcess(this)"><p />
                                                            <!-- Dropdown menu to prepend the selected value below to the user's search term -->
                                                            <select onchange="#" size="1" name="search_prefix" style="width: 100px"><option selected="selected" value="">Keyword</option><option value="TI ">Title</option><option value="AU ">Author</option></select><input name="direct" value="true" type="hidden"><input name="scope" value="site" type="hidden">
                                                            <!-- target an EDS profile -->
                                                            <input name="site" value="eds-live" type="hidden"><input name="profile" value="eds" type="hidden">
                                                            <!-- Auth type -->
                                                            <input name="authtype" value="ip,sso" type="hidden"><input name="custid" value="s8992009" type="hidden"><input name="groupid" value="main" type="hidden">
                                                            <!-- search box and submit button -->
                                                            <input name="bquery" value="" type="hidden">
                                                            <div class="floating-label">
                                                                <input name="uquery" size="65" type="text" id="prairie_input" placeholder="Search Keywords">
                                                                <label for="prairie_input">
                                                                    Search Keywords
                                                                </label>
                                                            </div>
                                                            <input value="Search" type="submit">
                                                            <!-- Limiter Check Boxes: To display, adjust the html comment tags at desired locations -->
                                                            <!-- Limiter: Full Text -->
                                                            <input name="cli0" value="FT" type="hidden"><input name="clv0" type="hidden" value='N'><input  style='display:none' type="checkbox" name="fulltext_checkbox" id="fulltext_checkbox_all" onclick="limittoFullText(this.form)" ><label  style='display:none' for="fulltext_checkbox_all">Full-Text (online)</label>
                                                            <!-- Limiter: Scholarly/Peer-Reviewed -->
                                                            <input name="cli1" value="RV" type="hidden"><input name="clv1"  type="hidden" value='N'><input  style='display:none' name="scholarly_checkbox" id="scholarly_checkbox_articles" onclick="limittoScholarly(this.form)" type="checkbox"><label  style='display:none' for="scholarly_checkbox_articles">Scholarly (Peer Reviewed)</label>
                                                            <!-- Limiter: Catalog Only -->
                                                            <input name="cli2" value="FC" type="hidden"><input name="clv2" type="hidden" value='Y'><input CHECKED  style='display:none' name="catalog_only_checkbox" id="catalog_only_checkbox" onclick="limittoCatalog(this.form)" type="checkbox"><label  style='display:none' for="catalog_only_checkbox">Catalog Only</label>
                                                            <!-- Limiter: Institutional Repositories Only -->
                                                            <input name="cli3" value="FC1" type="hidden"><input name="clv3" type="hidden" value='N'><input  style='display:none' name="IR_only_checkbox" id="IR_only_checkbox" onclick="limittoIR(this.form)" type="checkbox"><label  style='display:none' for="IR_only_checkbox">Institutional Repositories Only</label>
                                                            <div class="clear"></div>
                                                            <a href="https://search.prairiecat.info" target="_blank">PrairieCat</a>
                                                        </form>
                                                    </div>


                                                    <div  class="simpleTabsContent" role="tabpanel" aria-labelledby="ebooks-tab" id="tabber57_div_2" aria-hidden="true">
                                                        <!-- Begin form which will construct a link into EDS https://support.epnet.com/knowledge_base/detail.php?id=2747#linksearch -->
                                                        <form action="https://search.ebscohost.com/login.aspx" method="get" target="_blank" style="margin-bottom: 0" onsubmit="ebscoPreProcess(this); limittoeBooks(this)">
                                                            <!-- Dropdown menu to prepend the selected value below to the user's search term -->
                                                            <select onchange="#" size="1" name="search_prefix" style="width: 100px"><option selected="selected" value="">Keyword</option><option value="TI ">Title</option><option value="AU ">Author</option></select><input name="direct" value="true" type="hidden"><input name="scope" value="site" type="hidden">
                                                            <!-- target an EDS profile -->
                                                            <input name="site" value="eds-live" type="hidden"><input name="profile" value="eds" type="hidden">
                                                            <!-- Auth type -->
                                                            <input name="authtype" value="ip,sso" type="hidden"><input name="custid" value="s8992009" type="hidden"><input name="groupid" value="main" type="hidden">
                                                            <input name="cli0" value="FT" type="hidden">
                                                            <input name="clv0" value="Y" type="hidden">
                                                            <!-- search box and submit button -->
                                                            <input name="bquery" value="" type="hidden">
                                                            <div class="floating-label">
                                                                <input name="uquery" size="65" type="text" id="ebook_input" placeholder="Search Keywords">
                                                                <label for="ebook_input">
                                                                    Search Keywords
                                                                </label>
                                                            </div>
                                                            <input value=" Search " type="submit">
                                                            <div class="clear"></div>

                                                        </form>
                                                    </div>


                                                    <div  class="simpleTabsContent" role="tabpanel" aria-labelledby="articles-tab" id="tabber57_div_3" aria-hidden="true">
                                                        <!-- Begin form which will construct a link into EDS https://support.epnet.com/knowledge_base/detail.php?id=2747#linksearch -->
                                                        <form action="https://search.ebscohost.com/login.aspx" method="get" target="_blank" style="margin-bottom: 0" onsubmit="ebscoPreProcess(this); limittoArticles(this)">
                                                            <!-- Dropdown menu to prepend the selected value below to the user's search term -->
                                                            <select onchange="#" size="1" name="search_prefix" style="width: 100px"><option selected="selected" value="">Keyword</option><option value="TI ">Title</option><option value="AU ">Author</option></select><input name="direct" value="true" type="hidden"><input name="scope" value="site" type="hidden">
                                                            <!-- target an EDS profile -->
                                                            <input name="site" value="eds-live" type="hidden"><input name="profile" value="eds" type="hidden">
                                                            <!-- Auth type -->
                                                            <input name="authtype" value="ip,sso" type="hidden"><input name="custid" value="s8992009" type="hidden"><input name="groupid" value="main" type="hidden">
                                                            <!-- search box and submit button -->
                                                            <input name="bquery" value="" type="hidden">
                                                            <div class="floating-label">
                                                                <input name="uquery" size="65" type="text" id="article_input" placeholder="Search Keywords">
                                                                <label for="article_input">
                                                                    Search Keywords
                                                                </label>
                                                            </div>
                                                            <input value=" Search " type="submit">
                                                            <div class="clear"></div>
                                                            <!-- Since we only want Articles in this tab, we need to append ' AND ZT Article' to the user's search entry.  This is set in the limittoArticles(this) function in the above Javascript -->
                                                            <!-- Full text limiter  --><input name="cli0" value="FT" type="hidden"><input name="clv0" type="hidden" value='N'><input  name="fulltext_checkbox" id="fulltext_checkbox_articles" onclick="limittoFullText(this.form)" type="checkbox"> <label style="color: #666;" for="fulltext_checkbox_articles">Full-Text</label>
                                                            <!-- Scholarly/Peer-reviewed limiter --><input name="cli1" value="RV" type="hidden"><input name="clv1" type="hidden" value='N'><input  name="scholarly_checkbox" id="scholarly_checkbox_articles" onclick="limittoScholarly(this.form)" type="checkbox"> <label style="color: #666;" for="scholarly_checkbox_articles">Peer Reviewed</label></form>
                                                    </div>

                                                    <div  class="simpleTabsContent" role="tabpanel" aria-labelledby="videos-tab" id="tabber57_div_4" aria-hidden="true">
                                                        <!-- Begin form which will construct a link into EDS https://support.epnet.com/knowledge_base/detail.php?id=2747#linksearch -->
                                                        <form action="https://search.ebscohost.com/login.aspx" method="get" target="_blank" style="margin-bottom: 0" onsubmit="ebscoPreProcess(this); limittoVideos(this)">
                                                            <!-- Dropdown menu to prepend the selected value below to the user's search term -->
                                                            <select onchange="#" size="1" name="search_prefix" style="width: 100px"><option selected="selected" value="">Keyword</option><option value="TI ">Title</option><option value="AU ">Author</option></select><input name="direct" value="true" type="hidden"><input name="scope" value="site" type="hidden">
                                                            <!-- target an EDS profile -->
                                                            <input name="site" value="eds-live" type="hidden"><input name="profile" value="eds" type="hidden">
                                                            <!-- Auth type -->
                                                            <input name="authtype" value="ip,sso" type="hidden"><input name="custid" value="s8992009" type="hidden"><input name="groupid" value="main" type="hidden">
                                                            <input name="cli0" value="FT" type="hidden"><input name="clv0" type="hidden" value='Y'>
                                                            <input name="cli1" value="FT1" type="hidden"><input name="clv1" type="hidden" value='N'>
                                                            <!-- search box and submit button -->
                                                            <input name="bquery" value="" type="hidden">
                                                            <div class="floating-label">
                                                                <input name="uquery" size="65" type="text" id="videos_input" placeholder="Search Keywords">
                                                                <label for="videos_input">
                                                                    Search Keywords
                                                                </label>
                                                            </div>
                                                            <input value=" Search " type="submit">
                                                            <div class="clear"></div>

                                                        </form>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    /* IE only */
                                                    curvy_roundies.addRule('.nav', '7px 7px 0px 0px');
                                                </script>
                                                <!--[if IE]>
                                                <link rel="stylesheet" href="https://imageserver.ebscohost.com/branding/tabbedsearch/css/IEsimpletabs.css" type="text/css" media="screen"/>
                                                <![endif]-->
                                                <!--End of Tabbed Search-->
                                                <!-- CUSTOM SCRIPT TO UPDATE ARIA-SELECTED ATTRIBUTE ON TABS -->
                                                <script>
                                                    function addAriaSelected(event) {
                                                      // Prevent the default click behavior
                                                      event.preventDefault();

                                                      // Get the clicked <a> element
                                                      const clickedLink = event.target;

                                                      // Get the <li> element that contains the clicked link
                                                      const parentListItem = clickedLink.parentNode;

                                                      // Get all <li> elements with the class "library-search-tab"
                                                      const librarySearchTabs = document.querySelectorAll('.library-search-tab');

                                                      // Loop over all <li> elements with the class "library-search-tab"
                                                      for (let i = 0; i < librarySearchTabs.length; i++) {
                                                        const tab = librarySearchTabs[i];

                                                        // If the current <li> is the one that contains the clicked link
                                                        if (tab === parentListItem) {
                                                          // Set the aria-selected attribute to true
                                                          tab.setAttribute('aria-selected', true);
                                                        } else {
                                                          // Otherwise, remove the aria-selected attribute
                                                          tab.removeAttribute('aria-selected');
                                                        }
                                                      }
                                                    }

                                                    // Add a click event listener to all <a> elements with the class "nav"
                                                    const navLinks = document.querySelectorAll('.nav');
                                                    for (let i = 0; i < navLinks.length; i++) {
                                                      const link = navLinks[i];
                                                      link.addEventListener('click', addAriaSelected);
                                                    }
                                                  </script>
                                            </div>
                                            <? the_content(); ?>
                                        </div>
                                    </div><!-- .entry-content -->
                                </article><!-- #post-<? the_ID(); ?> -->
                            </main><!-- #main -->
                        </div><!-- two-thirds -->
                        <? get_sidebar(); ?>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>

<? get_footer(); ?>