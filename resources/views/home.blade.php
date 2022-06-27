
<html>
   <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/home.css?ts=<?=time()?>&quot" />
    <script src='{{ url("js/home.js") }}' defer></script>
    <title>Eventfinder</title>
</head>
   <body>
       <article>
           <header>
           <div id= "logo"><img src="img/logo1.png"/></div>    
           <nav>
            <a href="/hwk2/public/account"> Il mio account </a>
            <a href="/hwk2/public/logout"> Logout </a>
               </nav>
           </header>
           <section class="welcome">
            <div> Benvenuto <a>  {{ session("username")}} </a> </div>
            <button id = "vis"> Visualizza i tuoi preferiti </button>
        </section>
<section id="preferiti" >

</section>
<section class ="ric_1">
<div id = 'cont' >
    <div id='img1' class='blocco1'>
    
    </div>
    <div id= 'img2' class='blocco1' >
    
    </div>    
</div>
   
<form name='ricerca_evento' method='post' id='cerca' class='blocco1' >
<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <a id = 'tit'>Cerca un evento!</a>
                <p>
                <label>Evento<input type='text' name='evento'></label>
                </p>
                <p>
                <label>Nazione(ISO CODE)<input type='text' name='nazione'></label>
                </p>
                <p>
                <label id="nom">Data dell'evento <input type='date' name='data' id='data'></label>
                </p>
                <p>
                <label>&nbsp;<input type='submit' id='submit' value='Cerca' ></label>
                </p>
                <p>
                <a href="https://countrycode.org/"> Trova qui il Codice della Nazione (ISO CODES)</a><br>
                
                <a class = 'hidden' id ='err_p'> Inserire evento! </a><br>
                </p>
                <p id='avviso'>Inserire i dati in inglese</p>

    </form>
</section> 

<section id="sect" class="hidden" >

</section>    
<footer>
  Account: {{ session("username")}} 
</footer>    
</article>
   </body> 
</html>