<?php
	session_start();//to use session variables
	require './application/controllers/LOController.php';
	$los = unserialize($_SESSION['los']);
	$index = $counter;
	$lo = $los[$index];
	$filepath = $lo->getFilepath();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>LOOP | Download</title>

<?php $this->layout->header() ?>


</head>
<body>	
	<!-- <div id="wrapper"> -->
	<div class="wrapper">
    	<?php $this->layout->modal_footer() ?>
		
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

		<div id="breadcrumb-wrap">
			<!-- <div class="container"> -->
				<ol class="breadcrumb">
					<li><a class="breadcrumb-link" href="<?php echo base_url()?>redirect/LO_rev">Back to Learning Object List</a></li>
					<li class="active">Download</li>
				</ol>
			<!-- </div> -->
		</div> 

		<div class="clearfix"></div>


		<!-- Gi sugdan -->

		<!-- <div id="content-wrap"> -->
		<div id="content-download">
			<div class="container">
				<!-- <div class="col-md-8 col-md-push-2"> -->
				<div class="col-md-6 col-md-push-3">
                    <div class="page-header download">
                    	<?php 
                    	if($lo->getStatus() == 0)
                        	echo '<h2 class="download">Download</h2>';
                        else
                        	echo '<h2 class="download">Review</h2>';
                        ?>
                    </div>

                    <!-- <legend class="col-md-12 col-md-push-3">Download</legend> -->

                    <form class="form-horizontal bootstrap-validator-form" method="post" id="defaultForm" novalidate="novalidate">
                        <div class="well">		
	                        <div class="form-group">
	                            <label class="col-md-3 control-label download">Filename :</label>
	                            <div class="col-md-8">
	                                <!-- <input type="text" name="username" class="form-control"> -->
	                                <!-- <p class="download-details"><//?php echo $lo->getName(); ?></p> -->
	                                <p class="download-details"><?php echo $lo->getName(); ?></p>
	                            </div>
	                        <small class="help-block col-md-push-3 col-md-9" style="display: none;"></small></div>

	                        <div class="form-group">
	                            <label class="col-md-3 control-label download">Subject :</label>
	                            <div class="col-md-8">
	                                <!-- <input type="text" name="email" class="form-control"> -->
	                                <p class="download-details"><?php echo $lo->getSubject(); ?></p>
	                            </div>
	                        <small class="help-block col-md-push-3 col-md-9" style="display: none;"></small></div>

	                        <div class="form-group">
	                            <label class="col-md-3 control-label download">Date Uploaded :</label>
	                            <div class="col-md-8">
	                                <!-- <input type="password" name="password" class="form-control"> -->
	                                <p class="download-details"><?php echo $lo->getDateUploaded(); ?></p>
	                            </div>
	                        <small class="help-block col-md-push-3 col-md-9" style="display: none;"></small></div>

	                        <div class="form-group">
	                            <label class="col-md-3 control-label download">Description :</label>
	                            <div class="col-md-8">
	                                <!-- <input type="password" name="confirmPassword" class="form-control"> -->
	                                <p class="download-details"><?php echo $lo->getDescription(); ?></p>
	                            </div>
	                        <small class="help-block col-md-push-3 col-md-9" style="display: none;"></small></div>
	                    </div>	

	                        <div class="form-actions advanced-search">
									<!-- <button type="submit" class="btn btn-primary"><i class="icon-upload-alt icon-large"></i> Upload</button> -->
									<?php
									echo '<input type="hidden" value="'.$lo->getID().'" id="id" name="id">';
									if($lo->getStatus() == 0)
									 echo '<a href="'.base_url().'redirect/downloadNow/'.$counter.'/'.$filepath.'" class="btn btn-primary"><i class="icon-download-alt icon-large"></i> Download</a>';
									if($lo->getStatus() == 2 && $lo->getRev() == $username)
							 		echo '<a href="'.base_url().'redirect/review_rev/'.$counter.'/'.$filepath.'" class="btn btn-primary"><i class="icon-edit icon-large"></i> Review</a>';
							?>
									<!-- <a href="index.php" class="btn btn-default">Cancel</a> -->
									<!-- <button type="reset" class="btn btn-default">Back</button> -->
									
									<a class="btn btn-default" href="<?php echo base_url() ?>index.php">Back</a>
									<!-- <button onclick="document.location='http://localhost/loop-sp-ci7/redirect/LO_rev'" type="button" class="btn btn-default">Back</button> -->


									<!-- <button onclick="document.location='http://localhost/jiary/index.php/journal/create_entry'" class="btn btn-success btn-lg btn-block main" type="button">Create</button>
									<button type="button" class="btn btn-info btn-lg btn-block main" onclick="document.location='http://localhost/jiary/index.php/journal/jiary_view'">Jiary View</button> -->
							</div>
									
                    </form>
                </div>
				<div class="clearfix"></div>				
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
	            <div class="copyright-here pull-left download">
					Copyright &copy; <?php echo date("Y"); ?> LOOP | Learning Object Organizer Plus. All rights reserved.<!-- <button id="aime" class="btn btn-default">Test</button> -->
		    	</div>
		    <!-- </div> -->
	    </footer>
    </div>

	<!-- Load JS here for greater good =============================-->

	<!--?php $this->layout->footer_subpages() ?-->

	<?php $this->layout->footer() ?>

	

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

	<script type="text/javascript">
		$(document).ready(function() {
		    $('#defaultForm').bootstrapValidator({
		        message: 'This value is not valid',
		        submitHandler: function(validator, form) {
	                // validator is the BootstrapValidator instance
	                // form is the jQuery object present the current form
	                // form.find('.alert').html('Thanks for signing up. Now you can sign in as ' + validator.getFieldElement('username').val()).show();
	                form.find('.alert').html('Password Changed.').show();
	                //form.submit();
	            },
		        fields: {
		            username: {
		                message: 'The username is not valid',
		                validators: {
		                    notEmpty: {
		                        message: 'The username is required and can\'t be empty'
		                    },
		                    stringLength: {
		                        min: 6,
		                        max: 30,
		                        message: 'The username must be more than 6 and less than 30 characters long'
		                    },
		                    regexp: {
		                        regexp: /^[a-zA-Z0-9_\.]+$/,
		                        message: 'The username can only consist of alphabetical, number, dot and underscore'
		                    }
		                }
		            },
		            email: {
		                validators: {
		                    notEmpty: {
		                        message: 'The email address is required and can\'t be empty'
		                    },
		                    emailAddress: {
		                        message: 'The input is not a valid email address'
		                    }
		                }
		            },
		            // password: {
		            //     validators: {
		            //         notEmpty: {
		            //             message: 'The password is required and can\'t be empty'
		            //         },
		            //         identical: {
		            //             field: 'password',
		            //             message: 'The password and its confirm are not the same'
		            //         }
		            //     }
		            // },

		            newPassword: {
		                validators: {
		                    notEmpty: {
		                        message: 'The password is required and can\'t be empty'
		                    },
		                    identical: {
		                        field: 'confirmNewPassword',
		                        message: 'The password and its confirm are not the same'
		                    }
		                }
		            },

		            confirmNewPassword: {
		                validators: {
		                    notEmpty: {
		                        message: 'The confirm password is required and can\'t be empty'
		                    },
		                    identical: {
		                        field: 'newPassword',
		                        message: 'The password and its confirm are not the same'
		                    }
		                }
		            }
		        }
		    });
		});
	</script>

</body>
</html>
