<?php

class Layout{
    private $base_url;
    private $CI;
    
    public function __construct() {
        $this->CI = & get_instance();
        $this->base_url = base_url();
    }
    
    public function header_index(){
        echo '<meta charset="utf-8">
            

            <link href="'.$this->base_url.'img/favicon.ico" type="image/x-icon" rel="shortcut icon" />

            <!-- Bootstrap 3 -->
            <link href="'.$this->base_url.'css/bootstrap3/dist/css/bootstrap.css" rel="stylesheet" media="screen" />

            <!-- <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen" /> -->
            <!-- <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" /> -->

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- Modal -->
            <!-- <link href="bootstrap-modal-master/css/bootstrap-modal.css" rel="stylesheet" /> -->
            
            <!-- Icons -->
            <link href="'.$this->base_url.'fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="'.$this->base_url.'css/datatables/css/dataTables.bootstrap.css" />
            <!--[if IE 7]>
              <link href="'.$this->base_url.'fonts/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet" />
            <![endif]-->

            <!-- 1170 grid -->
            <link type="text/css" href="'.$this->base_url.'css/css-include/1170grid.css" rel="stylesheet" />



            <link type="text/css" href="'.$this->base_url.'css/css-include/style.css" rel="stylesheet" />

            <!-- Form Validator -->
            <link rel="stylesheet" href="'.$this->base_url.'/js/bootstrapvalidator/dist/css/bootstrapValidator.css" />

            <!--[if IE]>
            <link href="/favicon.ico" type="'.$this->base_url.'image/x-icon" rel="shortcut icon" />
            <![endif]-->
            <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
            <!--[if lt IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script><![endif]-->

            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="../../assets/js/html5shiv.js"></script>
              <script src="../../assets/js/respond.min.js"></script>
            <![endif]-->';
    }

    public function header_subpages(){
        echo '<meta charset="utf-8">
            

            <link href="'.$this->base_url.'img/favicon.ico" type="image/x-icon" rel="shortcut icon" />

            <!-- Bootstrap 3 -->
            <link href="'.$this->base_url.'css/bootstrap3/dist/css/bootstrap.css" rel="stylesheet" media="screen" />

            <!-- <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen" /> -->
            <!-- <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" /> -->

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- Date Picker -->
            <!--link href="'.$this->base_url.'css/bootstrap-formhelpers/docs/assets/css/bootstrap-responsive.css" rel="stylesheet" /-->
            <link href="'.$this->base_url.'css/bootstrapformhelpers/css/bootstrap-formhelpers.css" rel="stylesheet" />

            <!-- Modal -->
            <link href="'.$this->base_url.'css/bootstrap-modal-master/css/bootstrap-modal.css" rel="stylesheet" />
            
            <!-- Icons -->
            <link href="'.$this->base_url.'fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="'.$this->base_url.'css/datatables/css/dataTables.bootstrap.css" />
            <!--[if IE 7]>
              <link href="'.$this->base_url.'fonts/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet" />
            <![endif]-->

            <!-- 1280 grid -->
            <!--link type="text/css" href="'.$this->base_url.'css/css-include/1280grid.css" rel="stylesheet" /-->

            <!-- Bootstrap Tour -->
            <link href="'.$this->base_url.'js/bootstrap-tour/build/css/bootstrap-tour.css" rel="stylesheet" />
            <link href="'.$this->base_url.'js/bootstrap-tour/build/css/bootstrap-tour.min.css" rel="stylesheet" />



            <!--link type="text/css" href="'.$this->base_url.'css/css-include/style.css" rel="stylesheet" /-->
            <link type="text/css" href="'.$this->base_url.'css/css-include/style-footer-try.css" rel="stylesheet" />
                
            <!-- Input File -->
            <link type="text/css" href="'.$this->base_url.'css/inputfile/jquery.inputfile.css" rel="stylesheet" />

            <!-- Form Validator -->
            <link rel="stylesheet" href="'.$this->base_url.'/js/bootstrapvalidator/dist/css/bootstrapValidator.css" />

            <!--[if IE]>
            <link href="/favicon.ico" type="'.$this->base_url.'image/x-icon" rel="shortcut icon" />
            <![endif]-->
            <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
            <!--[if lt IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script><![endif]-->

            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="../../assets/js/html5shiv.js"></script>
              <script src="../../assets/js/respond.min.js"></script>
            <![endif]-->
            ';
    }
    
    public function header(){
        echo '<meta charset="utf-8">
            

            <link href="'.$this->base_url.'img/favicon.ico" type="image/x-icon" rel="shortcut icon" />

            <!-- Bootstrap 3 -->
            <link href="'.$this->base_url.'css/bootstrap3/dist/css/bootstrap.css" rel="stylesheet" media="screen" />

            <!-- <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen" /> -->
            <!-- <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" /> -->

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- Date Picker -->
            <!--link href="'.$this->base_url.'css/bootstrap-formhelpers/docs/assets/css/bootstrap-responsive.css" rel="stylesheet" /-->
            <link href="'.$this->base_url.'css/bootstrapformhelpers/css/bootstrap-formhelpers.css" rel="stylesheet" />

            <!-- Modal -->
            <link href="'.$this->base_url.'css/bootstrap-modal-master/css/bootstrap-modal.css" rel="stylesheet" />
            
            <!-- Icons -->
            <link href="'.$this->base_url.'fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="'.$this->base_url.'css/datatables/css/dataTables.bootstrap.css" />
            <!--[if IE 7]>
              <link href="'.$this->base_url.'fonts/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet" />
            <![endif]-->

            <!-- 1280 grid -->
            <link type="text/css" href="'.$this->base_url.'css/css-include/1280grid.css" rel="stylesheet" />

            <!-- Bootstrap Tour -->
            <link href="'.$this->base_url.'js/bootstrap-tour/build/css/bootstrap-tour.css" rel="stylesheet" />
            <link href="'.$this->base_url.'js/bootstrap-tour/build/css/bootstrap-tour.min.css" rel="stylesheet" />


            <!--link type="text/css" href="'.$this->base_url.'css/css-include/style.css" rel="stylesheet" /-->
            <link type="text/css" href="'.$this->base_url.'css/css-include/style-footer-try.css" rel="stylesheet" />
                
            <!-- Input File -->
            <link type="text/css" href="'.$this->base_url.'css/inputfile/jquery.inputfile.css" rel="stylesheet" />

            <!-- Form Validator -->
            <link rel="stylesheet" href="'.$this->base_url.'/js/bootstrapvalidator/dist/css/bootstrapValidator.css" />

            <!--[if IE]>
            <link href="/favicon.ico" type="'.$this->base_url.'image/x-icon" rel="shortcut icon" />
            <![endif]-->
            <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
            <!--[if lt IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script><![endif]-->

            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="../../assets/js/html5shiv.js"></script>
              <script src="../../assets/js/respond.min.js"></script>
            <![endif]-->
            ';
    }

    public function footer(){
        echo '<script src="'.$this->base_url.'css/bootstrap3/assets/js/jquery.js"></script>
            <script src="'.$this->base_url.'css/bootstrap3/dist/js/bootstrap.js"></script>

            

            <script src="'.$this->base_url.'js/main.js"></script>


            <script src="'.$this->base_url.'js/js-flat-ui/jquery-1.8.3.min.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery-ui-1.10.3.custom.min.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.ui.touch-punch.min.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/flatui-checkbox.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/flatui-radio.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.tagsinput.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.placeholder.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.stacktable.js"></script>
            <script src="http://vjs.zencdn.net/c/video.js"></script>

            <script src="'.$this->base_url.'js/backstretch-jquery/jquery.backstretch.min.js"></script>

            <script src="'.$this->base_url.'js/datatables/jquery.dataTables.min.js"></script>
            
            <script src="'.$this->base_url.'js/datatables/dataTables.bootstrap.js"></script>
            

            <script src="'.$this->base_url.'css/bootstrap3/js/tooltip.js"></script>
            <script src="'.$this->base_url.'css/bootstrap3/js/popover.js"></script>

            <!-- Bootstrap tour =================================================-->
            <script src="'.$this->base_url.'js/bootstrap-tour/build/js/bootstrap-tour.js"></script>
            <script src="'.$this->base_url.'js/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
            <!--script src="'.$this->base_url.'js/reviewer-tour-script.js"></script-->

            <!-- Form Validator =================================================-->
            <script type="text/javascript" src="'.$this->base_url.'js/bootstrapvalidator/dist/js/bootstrapValidator.js"></script>
            <script>



             <!-- Change Password Script =================================================-->
                $(document).ready(function(){
                    $("#changepassword").click(function(e){
                        var form = $(this).parents("form");
                        var data = form.serialize();
                        change_password(data);
                        e.preventDefault();
                    });

                    var change_password = function(data){
                        $.ajax({
                            url: "'.$this->base_url.'/index.php/account/check_password",
                            dataType: "json",
                            type: "POST",
                            data: data,
                            success: function(result){
                                if(result.status){
                                    $("#success").removeClass("hide");
                                    $("#error").addClass("hide");
                                    
                                    setTimeout(function(){
                                        location.reload();
                                    },1000);
                                }
                                else{
                                    $("#error").removeClass("hide");
                                    setTimeout(function(){
                                        $("#error").addClass("hide");
                                    },1500);
                                }
                                $("#changepassword").modal("show");
                            },
                            error: function(xhr){
                                alert(xhr.responseText);
                            }
                        });
                    }
                });
            </script>


  <!-- Change Email Script =================================================-->
   <script>
                $(document).ready(function(){
                    $("#changeEmail").click(function(e){
                        var form = $(this).parents("form");
                        var data = form.serialize();
                        change_email(data);
                        e.preventDefault();
                    });

                    var change_email = function(data){
                        $.ajax({
                            url: "'.$this->base_url.'/index.php/account/check_password_email",
                            dataType: "json",
                            type: "POST",
                            data: data,
                            success: function(result){
                                if(result.status){
                                    $("#success1").removeClass("hide");
                                    $("#error1").addClass("hide");
                                    
                                    setTimeout(function(){
                                        location.reload();
                                    },1000);
                                }
                                else{
                                    $("#error1").removeClass("hide");
                                    setTimeout(function(){
                                        $("#error1").addClass("hide");
                                    },1500);
                                }
                                $("#changeEmail").modal("show");
                            },
                            error: function(xhr){
                                alert(xhr.responseText);
                            }
                        });
                    }
                });

            
 </script>

            ';
            
    }

    public function footer_subpages(){
        echo '<script src="'.$this->base_url.'css/bootstrap3/assets/js/jquery.js"></script>
            <script src="'.$this->base_url.'css/bootstrap3/dist/js/bootstrap.js"></script>

            

            <script src="'.$this->base_url.'js/main.js"></script>


            <script src="'.$this->base_url.'js/js-flat-ui/jquery-1.8.3.min.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery-ui-1.10.3.custom.min.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.ui.touch-punch.min.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/flatui-checkbox.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/flatui-radio.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.tagsinput.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.placeholder.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.stacktable.js"></script>
            <script src="http://vjs.zencdn.net/c/video.js"></script>

            <script src="'.$this->base_url.'js/backstretch-jquery/jquery.backstretch.min.js"></script>

            <script src="'.$this->base_url.'js/datatables/jquery.dataTables.min.js"></script>
            
            <script src="'.$this->base_url.'js/datatables/dataTables.bootstrap.js"></script>

            <!-- Datepicker =================================================-->
            <!--script src="'.$this->base_url.'css/bootstrapformhelpers/js/bootstrap-formhelpers-datepicker.en_US.js"></script-->
            <script src="'.$this->base_url.'css/bootstrapformhelpers/js/bootstrap-formhelpers.js"></script>
            
            <script src="'.$this->base_url.'css/bootstrap3/js/tooltip.js"></script>
            <script src="'.$this->base_url.'css/bootstrap3/js/popover.js"></script>

            <!-- Bootstrap tour =================================================-->
            <script src="'.$this->base_url.'js/bootstrap-tour/build/js/bootstrap-tour.js"></script>
            <script src="'.$this->base_url.'js/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
            <!--script src="'.$this->base_url.'js/developer-tour-script.js"></script-->

            <!-- Input File =================================================-->
            <script src="'.$this->base_url.'/css/inputfile/jquery.inputfile.js"></script>

            <!-- Form Validator =================================================-->

            <script type="text/javascript" src="'.$this->base_url.'js/bootstrapvalidator/dist/js/bootstrapValidator.js"></script>';
    }

    public function reviewer_tour(){
        echo '<script src="'.$this->base_url.'js/reviewer-tour-script.js"></script>';
    }

    public function developer_tour(){
        echo '<script src="'.$this->base_url.'js/developer-tour-script.js"></script>';
    }
    
    public function profile_footer(){
        echo '<script src="'.$this->base_url.'js/js-flat-ui/jquery-1.8.3.min.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery-ui-1.10.3.custom.min.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.ui.touch-punch.min.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/flatui-checkbox.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/flatui-radio.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.tagsinput.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.placeholder.js"></script>
            <script src="'.$this->base_url.'js/js-flat-ui/jquery.stacktable.js"></script>
            <script src="http://vjs.zencdn.net/c/video.js"></script>';
    }
    
    
    public function user_menu(){
        echo '<ul class="nav navbar-nav navbar-right"> 
                <li class="dropdown">
                    <!--<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-user"></i> Hello, '. $this->CI->session->userdata('username') .' <b class="caret"></b></a>-->
                    
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icomoon-user2"></i> Hello, '. $this->CI->session->userdata('username') .' <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                            <li role="presentation" class="dropdown-header">Options</li>

                            <li><a href="#responsive_changeEmail" data-toggle="modal">Change Email</a></li>
                            <li><a id="responsive_changePassword_btn" href="#responsive_changePassword" data-toggle="modal">Change Password</a></li>
                                
                            <li class="divider"></li>

                            <li><a href="'.$this->base_url.'index.php/account/logout"><i class="icon-off"></i> Logout</a></li>
                    </ul>
                 </li>
              </ul>';
    }

    public function usermenu_admin(){
        echo '<ul class="nav navbar-nav navbar-right"> 
                <li class="dropdown">
                    <!--<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-user"></i> Hello, '. $this->CI->session->userdata('username') .' <b class="caret"></b></a>-->
                    
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icomoon-user2"></i> Hello, '. $this->CI->session->userdata('username') .' <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                            <li role="presentation" class="dropdown-header">Options</li>

                            <li><a href="#responsive_changePassword" data-toggle="modal">Change Password</a></li>
                                
                            <li class="divider"></li>

                            <li><a href="'.$this->base_url.'index.php/account/logout"><i class="icon-off"></i> Logout</a></li>
                    </ul>
                 </li>
              </ul>';
    }

    public function modal_footer($status = FALSE){

        $alert = ($status) ? '<p class="alert alert-danger"><i class="icon-warning-sign"></i> Invalid password.</p>':'';
       
        echo '<!-- Change Password Pop Up -->
        <form id="defaultForm" method="post">
            <div class="modal fade" id="responsive_changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header light-theme">
                            <button type="button" class="close light-theme" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <span class="popup">Change Password</span>
                        </div>
                        <div class="modal-body">  
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 ">

                                    <p class="alert alert-danger hide" id="error"><i class="icon-warning-sign"></i> Invalid password.</p>
                                    <p class="alert alert-success hide" id="success"><i class="icon-ok"></i> Successfully changed password.</p>
                                    

                                    ' . $alert . '<div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Old Password" required/>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="enterNewPassword" name="newPassword" placeholder="Enter New Password" />
                                    </div>

                                    <div class="form-group last">
                                        <input type="password" class="form-control last" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm New password" />
                                    </div>


                                </div> 
                            </div>
                        </div>
                        <div class="modal-footer"> 
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3 ">
                                    <button type="submit" class="btn btn-primary" id="changepassword"><i class="icon-ok icon-large default"></i> Save</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Change Email Pop Up -->
        <form id="emailForm" method="post">
            <div class="modal fade" id="responsive_changeEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header light-theme">
                            <button type="button" class="close light-theme" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <span class="popup">Change Email</span>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                 <p class="alert alert-danger hide" id="error1"><i class="icon-warning-sign"></i> Invalid password.</p>
                                    <p class="alert alert-success hide" id="success1"><i class="icon-ok"></i> Successfully changed password.</p>

                                   

                                   ' . $alert . ' <div class="form-group">
                                        <input type="password" class="form-control" id="emailPassword" name="emailPassword" placeholder="Enter Password" required/>
                                    </div>

                                    <div class="form-group last">
                                        <input type="text" class="form-control last" id="enterNewEmail" name="enterNewEmail" placeholder="Enter New Email" required/>
                                    </div>
                                

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary" id="changeEmail"><i class="icon-ok icon-large default"></i> Save</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </form>';
    }
}
?>
