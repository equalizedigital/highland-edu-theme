<?
defined('ABSPATH') OR exit;
/**
 * Template Name: Test Upload Page
 * Description: Test new applications for the site.
 *
 * @package WordPress
 * @subpackage WP-Skeleton
 */


get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title

//include autoloader
require 'includes/phpoffice/vendor/autoload.php';

//load dependencies
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Csv;

?>

<div class="super-container events-holder">
    <div class="events-header">
        <p>PHP Spreadsheet Test</p>
        <?
            $upload_dir = wp_upload_dir();
            $file = $upload_dir['basedir'].'/hcc_schedules_st314.xlsx';
            var_viewer($file);

            $reader = new Xlsx();
            $spreadsheet = $reader->load($file);

            $loadedSheetNames = $spreadsheet->getSheetNames();

            $objWriter = new Csv($spreadsheet);

            foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
                $objWriter->setSheetIndex($sheetIndex);
                $new_path = $upload_dir['basedir'].'/'.$loadedSheetName.'.csv';
                $objWriter->save($new_path);
            }
            $csvData = file_get_contents($new_path);
            $lines = explode(PHP_EOL, $csvData);
            $array = array();
            foreach ($lines as $line) {
                $array[] = str_getcsv($line);
            }
            var_viewer($array);
        ?>
    </div>
</div>

<? get_footer(); ?>

