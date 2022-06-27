
<html>
    <head>
        <meta charset="utf-8">
        <title>Registrazione</title>
        <link rel="stylesheet" href="css/reg_log.css?ts=<?=time()?>&quot">
        <script src='<?php echo e(url("js/reg.js")); ?>' defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
       <body>
        <main>
        <h1> Registrazione</h1>
        <div id="loghi">
        <img src ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSoqe_MhG0alZP5qTK0f_T0CqVqNh-S68yeQ&usqp=CAU"/>
        <img src='<?php echo e(url("img/logo1.png")); ?>'/>
        </div>
        <form name='reg' method='post' id='registra'>    
        <input type='hidden' name='_token' value='".csrf_token()."'>  
                <p>
                <label>Nome<input type='text' name='nome' id='no'></label>
                </p>
                <p>
                <label>Cognome <input type='text' name='cognome' id='cogn'></label>
                </p>
                <p>
                <label>E-mail <input type='text' name='email'id='e_mail'></label>
                </p>
                <p>
                <label>Username <input type='text' name='username' id='nome_ut'></label>
                </p>
                <p>
                <label>Password <input type='password' name='password' id ='pass'></label>
                </p>
                <p>
                <label>&nbsp;<input type='submit' id='submit' value='Registrati' ></label>
                </p>
        </form>
    <div class='errori'>
    </div><br>
    <div class='errori2'>
    </div><br>
    <div class='errori3'>
    </div><br>
    <div class='errori4'>
    </div><br>
    <div class='errori5'>
    </div><br>
    <div class='errori6'>
    </div><br>
    <div class="log">Hai già un account? <a href="/hw2/public/login">Accedi</a> </div>
    
    </main>

</body>
</html><?php /**PATH C:\Users\corra\OneDrive\Desktop\XAMPP\htdocs\hwk2\resources\views/reg.blade.php ENDPATH**/ ?>