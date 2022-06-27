 <html>
 <head>
 <link rel="stylesheet" href="css/account.css?ts=<?=time()?>&quot" />
 <title>Account</title>
 </head>   
 
 <body>
 <main>
 <h1> Account </h1>
 <p>
 <h3>Username:  <a> {{ $username }} </a></h3>
</p>
 <p>
 <h3>Nome: <a> {{ $name }} </a></h3>
</p>
 <p>
 <h3>Cognome: <a> {{ $surname }} </a></h3>
</p> 
<p>
<h3>Email: <a> {{ $email }} </a></h3>
</p>      
 <p>
  <h3> Numero preferiti: <a> {{ $n_pr }} </a></h3> 
 </p>
</main>
</body>
</html>