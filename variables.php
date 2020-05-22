<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=variables.php?reload=1">';
}

?>

<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<?php
function getContentsBetween($str, $startDelimiter, $endDelimiter)
{
    $contents = array();
    $startDelimiterLength = strlen($startDelimiter);
    $endDelimiterLength = strlen($endDelimiter);
    $startFrom = $contentStart = $contentEnd = 0;
    while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
        $contentStart += $startDelimiterLength;
        $contentEnd = strpos($str, $endDelimiter, $contentStart);
        if (false === $contentEnd) {
            break;
        }
        $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
        $startFrom = $contentEnd + $endDelimiterLength;
    }

    return $contents;

}

?>

<?php

$ds = DIRECTORY_SEPARATOR;  // Store directory separator (DIRECTORY_SEPARATOR) to a simple variable. This is just a personal preference as we hate to type long variable name.
$storeFolder = 'uploads';   // Declare a variable for destination folder.

//$tempFile = $_FILES['file']['tmp_name'];        // If file is sent to the page, store the file object to a temporary variable.
//$targetPath = __DIR__ . $ds . $storeFolder . $ds;  // Create the absolute path of the destination folder.

//$newFileName = $_FILES['file']['name'];
//$targetFile = $targetPath . $newFileName;  // Create the absolute path of the uploaded file destination.
//move_uploaded_file($tempFile, $targetFile); // Move uploaded file to destination.

// Include and initialize Extractor class (Zip file extracting)
require 'Extractor.class.php';
$extractor = new Extractor;

// Path of archive file
//$archivePath = $targetFile;

// Destination path
$destPath = $storeFolder;

// Extract archive file
//$extract = $extractor->extract($archivePath, $storeFolder);

$dir_name = $storeFolder;
$ext = 'zip';

if ($extract) {
    echo $GLOBALS['status']['success'];
    unlink_recursive($dir_name, $ext);

} else {
    //echo $GLOBALS['status']['error'];
}


if ($handle = opendir('uploads')) {

    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {

            $entry_arr_af = preg_split("/\.java/", $entry);
            $entry_arr = array_filter($entry_arr_af);

            foreach ($entry_arr

                     as $files) {

                $content = file_get_contents('uploads/' . $entry);

//  Removes single line '//' comments, treats blank characters
                $single = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $content);

                $multiple = preg_replace('#/\*[^*]*\*+([^/][^*]*\*+)*/#', '', $single);
                $excess = preg_replace('/\s+/', ' ', $multiple);
                $trim = trim($excess, " ");
//$for_semicolon = preg_replace('/;(?=((?!\().)*?\))/', ';', $trim);
                $for_semicolon = preg_replace_callback(/** @lang text */ '~\b(?:while|for)\s*(\((?:[^()]++|(?1))*\))~u', static function ($m) {
                    return str_replace(';', ';', $m[0]);
                },
                    $trim);
                $split = preg_split('/(?<=[;{}])/', $for_semicolon, 0, PREG_SPLIT_NO_EMPTY);

                $_SESSION['split_code'] = $split;
                $_SESSION['files'] = $entry;
                $_SESSION['trimmed'] = $trim;
                $_SESSION['entireCode'] = $trim;
                $_SESSION['filename'] = $entry;



                ?>


                <div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Content Head -->
                <div class="kt-subheader  kt-grid__item" id="kt_subheader">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-subheader__main">
                            <h3 class="kt-subheader__title">Variables Complexity of the Program</h3>
                            <span class="kt-subheader__separator kt-subheader__separator--v"></span>


                            <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                                <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                                <span class="kt-input-icon__icon kt-input-icon__icon--right">
											<span><i class="flaticon2-search-1"></i></span>
										</span>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <!-- end:: Content Head -->
                <?php



                $entry_arr_af = preg_split("/\.java/", $entry);
                $entry_arr = array_filter($entry_arr_af);

                foreach ($entry_arr as $files_arr) {

                    $fi = new FilesystemIterator($storeFolder, FilesystemIterator::SKIP_DOTS);
                    $limit = (iterator_count($fi));

                    $lastRow = "SELECT * FROM ( SELECT * FROM cv ORDER BY CvID DESC LIMIT $limit) result ORDER BY CvID ASC";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                        $CvID_last = $lastrow['CvID'];
                        $CvValue_last = $lastrow['CvValue'];

                        ?>
                        <!-- begin:: Content -->
                        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <!--Begin::Dashboard 3-->
                            <!--Begin::Row-->
                            <div class="row">


                                <div class="col-lg-12">


                                    <!--begin::Portlet-->
                                    <div style="background-color: #F4F7FF;" class="kt-portlet kt-portlet--skin-solid kt-portlet--">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon kt-font-brand">
													<i class="flaticon-time-1"></i>
												</span>
                                                <h3 class="kt-portlet__head-title kt-font-brand">
                                                    Complexity of the Program due to Variables
                                                </h3>
                                            </div>

                                        </div>
                                        <div class="kt-portlet__body kt-font-brand">


                                            <div class="row">

                                                <div class="col-lg-12">
                                                  
                                                        <div class="kt-portlet__body">
                                                            <div class="kt-iconbox__body">
                                                              
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                         height="24px" viewBox="0 0 24 24" version="1.1"
                                                                         class="kt-svg-icon">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                                                  fill="#000000" opacity="0.3"/>
                                                                            <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                                                  fill="#000000"/>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="kt-iconbox__desc kt-font-brand">

                                                                        <center><h1 style="font-family: 'Fira Code'">Cv
                                                                                : <?php echo $CvValue_last ?>


                                                                            </h1></center>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>




                                            <div class="kt-portlet__foot">
                                                <div class="kt-form__actions">
                                                    <div class="row">


                                                            <!-- begin:: Content -->
                                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
    <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
    </span>
            <h3 class="kt-portlet__head-title kt-font-brand">
                Complexity of the Program due to Variables by Statement : </h3>&nbsp;
            <h3 class="kt-portlet__head-title kt-font-dark">

                <?php $file = $_SESSION['filename'];
                echo $file; ?>

            </h3>
        </div>
       

        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
      <div class="col-lg-12 ml-lg-auto">
                        <center>
                            <a href="total_weight.php">
                                <button type="button" href="total_weight.php" class="btn btn-brand">
                                    <span><i class="flaticon-home"></i></span> Total Complexity of the
                                    Program
                                </button>
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>


    </div>
                                                                <div class="kt-portlet__body kt-font-dark">
                                                                    <!--begin: Datatable -->
                                                                    <table style="font-family: 'Fira Code'; text-align: center"
                                                                           class="table table-striped- table-bordered table-hover"
                                                                           id="kt_table_1">
                                                                        <thead>
                                                                        <tr class="kt-label-bg-color-1" style="font-family: 'Fira Code Medium'">
                                                                            <th>Line No</th>
                                                                            <th>Program Statements</th>
                                                                            <th>Wvs</th>
                                                                            <th>Npdtv</th>
                                                                            <th>Ncdtv</th>
                                                                            <th style="color: white" class="kt-label-bg-color-2">Cv</th>


                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php

                                                                        $lastRow = "SELECT * FROM variables ORDER BY VariableID DESC LIMIT 1";
                                                                        $run_query_last = mysqli_query($con,$lastRow);

                                                                        while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                                                                        $VariableID_last = $lastrow['VariableID'];
                                                                        $GlobalVariable_last = $lastrow['GlobalVariable'];
                                                                        $LocalVariable_last = $lastrow['LocalVariable'];
                                                                        $PrimitiveVariable_last = $lastrow['PrimitiveVariable'];
                                                                        $CompositeVariable_last = $lastrow['CompositeVariable'];


                                                                        $i = 0; //increment to each loop
                                                                        $count = 0;
                                                                        $total_Cv = 0;

                                                                        $Wvs = 0;
                                                                        $Npdtv = 0;
                                                                        $Ncdtv = 0;
                                                                        $Cv = 0;
                                                                        $beforeCv = 0;

                                                                        //Default Weights
                                                                        $weight_primitive_datatype_variable = $GlobalVariable_last;
                                                                        $weight_composite_datatype_variable = $LocalVariable_last;
                                                                        $weight_global_variable = $PrimitiveVariable_last;
                                                                        $weight_local_variable = $CompositeVariable_last;


                                                                        $entireCode = str_replace(';', ';', $trim);

                                                                        //Matching Methods - Entire Code
                                                                        $methods = (getContentsBetween($entireCode, ') {', '}'));

                                                                        //Matching Outside from Methods
                                                                        $codeOutsideMethods = str_replace($methods, '', $entireCode);

                                                                        $splitAfterSemicolon = str_replace(';', ';', $split);

                                                                        //For Printing of the code lines for the table
                                                                        if (!$splitAfterSemicolon == ""){
                                                                        foreach ($splitAfterSemicolon as $valAfterSemicolonReplace) { // Traverse the array with FOREACH

                                                                        $val = str_replace(';', ';', $valAfterSemicolonReplace);

                                                                        $global_variable_count_total = 0;
                                                                        $local_variable_count_total = 0;
                                                                        $primitive_datatype_variable_count_total = 0;
                                                                        $composite_datatype_variable_count_total = 0;


                                                                        foreach ($methods as $method) {

                                                                            $method;

                                                                            //Matching variables inside methods (Local Variables)
                                                                            $local_variable_count = preg_match_all('/byte \w+\;|short \w+\;|int \w+\;|long \w+\;|float \w+\;|double \w+\;|char \w+\;|String \w+\;|boolean \w+\;|\w+ \w+ \= \w+|\w+ \w+\, \w+\;|private \w+ \w+\;/', $method, $counter);
                                                                            $local_variables = $counter;

                                                                            //Converting local variable array into normal lines
                                                                            foreach ($local_variables as $local) {

                                                                                if (!$local == "") {

                                                                                    foreach ($local as $local_variable) {

                                                                                        //Iterate through all rows of code in the table
                                                                                     //   for ($x = 0; $x <= $row_count; $x++) {

                                                                                            $local_variables; // The array of local variables
                                                                                            $splitAfterSemicolon; // The array of code lines

                                                                                            //echo $local_variable;// Single lines of local variables
                                                                                            //echo $val;// Single lines of code
                                                                                            //echo "<br>";


                                                                                            //Checking the code lines if there are matching local variables
                                                                                            if (strpos($val, $local_variable) !== false) {

                                                                                                $local_variable_count_total = substr_count($val, $local_variable);


                                                                                            }
                                                                                      //  }
                                                                                    }
                                                                                }
                                                                            }

                                                                            //Matching variables outside methods (Global Variables)
                                                                            $global_variable_count = preg_match_all('/byte \w+\;|short \w+\;|int \w+\;|long \w+\;|float \w+\;|double \w+\;|char \w+\;|String \w+\;|boolean \w+\;|\w+ \w+ \= \w+|\w+ \w+\, \w+\;|private \w+ \w+\;/', $codeOutsideMethods, $counter);
                                                                            $global_variables = $counter;

                                                                            //Converting global variable array into normal lines
                                                                            foreach ($global_variables as $global) {
                                                                                $result = array_filter($global);
                                                                                if (!$result == "") {
                                                                                    foreach ($result as $global_variable) {

                                                                                        //Iterate through all rows of code in the table
                                                                                   ///     for ($x = 0; $x <= $row_count; $x++) {

                                                                                            //print_r($global_variables);

                                                                                            $global_variables; // The array of global variables
                                                                                            $splitAfterSemicolon; // The array of code lines

                                                                                            //echo $global_variable;// Single lines of global variables
                                                                                            //echo $val;// Single lines of code
                                                                                            //echo "<br>";

                                                                                            //Checking the code lines if there are matching global variables

                                                                                            if (strpos($val, $global_variable) !== false) {

                                                                                                $global_variable_count_total = substr_count($val, $global_variable);

                                                                                            }

                                                                                    //    }

                                                                                    }

                                                                                }

                                                                            }

                                                                            //Matching primitive variables
                                                                            $total_variable_count = preg_match_all('/byte.*?\;|short .*?\;|int .*?\;|long .*?\;|float .*?\;|double .*?\;|char .*?\;|String .*?\;|boolean .*?\;/', $entireCode, $counter);
                                                                            $all_prem_variables = $counter;

                                                                            //Converting all variables array into normal lines
                                                                            foreach ($all_prem_variables as $vars) {
                                                                                $result = array_filter($vars);
                                                                                if (!$result == "") {
                                                                                    foreach ($result as $all_variable) {

                                                                                        //Iterate through all rows of code in the table
                                                                                 ///       for ($x = 0; $x <= $row_count; $x++) {


                                                                                            //print_r($all_variables);

                                                                                            $all_prem_variables; // The array of all variables
                                                                                            $splitAfterSemicolon; // The array of code lines

                                                                                            //echo $all_variable;// Single lines of all variables
                                                                                            //echo $val;// Single lines of code
                                                                                            //echo "<br>";

                                                                                            //Checking the code lines if there are matching local variables


                                                                                            if (strpos($val, $all_variable) !== false) {

                                                                                                $primitive_datatype_variable_count_total = substr_count($val, $all_variable);

                                                                                            }

                                                                                            if (preg_match('/private byte \w+, \w+\;|private short \w+, \w+\;|private int \w+, \w+\;|private long \w+, \w+\;|private float \w+, \w+\;|private double \w+, \w+\;|private char \w+, \w+\;|private String \w+, \w+\;|private boolean \w+, \w+\;/', $val)) {

                                                                                                $primitive_datatype_variable_count_total = 2;

                                                                                            }

                                                                                            if ($Wvs > 0 && $Ncdtv > 0 && preg_match_all('/byte |short |int |long |float |double |char |String |boolean /', $val, $counter)) {

                                                                                                $primitive_datatype_variable_count_total = 1;

                                                                                            }

                                                                                //        }

                                                                                    }

                                                                                }

                                                                            }

                                                                            //Matching composite variables
                                                                     //       for ($x = 0; $x <= $row_count; $x++) {


                                                                                if ($Wvs > 0 && $Npdtv < 1) {

                                                                                    $composite_datatype_variable_count_total = 1;

                                                                                } else {

                                                                                    $composite_datatype_variable_count_total = 0;

                                                                                }

                                                                                if ($Wvs > 0 && $Npdtv < 1 && preg_match_all('/\w+ \w+ \w+\, \w+\;/', $val, $counter)) {

                                                                                    $composite_datatype_variable_count_total = 2;

                                                                                }

                                                                   //         }




                                                                            $Wvs = ($global_variable_count_total * $weight_global_variable) + ($local_variable_count_total * $weight_local_variable);

                                                                            $Npdtv = $primitive_datatype_variable_count_total;

                                                                            $Ncdtv = $composite_datatype_variable_count_total;

                                                                        }


                                                                        if ($Wvs == 0){

                                                                            $Wvs = null;
                                                                            $Npdtv = null;
                                                                            $Ncdtv = null;


                                                                        }

                                                                        $beforeCv = ($weight_primitive_datatype_variable * $Npdtv) + ($weight_composite_datatype_variable * $Ncdtv);

                                                                        $Cv = $Wvs * $beforeCv;

                                                                        $total_Cv += $Cv;

                                                                        ?>

                                                                        <tr>
                                                                            <td><?php echo $count = $count + 1; ?></td>
                                                                            <td style="text-align: left"><?php echo $val; ?></td>
                                                                            <td <?php if ($Wvs > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Wvs; ?></td>
                                                                            <td <?php if ($Npdtv > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Npdtv; ?></td>
                                                                            <td <?php if ($Ncdtv > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Ncdtv; ?></td>
                                                                            <td <?php if ($Cv > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Cv; ?></td>
                                                                            <?php

                                                                            $i++;



                                                                            }

                                                                            }
                                                                            }
                                                                            $_SESSION['total_cv'] = $total_Cv;

                                                                            $query_disp_total = "INSERT INTO cv(CvValue) VALUES('$total_Cv')";
                                                                            mysqli_query($con, $query_disp_total);

                                                                            ?>
                                                                        </tr>


                                                                        </tbody>

                                                                    </table>

                                                                    <!--end: Datatable -->
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <!-- end:: Content -->
                                                    </div>
                                                </div>


                                            </div>

                                           
                                        </div>


                                    </div>
                                    <!--end::Portlet-->


                                </div>


                                <!--End::Row-->
                            </div>
                            <!--End::Dashboard 3-->
                        </div>
                        <!-- end:: Content -->
                        </div>
                        <?php

                    }

                }
            }

        }
    }
    closedir($handle);
}



?>

<?php include 'include/footer.php'; ?>