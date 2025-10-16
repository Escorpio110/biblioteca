<!DOCTYPE html>
<html lang="<?= LANGUAGE_CODE ?>">
	<head>
		<meta charset="UTF-8">
		<title>Portada - <?= APP_NAME ?></title>
		
		<!-- META -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Portada en <?= APP_NAME ?>">
		<meta name="author" content="Robert Sallent">
		
		<!-- FAVICON -->
		<link rel="shortcut icon" href="/log.ico" type="image/png">	
		
		<!-- CSS -->
		<?= $template->css() ?>
		
		<!-- JS -->
		<script src="/js/TextReader.js"></script>
	</head>
	<body>
		<?= $template->login() ?>
		<?= $template->menu() ?>
		<?= $template->header(null, 'Para desarrollo web y APIs RESTFUL') ?>
		<?= $template->messages() ?>
		<?= $template->acceptCookies() ?>
		
		<main>
    		<h1>Bienvenido a la biblioteca</h1>

    		<section id="queesfastlight"  class="flex-container gap2">
				<div class="flex2 readable" data-event="dblclick">
            		<h2>¿Qué es esta biblioteca?</h2>
            		
            		<p>
            			Es un lugar de tranquilidad y aprendizaje.
            		</p>
            		
            		<p>Es una biblioteca que se vasa en en estilo medieval </p>
        			      		       
        		    <p>
						Aqui puedes encontrar todo tipo de libros, desde los mas antiguoss hata los mas moderno
						
					</p>	 
					<div class="flex-container"> 
						<div class="flex2">

						<img src="/images/template/lib.png">

						</div>
						<div class="flex2">
							
							<img src="/images/template/lib2.png" >

						</div>
					</div>
    		    </div>   
    		    
    		    <figure class="flex1 medium centered centered-block">
    		    	<img class="square fit" src="/images/template/biblio.png" alt="FastLight recomienda PHP8.2 y MySQL8">
    		    </figure>
		    </section>
		               
            <section class="warning">
		    	<h2>IMPORTANTE</h2>
		    	<p>Se está elaborando la <a href="https://fastlight.org/Backend">documentación Backend</a> (esto me llevará un tiempo) y en
		    	breve también se comenzarán a publicar los manuales en PDF con ejemplos prácticos.
		    	Lo encontraréis todo en <a href="https://fastlight.org">la documentación oficial de FastLight</a>. 
		    	</p>
		    	<p>Estad también atentos a mi 
 				<a href='https://www.linkedin.com/in/robert-sallent-l%C3%B3pez-4187a866'>LinkedIn</a> personal.</p>
		    </section>
		    
		    
           <section class="flex1">
           		<h2>Requisitos</h2>
           		 
           		<p>Actualmente, <b>la versión <?= APP_VERSION ?> del framework</b> ha sido 
           		testeada en <b>PHP <?= MIN_PHP_VERSION ?></b> con <b>MySQL 8</b>.
           		Esto no quiere decir que no funcione en versiones ligeramente anteriores o posteriores,
           		pero no se garantiza que lo haga.</p>
           		<?= "Actualmente este servidor dispone de <b>PHP ".phpversion().".</b>" ?>
           </section>
		</main>

		<!-- este mapa web solamente se muestra en pantallas grandes -->
		<nav class="web-map">  
			<h2>Links</h2>
			
			<ul class="flex-container">   		
				<li class="flex1"><a href="#">Recursos</a>
					<ul>
						<li><a target="_blank" href="https://github.com/robertsallent/fastlight">GitHub</a></li>
						<li><a target="_blank" href="https://fastlight.org">Documentación oficial</a></li>
					</ul>
				</li>
				
				<li class="flex1"><a href="https://fastlight.org/Example#list">Documentación</a>
					<ul>
						<li><a target="_blank" href="https://fastlight.org/Example">Frontend</a></li>
						<li><a target="_blank" href="https://fastlight.org/Backend">Backend</a></li>
						<li><a target="_blank" href="#">Manuales PDF (TODO)</a></li>
					</ul>
				</li>
				
				<li class="flex1"><a href="#">Ejemplos de clase</a>
					<ul>
						<li><a target="_blank" href="https://larabikes.robertsallent.com">Larabikes (Laravel)</a></li>
						<li><a target="_blank" href="https://symfofilms.robertsallent.com">SymfoFilms (Symfony)</a></li>
						<li><a target="_blank" href="https://biblioteca.fastlight.org">Biblioteca (FastLight)</a></li>
					</ul>
				</li>
				
				<li class="flex1"><a href="#">Otros proyectos</a>
					<ul>
						<li><a target="_blank" href="https://juegayestudia.com">Juega y Estudia</a></li>
						<li><a target="_blank" href="https://veinspercubelles.org">Veïns per Cubelles</a></li>
					</ul>
				</li>
			</ul>
		</nav>
    
		<?= $template->footer() ?>
		<?= $template->version() ?>
		
	</body>
</html>

