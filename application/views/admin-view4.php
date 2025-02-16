<!DOCTYPE html>
<html lang="en">
<head>
<title>LOOP | Admin - Blocked Accounts</title>

<?php $this->layout->header_subpages() ?>
<?php
session_start();
	echo '<script type="text/javascript">
			function selectIndex(v){
				document.getElementById("selectedIndex").value=v;
				//alert(document.getElementById("selectedIndex").getAttribute("value"));
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

		<!-- User Action -->
		<!-- <form method="post" id="unblockForm" name="unblockForm" action="unblockScript.php">
			<div id="responsive_fileActionAdmin3" class="modal hide fade" tabindex="-1" data-width="760">
			    <div class="modal-header light-theme">
				    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				    <span class="popup">User Action</span>
			    </div>
			    <div class="modal-body">
				    <div class="row-fluid">
					    <div class="span10 offset1">
						    <label class="file-action">What would you like to do with this Blocked account?</label>
					    </div>
				    </div>
			    </div>
			    <div class="modal-footer">
			    	<div class="row-fluid">
			    		<div class="span9 offset2">
							<button type="button" class="btn btn-primary" onclick="document.unblockForm.submit()"><i class="icon-check icon-large default"></i> Unblock Account</button>
						    <button type="button" data-dismiss="modal" class="btn"></i> Cancel</button>
							<input type="hidden" id="selectedIndex" name="index" value="0"/>
						</div>
					</div>
			    </div>
			</div>
		</form> -->


    	<!-- User Action Update-->
        <!-- <form method="post" action="'.base_url().'index.php/account/change_password"> -->
        <form method="post" action="<?php echo base_url()?>account/unblock" id="unblockForm" name="unblockForm">
            <div class="modal fade" id="responsive_fileActionAdmin4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header light-theme">	
                            <button type="button" class="close light-theme" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <span class="popup">User Action</span>
                        </div>
                        <div class="modal-body">  
                            <div class="row">
                                <div class="col-md-10 col-md-push-1">                                 
                                    <label class="file-action">What would you like to do with this Blocked account?</label>
                                </div> 
                            </div>
                        </div>
                        <div class="modal-footer"> 
                            <div class="row">
                                <div class="col-md-9 col-md-push-2">
                                	<button type="button" class="btn btn-primary" onclick="document.unblockForm.submit()"><i class="icon-check icon-large default"></i> Unblock Account</button>
								    <button type="button" data-dismiss="modal" class="btn btn-default"></i> Cancel</button>
									<input type="hidden" id="selectedIndex" name="index" value="0"/>      
									<input type="hidden" name="a" id="a" value="1" />

                                    <!-- <a href="#responsive_confirmUploadRev" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"><i class="icon-upload-alt icon-large default"></i> Upload Revision</a>
						    		<a href="#responsive_confirmDelete" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"><i class="icon-trash icon-large default"></i> Delete</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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
			<li><a class="active-tab" href="<?php echo base_url()?>redirect/admin_view1"><i class="icon-folder-open icon-large default"></i> Developers</a></li>
		    <li><a href="<?php echo base_url()?>redirect/admin_view2"><i class="icon-edit icon-large default"></i> Reviewers</a></li>
		    <li><a href="<?php echo base_url()?>redirect/admin_view3"><i class="icon-time icon-large default"></i> Inactive Accounts</a></li>
		    <li class="active"><a href="<?php echo base_url()?>redirect/admin_view4"><i class="icon-ban-circle icon-large default"></i> Blocked Accounts</a></li>
		    
			<!-- <li><a href="<?php //echo base_url()?>redirect/admin_view5"><i class="icon-list icon-large default"></i> Learning Objects</a></li> -->
			<li><a href="<?php echo base_url()?>redirect/admin_view5"><i class="icomoon-list"></i> Learning Objects</a></li>
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
										<th>Username</th>
										<th>Last Login</th>
										<th>Account Type</th>
										
									</tr>
								</thead>

						        <tbody>
						        <?php  

					        		require './application/controllers/AdminController.php';
					        		$controller = new AdminController;
						if(isset($_POST['searchUsers'])){
							if($_POST['searchUsers']=='')
								$siteUsers = @$controller->getAllBlockedUsers();
							else
								$siteUsers = @$controller->searchBlockedUsers($_POST['searchUsers']);
						}
						else{
							$siteUsers = @$controller->getAllBlockedUsers();
						}
						//$siteUsers = @$controller->getAllBlockedUsers();

						$_SESSION['blockedUsers'] = serialize($siteUsers);
						$counter = 0;
						$siteUser = current($siteUsers);
						if($siteUser != null && isset($_POST['searchUsers'])){
							echo '<tr style="font-size:80%;"><td colspan="4">Search Results for "'.$_POST['searchUsers'].'"....<a href="admin-view4.php">CLICK HERE</a> to reload all blocked accounts</td></tr>';
						}
						while($siteUser != null)
						{
							//echo '<form name="form'.$counter.'" action="admin-view.php" method="POST">';
							echo '<tr>';
							echo '<td><a href="#responsive_fileActionAdmin4" data-toggle="modal" onclick="selectIndex('.$counter.')">'.$siteUser->getUserName().'</td>';
							echo '<td>'.$siteUser->getLastLogin().'</td>';
							echo '<td>'.$siteUser->getUserType().'</td>';
							
							//echo '<input type="hidden" name="siteUserIndex" value="'.$counter.'"/>';
							echo '</tr>';
							//echo '</form>';
							next($siteUsers);
							$siteUser = current($siteUsers);
							$counter++;
						}

						if($counter == 0){
							echo '<tr>';
							echo '<td>'.'</td>';
							echo '<td colspan=3><h2 style="color: #000; font-weight:bold;">User not found.</h2><br>
												Developer or Reviewer not found. Please <a href="admin-view4.php" class="btn btn-success">CLICK HERE</a> to refresh the list.</td>';
							echo '</tr>';
						}
						        ?>













								<!-- This is from the original admin-view.php -->
						        <!--?php
									$controller = new AdminController;
									if(isset($_POST['searchUsers'])){
										if($_POST['searchUsers']=='')
											$siteUsers = @$controller->getAllSiteUsersDev();
										else
											$siteUsers = @$controller->searchSiteUsersDev($_POST['searchUsers']);
									}
									else{
										$siteUsers = @$controller->getAllSiteUsersDev();
									}

									$_SESSION['siteUsers'] = serialize($siteUsers);
									$counter = 0;
									$siteUser = current($siteUsers);
									if($siteUser != null && isset($_POST['searchUsers'])){
										echo '<tr style="font-size:80%;"><td colspan="4">Search Results for "'.$_POST['searchUsers'].'"....<a href="admin-view.php">CLICK HERE</a> to reload all developer accounts</td></tr>';
									}
									while($siteUser != null)
									{
										//echo '<form name="form'.$counter.'" action="admin-view.php" method="POST">';
										echo '<tr>';
										echo '<td><a href="#responsive_fileActionAdmin1" data-toggle="modal" onclick="selectIndex('.$counter.')">'.$siteUser->getUserName().'</td>';
										echo '<td>'.$siteUser->getLastLogin().'</td>';
										echo '<td>'.$siteUser->getLastDownload().'</td>';
										//echo '<input type="hidden" name="siteUserIndex" value="'.$counter.'"/>';
										echo '</tr>';
										//echo '</form>';
										next($siteUsers);
										$siteUser = current($siteUsers);
										$counter++;
									}
									unset($_POST['searchUsers']);

									if($counter == 0){
										echo '<tr>';
										echo '<td>'.'</td>';
										echo '<td colspan=3><h2 style="color: #000; font-weight:bold;">Developer not found.</h2><br>
															Developer not found. Please <a href="admin-view.php" class="btn btn-success">CLICK HERE</a> to refresh the list.</td>';
										echo '</tr>';
									}
								?-->
									
														
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
			
			var optionVal = $('tbody > tr:last-child()').index();

				$('.dataTables_filter label input').click(function(){
					if(optionVal >= 8){
						$('footer').removeClass('navbar-fixed-bottom').addClass('navbar-static-bottom');
					}
					else{
						$('footer').addClass('navbar-fixed-bottom').removeClass('navbar-static-bottom');
					}
				});
			



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
