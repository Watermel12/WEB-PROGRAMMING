
<?php
$resume['contact'] = str_replace('\\',"",$resume['contact']);
$resume['skills'] = str_replace('\\',"",$resume['skills']);
$resume['works'] = str_replace('\\',"",$resume['experience']);
$resume['education'] = str_replace('\\',"",$resume['education']);
$resume['certificate'] = str_replace('\\',"",$resume['certificate']);
$resume['reference'] = str_replace('\\',"",$resume['reference']);

$contact=json_decode($resume['contact']);
$skills=json_decode($resume['skills']);
$addinfo=json_decode($resume['addinfo']);
$works=json_decode($resume['experience']);
$education=json_decode($resume['education']);
$certificate=json_decode($resume['certificate']);
$reference=json_decode($resume['reference']);
$phone_num = $resume[0]['phone_num'];
$email = $resume[0]['email_id'];
$name = $resume[0]['full_name'];
$img = $resume[0]['img'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
        <link rel="stylesheet" type="text/css" href="../assets/css/cv_content_3.css" media="all"/> 
        
        <link rel="icon" href="../assets/images/logo.png">
        <title><?=@$title?></title>
		<style>
		body {
		background-image: url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg');
        background-size: 100% 150%;
		}
	</style>
    </head>
    <body>
    <div class="header">
      <h1>~~~</h1>
    </div>
    
<div id="doc2" class="yui-t7">
	<div id="inner">
		
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1><?=$name?></h1>
					<h2><?=@$resume['headline']?></h2>
					<div class="contact-info">
						<h3>Contact:</h3>
						<h3>Phone number: <?=$phone_num?></h3>
						<h3>Email: <a href="mailto:<?=@$email?>"><?=@$email?></a></h3>
						<h3>Address: <?=$contact->address?></h3>
					</div><!--// .contact-info -->
				</div>

				<div class="yui-u">
				<div class="wrapper">
					<img src="../page/upload_img/<?=$img ?>">
				</div>
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Job Goal</h2>
						</div>
						
						<div class="yui-u">
						<p class="enlarge">
								<?=$resume['objective']?>
								</p>
						</div>
						
					</div><!--// .yui-gf -->


					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">
							<ul class="talent">
							<?php
							foreach($skills as $skill)
								{
								?>
								
								<li><?=$skill?></li>
								
								<?php
								}
								?>
							</ul>
						</div>
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience</h2>
						</div><!--// .yui-u -->

						
						<?php
						if(count($works)<1)
						{
						?>
						<div class="yui-u">

							<h3>no education</h3>
						</div>
						<?php
						}
						foreach($works as $work)
						{
							?>
							<div class="yui-u">
							<div class="job">
							<h2><?=$work->company?></h2>
							<h3><?=$work->jobrole?></h3>
							<h4><?=$work->w_duration?></h4>
							<p><?=$work->work_desc?></p>
						</div>
						<?php
						}
													?>

						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->

					
					<div class="yui-gf">
						<div class="yui-u first"->
							<h2>Education</h2>
						</div>
						<?php
						if(count($education)<1)
						{
							?>
							<div class="yui-u">

						<h3>no education</h3>
												</div>
							<?php
						}
						foreach($education as $ed)
						{
						?>
						<div class="yui-u" style="padding:10px 0px; border-bottom:1px solid rgba(0,0,0,0.1)">
						<h2><?=$ed->college?></h2>
						<h3><?=$ed->course?> &mdash; (<?=$ed->e_duration?>) </h3>
						</div>
						<?php
						}
						?>
												
							
					</div><!--// .yui-gf -->
					
					<div class="yui-gf">
						<div class="yui-u first"->
							<h2>Certificate</h2>
						</div>
						<?php
						if(count($certificate)<1)
						{
							?>
							<div class="yui-u">

						<h3>no certificate</h3>
												</div>
							<?php
						}
						foreach($certificate as $ce)
						{
						?>
						<div class="yui-u" style="padding:10px 0px; border-bottom:1px solid rgba(0,0,0,0.1)">
						<h2><?=$ce->titles?></h2>
						<h3><?=$ce->or_name?> &mdash; (<?=$ce->cert_duration?>) </h3>
						</div>
						<?php
						}
						?>
												
							
					</div><!--// .yui-gf -->
						
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Additional information</h2>
						</div>
						<div class="yui-u">
							<ul class="talent">
							<?php
							foreach($addinfo as $addinf)
								{
								?>
								
								<li><?=$addinf?></li>
								
								<?php
								}
								?>
							</ul>
						</div>
					</div><!--// .yui-gf-->

					<div class="yui-gf last">
						<div class="yui-u first"->
							<h2>Reference</h2>
						</div>
						<?php
						if(count($reference)<1)
						{
							?>
							<div class="yui-u">

						<h3>no reference</h3>
												</div>
							<?php
						}
						foreach($reference as $re)
						{
						?>
						<div class="yui-u" style="padding:10px 0px; border-bottom:1px solid rgba(0,0,0,0.1)">
						<h2><?=$re->re_name?>(<?=$re->re_relate?>)</h2>
						<h3><?=$re->re_email?> &mdash; <?=$re->re_number?> </h3>
						</div>
						<?php
						}
						?>
												
							
					</div><!--// .yui-gf -->

						</div><!--// .yui-b -->
						</div><!--// yui-main -->
								</div><!--// bd -->

								<div id="ft">
									<p><?=$name?> &mdash; <a href="mailto:<?=@$email?>"><?=$email?></a> &mdash; <?=@$phone_num?></p>
								</div><!--// footer -->

							</div><!-- // inner -->


</div>
<!--// doc -->
    <div class="footer">
      <h1>~~~</h1>
    </div>

</body>
</html>