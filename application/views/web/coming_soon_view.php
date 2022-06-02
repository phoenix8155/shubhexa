<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shubhexa | Coming soon</title>
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>cs/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>cs/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>cs/css/iosoon-style.css">
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>cs/css/iosoon-theme5.css">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="info-holder">
                    <iframe width="430" height="250" src="https://www.youtube.com/embed/t4ttGYxgctw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="form-holder custom-bg">
                <div class="form-content">
                    <div class="form-items">
                        <div class="form-row logo-social">
                            <div class="col-6">
                                <div class="website-logo-inside">
                                    <a href="#">
                                        <div class="logo">
                                            <img class="logo-size" src="<?=asset_path('web/')?>images/shubhexa-logo-blue.png" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="other-links no-bg-icon">
                                    <a target="_blank" href="https://www.facebook.com/Shubhexa-Gujarat-107701255161008"><i class="fab fa-facebook-f"></i></a><a target="_blank" href="https://twitter.com/ShubhexaG"><i class="fab fa-twitter"></i></a><a target="_blank" href="https://www.youtube.com/channel/UClrQAGJDWsOO8txUK6sghGA"><i class="fab fa-youtube"></i></a>
                                    <a target="_blank" href="https://www.instagram.com/shubhexa_gujarat/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <h3>We’re Coming Soon!</h3>
                        <p>Our website is under constructions currently, Get a notification on your e-mail for updates.</p>
                        <?php

$top_msg = $this->session->flashdata('msg_show');

if (is_array($top_msg)) {

	if ($top_msg['class'] == 'false') {?>
			<p style="color: red;"><?=$top_msg['msg']?></p>

			<?php } else {?>
					<p style="color: red;"><?=$top_msg['msg']?></p>
				<?php }}?>
                        <form class="form-row" action="<?=file_path()?><?=$this->uri->rsegment(1)?>/sendMail" method="post">
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" placeholder="E-mail Address">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Notify me</button>
                            </div>
                        </form>
                        <!-- <div class="time-counter form-row">
                            <div class="days count col">
                                <div class="num">5</div>
                                <div class="label">Days</div>
                            </div>
                            <div class="hours count col">
                                <div class="num">13</div>
                                <div class="label">Hrs</div>
                            </div>
                            <div class="minutes count col">
                                <div class="num">59</div>
                                <div class="label">Min</div>
                            </div>
                            <div class="seconds count col">
                                <div class="num">30</div>
                                <div class="label">Sec</div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?=asset_path('web/')?>cs/js/jquery.min.js"></script>
<script src="<?=asset_path('web/')?>cs/js/popper.min.js"></script>
<script src="<?=asset_path('web/')?>cs/js/bootstrap.min.js"></script>
<script src="<?=asset_path('web/')?>cs/js/main.js"></script>
</body>
</html>
