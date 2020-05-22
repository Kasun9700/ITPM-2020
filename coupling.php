<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=coupling.php?reload=1">';
}

?>

<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<?php $split = $_SESSION['split_code']; ?>


<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Content Head -->
						<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
                                    <h3 class="kt-subheader__title">Coupling Complexity of the Program</h3>
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
                    Complexity of the Program due to Coupling
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body kt-font-brand">


            <div class="row">

                <div class="col-lg-12">
          
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                            
                                    < xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                            <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                        </g>
                                    </svg> </div>
                                <div class="col-lg-12">
                                <div class="kt-iconbox__desc kt-font-brand">

                                    <center><h1 style="font-family: 'Fira Code'">Ccp : <?php echo $total_ccs = $_SESSION['total_ccp']; ?></h1></center>


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
                Complexity of the Program due to Coupling by Statement : </h3>&nbsp;
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
                                <table style="font-family: 'Fira Code'; text-align: center" class="table table-striped- table-bordered table-hover" id="kt_table_1">
                                    <thead>
                                    <tr class="kt-label-bg-color-1" style="font-family: 'Fira Code Medium'">
                                        <th>Line No</th>
                                        <th>Program Statements</th>
                                        <th>Nr</th>
                                        <th>Nmcms</th>
                                        <th>Nmcrms</th>
                                        <th>Nrmcrms</th>
                                        <th>Nrmcms</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $lastRow = "SELECT * FROM  coupling ORDER BY CouplingID DESC LIMIT 1";
                                    $run_query_last = mysqli_query($con,$lastRow);

                                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                                    $CouplingID_last = $lastrow['CouplingID'];
                                    $RecursiveCall_last = $lastrow['RecursiveCall'];
                                    $Reg_Reg_Same_last = $lastrow['Column2'];
                                    $Reg_Reg_Diff_last = $lastrow['Column3'];
                                    $Reg_Rec_Same_last = $lastrow['Column4'];
                                    $Reg_Rec_Diff_last = $lastrow['Column5'];
                                    $Rec_Rec_Same_last = $lastrow['Column6'];
                                    $Rec_Rec_Diff_last = $lastrow['Column7'];
                                    $Rec_Reg_Same_last = $lastrow['Column8'];
                                    $Rec_Reg_Diff_last = $lastrow['Column9'];
                                    $Reg_Global_Same_last = $lastrow['Column10'];
                                    $Reg_Global_Diff_last = $lastrow['Column11'];
                                    $Rec_Global_Same_last = $lastrow['Column12'];
                                    $Rec_Global_Diff_last = $lastrow['Column13'];

                                    $lines = array();
                                    $regularMethods = array();
                                    $recursiveMethods = array();
                                    $methods = array();
                                    $global_var = array();

                                    $nr = 0;
                                    $nmcms = 0;
                                    $nmcrms = 0;
                                    $nrmcrms = 0;
                                    $nrmcms = 0;
                                    $nmrgvs = 0;
                                    $nrmrgvs = 0;

                                    $keyword = array('public','protected', 'private', 'static');


                                   $handle = fopen("uploads/DaysPerMonth.java", "r");
                                    if ($handle) {
                                        while (($line = fgets($handle)) !== false) {
                                            // process the line read.
                                            array_push($lines, $line);
                                        }

                                        fclose($handle);
                                    } else {
                                        // error opening the file.
                                    }

                                    foreach ($lines as $line)  {
                                    # code...

                                    $nr_line = 0;
                                    $nmcms_line = 0;
                                    $nmcrms_line = 0;
                                    $nrmcrms_line = 0;
                                    $nrmcms_line = 0;
                                    $nmrgvs_line = 0;
                                    $nrmrgvs_line = 0;

                                    foreach ($methods as $method){

                                        if(strpos($line, $method)){

                                            if ($methods[0] == $method){

                                                array_push($recursiveMethods, $method);
                                                $currentMethodType = 'recursive';
                                                $nr = $nr+1;
                                                $nr_line = $nr_line +1;

                                            }elseif (in_array($method, $recursiveMethods) && $currentMethodType == 'regular') {
                                                # code...
                                                $nmcrms = $nmcrms +1;
                                                $nmcrms_line = $nmcrms_line+1;

                                            }elseif (in_array($method, $recursiveMethods) && $currentMethodType == 'recursive') {
                                                # code...
                                                $nrmcrms_line = $nrmcrms_line +1;
                                                $nrmcrms = $nrmcrms+1;

                                            }elseif ($currentMethodType == 'recursive') {
                                                # code...
                                                $nrmcms = $nrmcms +1;
                                                $nrmcms_line = $nrmcms_line+1;

                                            }elseif ($currentMethodType == 'recursive') {
                                                # code...
                                                $nmcms = $nmcms+1;
                                                $nmcms_line = $nmcms_line+1;

                                            }
                                        }
                                    }

                                    if (!empty($methods)) {
                                        # code...
                                        $space_split_array = explode(" ", $line);
                                        $character_split_array = preg_split('/[^[:alnum:]]/', $line);

                                        foreach($global_var as $var){

                                            if (in_array($var, $space_split_array) || in_array($var, $character_split_array)) {
                                                # code...
                                                if ($currentMethodType == 'regular') {
                                                    # code...
                                                    $nmrgvs = $nmrgvs +1;
                                                    $nmrgvs_line = $nmrgvs_line+1;

                                                }else {
                                                    # code...
                                                    $nmrgvs_line = $nmrgvs_line+1;
                                                    $nmrgvs = $nmrgvs+1;

                                                }
                                            }
                                        }


                                    }

                                    preg_match('/"[^"]*"|((?=_[a-z_0-9]|[a-z])[a-z_0-9]+(?=\s*=))/', $line, $var);

                                    if(isset($var[0]) && empty($methods)){

                                        array_push($global_var, $var[0]);

                                    }


                                    preg_match('/(public|protected|private|static|\s) +[\w\<\>\[\]]+\s+(\w+) *\([^\)]*\) *(\{?|[^;])/', $line, $match);

                                    if (isset($match[1])){
                                        if(in_array($match[1], $keyword)){

                                            $currentMethodType = 'regular';
                                            array_push($methods, $match[2]);
                                            $methods = array_reverse($methods);

                                        }

                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $count = $count + 1; ?></td>
                                        <td style="text-align: left"><?php echo($line) ?></td>
                                        <td><?php echo($nr_line) ?></td>
                                        <td><?php echo($nmcms_line) ?></td>
                                        <td><?php echo($nmcrms_line) ?></td>
                                        <td><?php echo($nrmcrms_line) ?></td>
                                        <td><?php echo($nrmcms_line) ?></td>

                                    </tr>

                                    </tbody>

                                    <?php

                                    }

                                    $ccp = $nr*2 + $nmcms*2 + $nmcrms*3 + $nrmcrms*4 + $nrmcms*3 + $nmrgvs*1 + $nrmrgvs*2;
                                    $_SESSION['total_ccp'] = $ccp;
                                    }
                                    ?>

                                </table>

                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>

                    <!-- end:: Content -->








                </div></div></div>

           
    </div>
        </div>
    <!--end::Portlet-->


</div>


</div>


                            <!--End::Row-->

							<!--End::Dashboard 3-->
						</div>
						<!-- end:: Content -->
					</div>


<?php include 'include/footer.php'; ?>