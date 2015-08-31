<!DOCTYPE html>
<html lang="en">
<head>
<title>404 | Page Not Found</title>

<?php $this->layout->header_index() ?>

<style type="text/css">

/**
 * Eric Meyer's Reset CSS v2.0 (http://meyerweb.com/eric/tools/css/reset/)
 * http://cssreset.com
 */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
	display: block;
}
input:focus {outline: none;} /* remove chrome focus/safari lights */
textarea:focus{outline: none;} /* remove chrome focus/safari lights */
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}


/* Commonly Use */

.clear{
	height:0;
	clear:both;
}
.bold{
	font-weight:bold;	
}
.padding0{
	padding:0;
}
.margin0{
	margin:0;
}
.border0{
	border:0;
}

.banner-learnmore h5{
	font: 18px 'open_sansbold', Arial, Helvetica, sans-serif;
	padding: 5px;
	color: #fff;
}


body {
	background: url('<?php echo base_url() ?>img/body-bg6.jpg') repeat-x top left, #FDD456;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

.container.mainwrapper {
	padding: 140px 0px 0px 0px;
}


.col-md-6.leftpane{
	padding: 0px 30px 0px 0px;
}

.col-md-6.leftpane img {
	display: block;
	margin: 0 auto;
	padding-bottom: 20px;
}




.col-md-6.rightpane  {
	padding: 0px 0px 0px 30px;
}
.col-md-6.rightpane img {
	padding-top: 155px;

}



#footerwrapper{
	background: transparent url('<?php echo base_url() ?>img/footer-bg.jpg') no-repeat bottom center;
	position: fixed;
	bottom: 0;
	height: 118px;
	width: 100%;
	z-index: -99;
}



.backdrops{
	position: absolute;
	top: 100px;
	z-index: -100;
	height: 100px;
	width: 100%;
}

#cloud1{
	background: url('<?php echo base_url() ?>img/cloud1.png') no-repeat top left;
	height: 99px;
	position: absolute;
	top: 35px;
	left: 52%;
	width: 126px;
}
#cloud2{
	margin-left: 25%;
	background: url('<?php echo base_url() ?>img/cloud2.png') no-repeat top left;
	height: 147px;
	position: absolute;
	top: 100px;
	right: 5%;
	width: 213px;
}
#cloud3{
	background: url('<?php echo base_url() ?>img/cloud3.png') no-repeat top left;
	height: 211px;
	position: absolute;
	top: 65px;
	left: 4%;
	width: 307px;
}



/*max-width: 988px; max-width: 800px*/
/*max-height: 295px;*/


/* Small devices (tablets, 768px and up) */
@media (max-width: 320px), (max-width: 480px), (max-width: 568px), (max-width: 600px), (max-width: 800px){ 


	#imgtxt{
		margin: 0;
	}
	
	.container.mainwrapper {
    	padding: 10px 15px;
	}

	.col-md-6.leftpane{
		padding: 0px 0px 0px 0px;
		display: block;
		margin: 0 auto;
		float: none!important;
	}

	.col-md-6.leftpane img{
		/*display: block;*/
		/*margin: 0 auto;*/
		float: none!important;
		display: block;
		margin: 0px auto 0px 50px;
	}
	#clicker{
			float: none!important;
			margin: 0px 0px 0px 0px;
			padding: 0px;
			vertical-align: middle;
			text-align: center;
		}
	.banner-learnmore h5{
		font: 18px 'open_sansbold', Arial, Helvetica, sans-serif;
	}	
	.col-md-6.rightpane img{
			/*width: 252px;
			height: 200px;*/
			width: 100%;
			height: 100%;
			height: auto;
			padding-top: 0px;
			/*padding-right: 20px;*/
			display: block;
			margin: 30px 20px 0 50px;

	}


	.backdrops{
		display: none;
	}


	@media(max-height: 500px){
		.col-md-6.leftpane img{
			width: 177px;
			height: 200px;
			display: block;
			margin: 0 auto 0 95px; /*instead of 50px*/
			float: none!important;

		}
		#clicker{
			float: none!important;
			margin: 0px 0px 0px 0px;
			padding: 0px;
			vertical-align: middle;
			text-align: center;
		}
		.col-md-6.rightpane{
			float: none!important;
			padding: 0px;
		}
		.col-md-6.rightpane img{
			width: 252px;
			height: 200px;
			padding-top: 30px;
			display: block;
			margin: 0 auto 0 50px;

		}


		.banner-learnmore h5{
			font: 15px 'open_sansbold', Arial, Helvetica, sans-serif;
		}	
	}

	@media(max-height: 320px){
		.col-md-6.leftpane img{
			width: 177px;
			height: 200px;
			display: block;
			margin: 0 auto 0 170px; /*instead of 50px*/
			float: none!important;

		}
		#clicker{
			float: none!important;
			margin: 0px 0px 0px 0px;
			padding: 0px;
			vertical-align: middle;
			text-align: center;
		}
		.col-md-6.rightpane{
			float: none!important;
			padding: 0px;
		}
		.col-md-6.rightpane img{
			width: 252px;
			height: 200px;
			padding-top: 30px;
			display: block;
			margin: 0 auto 0 125px;

		}


		.banner-learnmore h5{
			font: 15px 'open_sansbold', Arial, Helvetica, sans-serif;
		}	
	}

	@media(max-height: 320px) and (max-width: 568px){
		.col-md-6.leftpane img{
			width: 177px;
			height: 200px;
			display: block;
			margin: 0 auto 0 217px; /*instead of 50px*/
			float: none!important;

		}
		#clicker{
			float: none!important;
			margin: 0px 0px 0px 0px;
			padding: 0px;
			vertical-align: middle;
			text-align: center;
		}
		.col-md-6.rightpane{
			float: none!important;
			padding: 0px;
		}
		.col-md-6.rightpane img{
			width: 252px;
			height: 200px;
			padding-top: 0px;
			display: block;
			margin: 30px auto 0 173px;

		}


		.banner-learnmore h5{
			font: 15px 'open_sansbold', Arial, Helvetica, sans-serif;
		}	
	}
	@media(max-width: : 320px) and (max-height: : 568px){
		.col-md-6.leftpane img{
			width: 177px;
			height: 200px;
			display: block;
			margin: 0 auto 0 217px; /*instead of 50px*/
			float: none!important;

		}
		#clicker{
			float: none!important;
			margin: 0px 0px 0px 0px;
			padding: 0px;
			vertical-align: middle;
			text-align: center;
		}
		.col-md-6.rightpane{
			float: none!important;
			padding: 0px;
		}
		.col-md-6.rightpane img{
			width: 252px;
			height: 200px;
			padding-top: 0px;
			display: block;
			margin: 30px 0 0 20px;

		}


		.banner-learnmore h5{
			font: 15px 'open_sansbold', Arial, Helvetica, sans-serif;
		}	
	}
}


@media (max-height: 570px){
	#footerwrapper{
		display: none;
	}
} 

/* Small devices (tablets, 768px and up) */
@media (min-width: @screen-sm-min) {}

/* Medium devices (desktops, 992px and up) */
@media (min-width: @screen-md-min) {}

/* Large devices (large desktops, 1200px and up) */
@media (min-width: @screen-lg-min) {}



</style>
</head>
<body>
	
	<!-- <div id="container"> -->
	
	<div id="" class="container mainwrapper">

		<div class="backdrops">
			<div id="cloud1">	</div>
			<div id="cloud2">	</div>
			<div id="cloud3">	</div>
		</div>

	
			<div class="row">
				
				<section class="col-md-6 leftpane pull-left">
					<div class="row">
						<center><img src="<?php echo base_url() ?>img/404.png" class="img-responsive pull-right" id="imgtxt"/></center>
					</div>
					<div class="row">
						<!-- <div class="col-md-12"> -->
							<center><a id="clicker" class="btn btn-success banner-learnmore pull-right" type="button" href="<?php echo base_url() ?>index.php">
								<h5>Click this button to go back</h5>	
							</a></center>
						<!-- </div> -->
					</div>
				<div class="clearfix"></div>
				</section>

				<section class="col-md-6 rightpane pull-right">			
		            <!-- <img src="<?php echo base_url() ?>img/404-emptybox_2.png" class="img-responsive pull-left" /> -->
		            <img src="<?php echo base_url() ?>img/404-emptybox-3.png" class="img-responsive pull-left"/>
				</section>

				<div class="clearfix"></div>
			</div>

	</div>
	<div id="footerwrapper" class="container-fluid">
		<!-- <div class="row">
			<div class="col-md-12 backdrops2"></div>
		</div> -->
	</div>
	<div class="clearfix"></div>
</body>
</html>