
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Início</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  
  <link rel="shortcut icon" href="img/icon.png" >
  <?php include('php/bar.php') ?>
</head>
<body>

  <div class='page'>

    <section class='hero'>
      <div class='cta'>Fórum Comunitário:</br><span class="par"></span>resolução de problemas</div>
      <button onclick="jump('sec-contact');" class='button-cta'>Publicar</button>
    </section>
    <section class='coments'>
      <div class='section-name' id='sec-coments'></div>
      <div class='hcarousel'>
            </div>
             <div class="container">
    <h2 class="sech2">Últimas Publicações</h2>  
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Áreas do SlideShow -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="/img/igarassu.jpg" alt="" style="width:100%;filter: brightness(50%)">
          <div class="item">
            <div class="carousel-caption">
              <h3>BEM VINDO</h3>
              <p class="pr">As notícias sobre a sua comunidade você encontra nesta plataforma online.</p>
            </div>
          </div>
          <!-- Slide 2 -->
        </div>
        <div class="item">
          <img src="/img/igarassu2.jpg" alt="" style="width:100%;filter: brightness(50%)">
          <div class="item">
            <div class="carousel-caption">
              <h3>O que o Fórum Comunitário oferece?</h3>
              <p class="pr">Nós oferecemos a você usuário a possibilidade de fazer publicações sobre problemas locais e a receber feedback sobre a resolução dos problemas. </p>
            </div>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="item">
          <img src="/img/a.jpg" alt="" style="width:100%;filter: brightness(50%)">
          <div class="item">
            <div class="carousel-caption">
             <!-- Área de seleção abaixo do SlideShow -->
             <div class="alinha" style="display: flex;flex-direction: column;width: 100%">
              <div>
                <h3 class="pr">Sobre o que você pode publicar:</h3><br>
              </div>
              <br>
              <div style="display: flex;flex-direction: row;justify-content: space-between;">
                <fieldset class="foto1">
                  <button type="button" class="btn btn-info" id="categorias">
                    <img src="../img/saude.png" >
                    <p class="pr"> Saúde
                    </button>  
                  </fieldset>
                  <fieldset class="foto1">
                  <button type="button" class="btn btn-info" id="categorias">
                    <img src="../img/agua.png" >
                    <p class="pr"> Saneamento
                    </button>  
                  </fieldset>

                  <fieldset class="foto1">
                    <button type="button" class="btn btn-info" id="categorias">
                      <img src="../img/educacao.png" >
                      <p class="pr"> Educação
                      </button>
                    </fieldset>

                    <fieldset class="foto1">
                      <button type="button" class="btn btn-info" id="categorias">
                        <img src="../img/social.png" >
                        <p class="pr"> Ação Social
                        </button>
                      </fieldset>

                      <fieldset class="foto1">
                        <button type="button" class="btn btn-info" id="categorias">
                          <img src="../img/ambiente.png" >
                          <p class="pr"> Ambiente
                          </button>
                        </fieldset>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Controles de direção (Esquerda e Direita) -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
    </section>
    <section class='second-cta'>
      <div class='section-name' id='sec-contact'></div>
      <div class='section-title negative'>Comece a participar!</div>
      <button class='button-sec-cta'>GO!</button>
    </section>
    <section class='footer'>
      </svg>
      <div class='copy'>&copy;2018. Fórum Comunitário</div>
    </section>
  </div>
</div>

 


      </body>
      </html>