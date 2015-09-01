<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/login/login-style.css');?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('asset/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    <title>Login</title>
</head>

<body>
	<div id="container_demo">
        <div id="wrapper">
            <div id="login">
                <form action="<?php echo site_url('administrator/proses_login');?>" method="POST"> 
                    <h1>Log in</h1> 
                    <p> 
                        <label for="username"  > Your username : </label>
                        <input name="username" type="text" />
                    </p>

                    <p> 
                        <label for="password" > Your password : </label>
                        <input name="pass" type="password"/> 
                    </p>
                    <p class="login button"> 
                        <input type="submit" value="Login" /> 
                    </p>
                </form>
                <?php echo validation_errors(); ?>
                <p style="color:red;"><?php echo $this->session->flashdata('notification')?></p>
            </div>
        </div>
    </div>
</body>
