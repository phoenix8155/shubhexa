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
                            <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope="" itemtype="http://schema.org/ConfirmAction">
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
                                                <td class="content-block">
                                                    <h3>Welcome to Shubhexa!</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block">
                                                    Dear <?php echo $name.' ,'; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block">
                                                    Thanks For Choosing Us. Your login details are below. You have to first Login and change your password for your security purpose and not disclose password with anyone.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block">
                                                    Your Credentials
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block">
                                                    ----------------------------------------------------------------------------------------------------------------
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block">
                                                    Username : <b><?=$username?></b>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="content-block">
                                                    Password : <b><?=$password?></b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block">
                                                    ----------------------------------------------------------------------------------------------------------------
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content-block aligncenter">
                                                    <a href="<?=file_path('celebrity_admin')?>change_password/" class="btn-primary" itemprop="url">Reset Your Password</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:red;font-size:12px">
                                                    <b>Note:</b> For reset your password, you need to login into app or celebrity admin using above credentials. 
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
tr {
    line-height: 30px;
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