<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv=”Cache-control” content=”no-cache” />
        <meta name=”Pragma” content=”no-cache” />
        <meta http-equiv=”Expires” content=”-1″ />
        <title>Login</title>
        <link rel="stylesheet" href="css/reg_log.css?ts=<?=time()?>&quot"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='<?php echo e(url("js/login.js")); ?>' defer></script>
    </head>
       <body>
        <main>
        <h1> Login </h1>
        <div id="loghi">
        <img src ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSz6MwCgv7v-hiJBQDR6cZRu_xxnxIDdPxOhw&usqp=CAU"/>
        <img src="img/logo1.png"/>
        </div>
        <form name='log_form' method='post' action="<?php echo e(route('login')); ?>">
             <p>
                <label>Username <input type='text' name='username'></label>
            </p>
            <p>
                <label>Password <input type='password' name='password'></label>
            </p>
            <p>
                <label>&nbsp;<input type='submit'></label>
            </p>
        </form>
        <?php if(session()->has('ok')): ?> <h3 id='successo'>Registrazione effettuata con successo!</h3>
        <?php endif; ?>
        <div class='errori'>
    </div><br>
    <div class='errori2'>
    </div><br>
    <div class="hidden">Registrati al seguente link! <a href="reg.php"> Registrazione  </a> </div>  
</main>
</body>
</html><?php /**PATH C:\Users\corra\OneDrive\Desktop\XAMPP\htdocs\hwk2\resources\views/log.blade.php ENDPATH**/ ?>