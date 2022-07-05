<html>
    <head>
        <title></title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="color: #6c7b88;">
        <table class="body-wrap">
            <tbody>
                <tr>
                    <td></td>
                    <td class="container" width="600">
                        <div class="content">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-wrap">
                                        <meta itemprop="name" content="Confirm Email">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody><tr>
                                                <td>
                                                    <img src="<?=asset_path()?>web/images/shubhexa-logo-blue.png" class="center-img">
                                                </td>
                                            </tr>	
                                            <tr>
                                                <td class="center-text">
                                                   <b>Verify your email</b>
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    Hello <b><?php echo $name.'</b> ,'; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <p>Confirm your email address to complete your registration with Subheksha’s portal. It's easy just click the button below.</p>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="content-block aligncenter">
                                                    <a href="<?=file_path()?>email_verification/verify/<?=$verification_code?>" class="btn-primary" itemprop="url">Confirm Email</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <p><b>Team Subheksha</b></p>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>    
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
<style>
.center-text {
    text-align: center;
    padding: 10px;
    text-decoration: underline;
}
p {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: justify;
}
tr {
    line-height: 25px;
}
.center-img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
body {
    font-family: 'Roboto', sans-serif;
    background-color: #ecf0f5;
    color: #6c7b88;
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 99% !important;
    height: 100%;
    line-height: 1.6em;
}
.content-wrap {
    padding: 20px;
}
table td {
    vertical-align: top;
}
.main {
    background-color: #fff;
    border-bottom: 2px solid #d7d7d7;
}
.body-wrap {
    background-color: #ecf0f5;
    width: 100%;
}
.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    clear: both !important;
}
.content {
    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;
}
</style>