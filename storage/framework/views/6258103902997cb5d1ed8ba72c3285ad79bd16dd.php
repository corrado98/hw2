 <html>
 <head>
 <link rel="stylesheet" href="css/account.css?ts=<?=time()?>&quot" />
 <title>Account</title>
 </head>   
 
 <body>
 <main>
 <h1> Account </h1>
 <p>
 <h3>Username:  <a> <?php echo e($username); ?> </a></h3>
</p>
 <p>
 <h3>Nome: <a> <?php echo e($name); ?> </a></h3>
</p>
 <p>
 <h3>Cognome: <a> <?php echo e($surname); ?> </a></h3>
</p> 
<p>
<h3>Email: <a> <?php echo e($email); ?> </a></h3>
</p>      
 <p>
  <h3> Numero preferiti: <a> <?php echo e($n_pr); ?> </a></h3> 
 </p>
</main>
</body>
</html><?php /**PATH C:\Users\corra\OneDrive\Desktop\XAMPP\htdocs\hwk2\resources\views/account.blade.php ENDPATH**/ ?>