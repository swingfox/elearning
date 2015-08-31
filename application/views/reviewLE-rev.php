<?php
	session_start();//to use session variables
	require './application/controllers/LEController.php';
	$los = unserialize($_SESSION['obj']);
	$index = $id;
	$lo = $los[$index];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>LOOP | Review</title>

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

		<!-- <ul class="nav nav-tabs main-views">
			<li class="active"><a class="active-tab" href="<?php echo base_url()?>redirect/LO_rev"><i class="icomoon-list"></i> Learning Objects</a></li>
			<li><a href="<?php echo base_url()?>redirect/reviewlist_rev"><i class="icomoon-signup"></i> Review List</a></li>
			<li ><a  href="<?php echo base_url()?>redirect/search_rev"><i class="icomoon-search"></i> Advanced Search</a></li>
		</ul> -->

		<div id="breadcrumb-wrap">
			<!-- <div class="container"> -->
				<ol class="breadcrumb">
					<li><a class="breadcrumb-link" href="<?php echo base_url()?>redirect/review_list">Back to Review List</a></li>
					<li class="active">Review Learning Element</li>
				</ol>
			<!-- </div> -->
		</div> 

		<div class="clearfix"></div>


		<!-- Gi sugdan -->

		<!-- <div id="content-wrap"> -->
		<div id="content-review-rev">
			<div class="container">

				<div class="alert alert-success">
					<!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
					<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>

					<strong>Success!</strong>
					<!-- You have successfully downloaded this Learning Object.
					Please rate this Learning Object after you have reviewed it.  -->

					You have successfully downloaded the Learning Element: "<?php
			 		echo $lo->getName();
			 		?>" 
					Please rate this Learning Element. 
					
					
					
				</div>

				
				<form method="post" action="<?php echo base_url()?>redirect/reviewNow" role="form">
					<div class="col-md-6 col-md-push-3">
	                    <div class="page-header download">
	                        <h2 class="download">Review</h2>
	                    </div>

	                    <label class="rate-this">Rate this Learning Object :</label>

	                    <div class="form-group">
							<div class="well">
								<label class="radio review-rev">
						            <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" data-toggle="radio" checked>
						            1<i class="icon-long-arrow-right"></i> It is Newly Uploaded and For Review. <span class="label label-danger custom">Red</span>
					          	</label>

					          	<label class="radio review-rev">
						            <input type="radio" name="optionsRadios" id="optionsRadios2" value="2" data-toggle="radio">
						            2<i class="icon-long-arrow-right"></i> It has been Reviewed but needs a lot of Revisions. <span class="label label-danger custom2">Orange</span>
					          	</label>

					          	<label class="radio review-rev">
						            <input type="radio" name="optionsRadios" id="optionsRadios3" value="3" data-toggle="radio">
						            3<i class="icon-long-arrow-right"></i> It has been Reviewed but needs more Revisions. <span class="label label-warning custom">Yellow</span>
					          	</label>

					          	<label class="radio review-rev">
						            <input type="radio" name="optionsRadios" id="optionsRadios4" value="4" data-toggle="radio">
						            4<i class="icon-long-arrow-right"></i> It has been Reviewed but still needs Admin's Approval. <span class="label label-warning custom2">Yellow Green</span>
					          	</label>

					          	<label class="radio">
						            <input type="radio" name="optionsRadios" id="optionsRadios5" value="5" data-toggle="radio">
						            5<i class="icon-long-arrow-right"></i> It is Ready to Use. (Only the Admin can decide this).<span class="label label-success custom disabled">Green</span>
					          	</label>
							</div>
						</div>

						<div class="form-group comments">  
				            <label class="control-label description" for="textarea">Comment :</label>  
				            <div class="controls"> 				           
				            	<textarea name="comments" class="form-control" placeholder="Write a Comment..." id="textarea" rows="3" required></textarea>
				            </div>  
				        </div>  

				        <div class="clearfix"></div>

				        <div class="form-actions advanced-search">
							<input type="hidden" value="<?php echo $lo->getID(); ?>" id="id" name="id">
							<input type="hidden" value="LE" id ="type" name="type">
							<button type="submit" class="btn btn-primary"><i class="icon-ok icon-large"></i> Submit</button>

							<a class="btn btn-default" href="<?php echo base_url() ?>index.php">Cancel</a>
							<!-- <button onclick="document.location='http://localhost/loop-sp-ci7/redirect/LO_rev'" type="button" class="btn btn-default">Cancel</button> -->
						</div>
	                </div>
	            </form>

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
	            <div class="copyright-here pull-left review">
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
