<!DOCTYPE html>
<html lang="en">
<head>
<title>LOOP | Upload</title>

<?php $this->layout->header() ?>

</head>
<body>	
	<!-- <div id="wrapper"> -->
	<div class="wrapper">
    	<?php $this->layout->modal_footer(isset($status)?$status:FALSE) ?>
		
		<div id="header-wrap">
			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
				<!-- <div class="container"> -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
	                    
	                    <a class="navbar-brand" href="<?php echo base_url() ?>index.php">
							<img src="<?php echo base_url() ?>img/loop-logo.svg" width="116px" height="28px" alt="LOOP Logo"/>
						</a>
	                </div>
					
					<div class="navbar-collapse collapse">

						<?php $this->layout->user_menu() ?>
					
					</div>
				<!-- </div> -->
			</nav>
		</div>

		<div class="clearfix"></div>


    	<ul class="nav nav-tabs main-views">
		 <li><a href="<?php echo base_url()?>redirect/LO"><i class="icomoon-list"></i> Learning Objects</a></li>
		 <li class=" tour-step tour-step-two"><a class="active-tab"  href="<?php echo base_url()?>redirect/LE"><i class="icomoon-list"></i> Learning Elements</a></li>
		 <li class="active tour-step tour-step-seven"><a class="active-tab" href="<?php echo base_url()?>redirect/uploadLO"><i class="icon-upload-alt icon-large default"></i> Upload LO</a></li>
		 <li><a href="<?php echo base_url()?>redirect/uploadLE"><i class="icon-upload-alt icon-large default"></i> Upload LE</a></li>
		 <li class="tour-step tour-step-thirteen"><a href="<?php echo base_url()?>redirect/search"><i class="icon-search icon-large search-tab"></i> Advanced Search</a></li>
		</ul>

		<div class="clearfix"></div>


		<!-- Gi sugdan -->

		<div id="content-wrap">
			<div class="container">
				<div class="col-md-6 col-md-push-3">
                    <div class="page-header download">
                    	<?php
                    		if(!isset($lobject)){
                    			echo '<h2 class="download">Upload Learning Object</h2>';
                    		}
                    		else{
								echo '<h2 class="download">Upload Learning Object: Revision</h2>';
                    		}
                    	?>
                        
                    </div>

					<!-- <form action="uploading.php" method="post" enctype="multipart/form-data" name="upload" class="form-horizontal">-->
                    <!-- <form class="form-horizontal bootstrap-validator-form" action="<?php //echo base_url()?>index.php/uploading/do_upload" method="post" id="defaultForm" novalidate="novalidate"> -->
						
						<?php echo form_open_multipart('uploading/do_upload','id="myform"');?>
						

						<!-- <div class="col-md-6 col-md-push-3"> -->
							
							<div class="control-group">
				            
				            <label class="control-label upload-file fileinput pull-left" for="fileInput">File Path :</label>
				            <div class="controls">
				            	<input type="file" name="userfile" size="20" class="input-file tour-step tour-step-eight" required/>
				            	<!-- <input name="userfile" type="file" class="input-file" required/> -->
				            </div>
				            
				            <div class="upload-requirement">*Only .zip file types under 500 Mb are accepted for upload.<br/>
				            *Please avoid using white spaces for avoidance of information mismatch. </div>
				        </div>
				       <!-- </div> -->




						<div class="well upload tour-step tour-step-nine">		
								<label class="col-md-3 control-label upload-file" for="input01">Name:</label>					
								<!-- <label class="control-label pull-left" for="input01"> -->
									<!-- Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
									<!-- Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
								</label>
								<?php
								if(!isset($lobject)){
									echo '<input type="text" class="form-control col-md-7" id="input01" name="filenames" placeholder="e.g. HTML5, Linear Equations"/>';
								}
								else{
									echo '<input type="text" class="form-control col-md-7" id="input01" name="filenames" value="'.$lobject.'" readonly/>';
								}

								?>
								<div class="clearfix"></div>
							</div>


							<div class="well upload tour-step tour-step-ten">
							<label class="col-md-3 control-label upload-file" for="input01">Subject:</label>							
								<!-- <label class="control-label pull-left" for="input01"> -->
									<!-- Subject : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
									<!-- Subject : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
								</label>
								<?php
									if(!isset($lsubj)){
										echo '<input type="text" class="form-control col-md-7" id="input01" name="subject" placeholder="e.g. Web Programming, Algebra" required/>';
									}
									else{
										echo '<input type="text" class="form-control col-md-7" id="input01" name="subject" value="'.$lsubj.'" readonly/>';
									}
								?>
								
								
								<div class="clearfix"></div>
							</div>

							<!--<div class="well upload tour-step tour-step-eleven">
								<label class="col-md-3 control-label upload-file" for="input01">Type:</label>							
								<!-- <label class="control-label pull-left" for="input01"> -->
									<!-- Description : &nbsp; -->
									<!-- Description : 
								</label>

								<select name="uploadType" class="btn btn-default" required/>
									<option value = "LO">Learning Object</option>
									<option value = "LE">Learning Element</option>
								</select>								
								
								<div class="clearfix"></div>
							</div>-->

							<div class="well upload tour-step tour-step-eleven">
								<label class="col-md-3 control-label upload-file" for="input01">Description:</label>							
								<!-- <label class="control-label pull-left" for="input01"> -->
									<!-- Description : &nbsp; -->
									<!-- Description : -->
								</label>
								<input type = "hidden" name = "uploadType" value = "LO">
								<input type="text" class="form-control col-md-7" id="input01" name="desc" placeholder="Write a description..." required/>								
								
								<div class="clearfix"></div>
							</div>





                       

	                        <div class="form-actions advanced-search">
									<!-- <button type="submit" class="btn btn-primary"><i class="icon-upload-alt icon-large"></i> Upload</button> -->
									

									<button type="submit" class="btn btn-primary tour-step tour-step-twelve"><i class="icon-upload-alt icon-large"></i> Upload</button>
								

									<!-- <a href="index.php" class="btn btn-default">Cancel</a> -->
									<!-- <button type="reset" class="btn btn-default">Cancel</button> -->

									<!-- <button onclick="document.location='http://localhost/loop-sp-ci7/redirect/LO'" type="button" class="btn btn-default">Cancel</button> -->
									<a class="btn btn-default" href="<?php echo base_url() ?>index.php">Cancel</a>

									<!-- <button onclick="document.location='http://localhost/jiary/index.php/journal/create_entry'" class="btn btn-success btn-lg btn-block main" type="button">Create</button>
									<button type="button" class="btn btn-info btn-lg btn-block main" onclick="document.location='http://localhost/jiary/index.php/journal/jiary_view'">Jiary View</button> -->
							</div>
									
                    </form>
                </div>
			</div>
		</div> 





		
		


  		<div class="clearfix"></div>

		<!-- This is the original footer with id=wrapper -->
		<!-- <footer id="footer-wrap-index"> -->
			<!-- <div class="container">
		    	<div class="copyright-here pull-left">
					Copyright &copy; <?php //echo date("Y"); ?> LOOP | Learning Object Organizer Plus. All rights reserved.<button id="aime" class="btn btn-default">Test</button>
		    	</div>
	  		</div>
    	</footer> -->
		
		<!-- Take this out if you want the original footer back -->
        <div class="push"></div>
	</div>

	<div class="footer">
		<footer id="footer-wrap-index">
			<!-- <div class="container"> -->
	            <div class="copyright-here pull-left upload">
					Copyright &copy; <?php echo date("Y"); ?> LOOP | Learning Object Organizer Plus. All rights reserved.<!-- <button id="aime" class="btn btn-default">Test</button> -->
		    	</div>
		    <!-- </div> -->
	    </footer>
    </div>

	<!-- Load JS here for greater good =============================-->

	<?php $this->layout->footer_subpages() ?>

	<script> 
		$(document).ready(function(){
			var length_sel;

            $('.datatable').dataTable({ 
                "sPaginationType": "bs_normal"
            });

            $('.datatable').each(function(){
                $(this).show();
                datatable_configuration_for_bootstrap_three($(this));
            });

            // datatable configuration for bootstrap 3
            function datatable_configuration_for_bootstrap_three(datatable){
            	datatable.addClass('col-md-12');
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.addClass('form-control input-sm');
                search_input.width('140px'); //used to be 150
                length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.addClass('form-control input-sm').css({ padding: '5px 10px 5px 5px', cursor: 'pointer' });
                $('option', length_sel).css({ padding: '5px 8px' });
                var pagination = datatable.closest('.dataTables_wrapper').find('ul.pagination');
                pagination.addClass('pagination-sm');
            }
		});
	</script>

	<script>
		$('input[type="file"]').inputfile({
		uploadText: '<i class="icon-folder-open"></i> Choose file',
		removeText: '<span class="glyphicon glyphicon-trash"></span>',
		restoreText: '<span class="glyphicon glyphicon-remove"></span>',
		 
		uploadButtonClass: 'btn btn-primary',
		removeButtonClass: 'btn btn-default'
		});
	</script>

	<script type="text/javascript">

		$(document).ready(function(){

  jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");


$("#myform").validate({
   rules: {
      filenames: {
          noSpace: true
      }
   }
    });



	</script>

</body>
</html>
