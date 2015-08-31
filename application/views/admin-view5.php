<?php
	session_start();
	$counter=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>LOOP | Admin - Learning Objects</title>

<?php $this->layout->header_subpages() ?>
<?php
	echo '<script type="text/javascript">
			function select(i)
			{
				document.getElementById("counters").value = i;
				document.getElementById("ctr").value = i;
			}
		</script>';

?>

</head>
<body>	
	<!-- <div id="wrapper"> -->
	<div class="wrapper">
    	<?php $this->layout->modal_footer() ?>
		
		<div id="header-wrap">
			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
				<div class="container">
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

						<?php $this->layout->usermenu_admin() ?>
					
					</div>
				</div>
			</nav>
		</div>





		<div class="clearfix"></div>

		<!-- <div id="banner-wrap-main-view">
			<div class="container main-view">
				<div class="well col-md-6 col-md-offset-3 main">
					<button type="button" class="btn btn-success btn-lg btn-block main" onclick="document.location='http://localhost/jiary/index.php/journal/create_entry'">Create</button>
					<button type="button" class="btn btn-primary btn-lg btn-block main" onclick="document.location='http://localhost/jiary/index.php/journal'">List View</button>
					<button type="button" class="btn btn-info btn-lg btn-block main" onclick="document.location='http://localhost/jiary/index.php/journal/jiary_view'">Jiary View</button>
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div> -->

		<!-- <div id="breadcrumb-wrap">
			<div class="container">
				<ol class="breadcrumb">
					<li><a class="breadcrumb-link" href="<?php //echo base_url() ?>index.php/home">Back to Main View</a></li>
					<li class="active">Create</li>
				</ol>
			</div>
		</div> -->

		<!-- <div id="actions-wrap">
			<div class="container">
				Hello There! Transfer tabs here. Make this awesome. Much Like the admin page.

				<ul class="nav nav-tabs admin">
				    <li class="active"><a href="admin-view.php">Developer</a></li>
				    <li><a href="admin-view2.php">Reviewer</a></li>
				    <li><a href="admin-view3.php">Inactive Accounts</a></li>
				    <li><a href="admin-view4.php">Blocked Accounts</a></li>
				    <li><a href="admin-view5.php">Learning Objects</a></li>
		    	</ul>


			</div>
		</div> -->


		<!-- This is really great -->
		<!-- <ul class="nav nav-tabs admin">
		    <li class="active"><a class="tab" href="#">Developer</a></li>
		    <li><a class="tab" href="#">Reviewer</a></li>
		    <li><a class="tab" href="#">Inactive Accounts</a></li>
		    <li><a class="tab" href="#">Blocked Accounts</a></li>
		    <li><a class="tab" href="#">Learning Objects</a></li>
    	</ul> -->






        




    	<ul class="nav nav-tabs main-views">
    		<li><a href="<?php echo base_url()?>redirect/admin_view"><i class="icon-plus-sign-alt icon-large default"></i> New Account Requests</a></li>
			<li><a href="<?php echo base_url()?>redirect/admin_view1"><i class="icon-folder-open icon-large default"></i> Developers</a></li>
		    <li><a href="<?php echo base_url()?>redirect/admin_view2"><i class="icon-edit icon-large default"></i> Reviewers</a></li>
		    <li><a href="<?php echo base_url()?>redirect/admin_view3"><i class="icon-time icon-large default"></i> Inactive Accounts</a></li>
		    <li><a href="<?php echo base_url()?>redirect/admin_view4"><i class="icon-ban-circle icon-large default"></i> Blocked Accounts</a></li>
		    
			<!-- <li class="active"><a href="<?php //echo base_url()?>redirect/admin_view5"><i class="icon-list icon-large default"></i> Learning Objects</a></li> -->
			<li class="active"><a class="active-tab" href="<?php echo base_url()?>redirect/admin_view5"><i class="icomoon-list"></i> Learning Objects</a></li>

			<li><a href="<?php echo base_url()?>redirect/admin_view6"><i class="icomoon-list"></i> Learning Elements</a></li>
		</ul>

		<div class="clearfix"></div>

  		<div id="content-wrap-rev">
			<div class="container">
				<div class="row">
					<div class="col-md-12 content">
						
						<div class="table-responsive">
							<!-- <table class="datatable table table-bordered"> -->
							<table class="datatable table table-hover">
							    <thead>
									<tr>
										<th class="color-code"><!-- <img src="<?php //echo base_url() ?>img/icon-colorcode.png" alt="color code" /> --></th>
										<th>Name</th>
										<th>Subject</th>
										<!-- <th>Date Uploaded</th> -->
										<th>Uploaded</th>
										<th>Rating</th>
										<th>Comments</th>
										<th>Status</th>
										<th>Reviewer</th>
										<th>Author</th>
									</tr>
								</thead>
						        <tbody>
						        <?php  

					        		require './application/controllers/LOController.php';
					        		$controller = new LOController;
						if(isset($_POST['searchName'])){
							$subject = null;
							$dateFrom = null;
							$dateTo = null;
							$order = null;
							//find by subject
							if(isset($_POST['subject']) && isset($_POST['subjectCheck'])){
								$subject = $_POST['subject'];
							}
							//find by date
							if(isset($_POST['dateFrom']) && isset($_POST['dateTo']) && isset($_POST['dateCheck'])){
								$dateFrom = $_POST['dateFrom'];
								$dateTo = $_POST['dateTo'];
							}
							//order by
							if(isset($_POST['order']) && isset($_POST['orderCheck'])){
								$order = $_POST['order'];
							}
							$LOs = $controller->searchLO($_POST['searchName'],$subject,$dateFrom,$dateTo,$order);
							//$_POST['searchName'] = null;
						}
						else{//new condition for advanced search
							$LOs = @$controller->getAllLO();
						}
						$_SESSION['los'] = serialize($LOs);
						$LO = current($LOs);
						if($LO != null && isset($_POST['searchName'])){
								echo '<tr style="font-size:80%;"><td><i class="icon-search"></i></td><td colspan="5">Search Results for "'.$_POST['searchName'].'"....<a href="'. base_url().'"redirect/LO>CLICK HERE</a> to reload all Learning Objects</td>';
								 	echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '</tr>';
								}
						while($LO != null)
						{
							echo '<form name="form'.$counter.'" action="<?php echo base_url()?>/redirect/history" method="POST">';
							echo '<tr>';
							if($LO->getRating()==1)
								echo '<td><img src="'.base_url().'img/icon-red.png" alt="For Review" /></td>';
							else if($LO->getRating()==2)
								echo '<td><img src="'.base_url().'img/icon-orange.png" alt="For Review" /></td>';
							else if($LO->getRating()==3)
								echo '<td><img src="'.base_url().'img/icon-yellow.png" alt="For Review" /></td>';
							else if($LO->getRating()==4)
								echo '<td><img src="'.base_url().'img/icon-yellowgreen.png" alt="For Review" /></td>';
							else if($LO->getRating() == 5)
								echo '<td><img src="'.base_url().'img/icon-green.png" alt="Ready To Use" /></td>';
							// echo '<td><a href="#responsive_fileActionReviewer" data-toggle="modal" >'.$LO->getName().'</a></td>';
							
							echo '<td><a onclick="select('.$counter.')" href="'.base_url().'redirect/history/LO/'.$counter.'" data-toggle="modal" >'.$LO->getName().'</a></td>';
							echo '<td>'.$LO->getSubject().'</td>';
							echo '<td>'.$LO->getDateUploaded().'</td>';
							echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$LO->getRating().'</td>';
							echo '<td>'.$LO->getComments().'</td>';
							echo '<input type="hidden" name="downloadLO" value="'.$counter.'"/>';
							if($LO->getStatus() == 0)
								echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;<i rel="tooltip" title="Not Yet Reviewed" id="unreviewed" class="icon-check-empty icon-large"></i></td>';
							else if($LO->getStatus() == 2)
								echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;<i rel="tooltip" title="Being Reviewed" id="being-reviewed" class="icon-edit icon-large"></i></td>';
							else if($LO->getStatus() == 1)
								echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;<i rel="tooltip" title="Reviewed" id="reviewed" class="icon-check icon-large"></i></td>';
							echo '<td>'.$LO->getRev().'</td>';
							echo '<td>'.$LO->getUploadedBy().'</td>';
							echo '</tr>';
							echo '</form>';
							next($LOs);
							$LO = current($LOs);
							$counter++;
						}
						if($counter == 0){
							echo '<tr>';
									echo '<td colspan=9><h2 style="color: #000; font-weight:bold;">No Learning Objects found.</h2><br>
														No Learning Objects found.Please <a href="'. base_url().'"redirect/upload class="btn btn-success">CLICK HERE</a> to refresh the list.</td>';			
									echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '<td style="display: none">'.'</td>';
									echo '</tr>';
						}
						        ?>
									
														
								</tbody>
							  </table>
						</div>

					</div>
				</div>
				
				<div class="clearfix" id="before-features" ></div>
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
			<div class="container">
	            <div class="copyright-here pull-left">
					Copyright &copy; <?php echo date("Y"); ?> LOOP | Learning Object Organizer Plus. All rights reserved.<!-- <button id="aime" class="btn btn-default">Test</button> -->
		    	</div>
		    </div>
	    </footer>
    </div>

	<!-- Load JS here for greater good =============================-->

	<?php $this->layout->footer() ?>

	<script> 
		$(document).ready(function(){
			var length_sel;
			// // alert($(document).height());
			// if($(document).height() > 799){
			// 	$('footer').removeClass('navbar-fixed-bottom').addClass('navbar-static-bottom');
			// }


			//Sticky Footer Help
			
			// var optionVal = $('tbody > tr:last-child()').index();

			// 	$('.dataTables_filter label input').click(function(){
			// 		if(optionVal >= 8){
			// 			$('footer').removeClass('navbar-fixed-bottom').addClass('navbar-static-bottom');
			// 		}
			// 		else{
			// 			$('footer').addClass('navbar-fixed-bottom').removeClass('navbar-static-bottom');
			// 		}
			// 	});
			



			// if( optionVal == '10'){
			// }
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

                $('<i class="icomoon-search pull-left searchbar-icon"></i>').prependTo($('div:eq(0) > div > div:eq(0)',datatable.parents('.dataTables_wrapper')));
                $('div:eq(0) > div > div:eq(0) > div',datatable.parents('.dataTables_wrapper')).addClass('pull-right');
                
                search_input.addClass('form-control input-sm');
                search_input.width('140px'); //used to be 150
                length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.addClass('form-control input-sm').css({ padding: '5px 10px 5px 5px', cursor: 'pointer' });
                $('option', length_sel).css({ padding: '5px 8px' });
                var pagination = datatable.closest('.dataTables_wrapper').find('ul.pagination');
                pagination.addClass('pagination-sm');
            }
		});


		// $(document).ready( function () {
		// 	var oTable = $('#DataTables_Table_0').dataTable();
		// 	new FixedHeader( oTable );
		// });

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
