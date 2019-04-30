<?php

include_once('megasena.php');

//Header
echo '<body>
<div class="svg-container">
  <svg viewbox="0 0 800 400" class="svg">
    <path id="curve" fill="#50c6d8" d="M 800 300 Q 400 350 0 300 L 0 0 L 800 0 L 800 300 Z">
    </path>
  </svg>
</div>
<br><br><div align="center"><h1>Teste Monetizze</h1></div><br><br>
';
$jogo = new MegaSena(6, 20);
$jogo->gerarJogos();
$jogo->sorteio();
echo $jogo->View();


//Footer
echo "</body><footer>Henrique L. Fernandes</footer>

<style>
@import 'https://fonts.googleapis.com/css?family=Ubuntu:300, 400, 500, 700';

*, *:after, *:before {
  margin: 0;
  padding: 0;
}

.svg-container {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  z-index: -1;
}

svg {
  path {
    transition: .1s;
  }

  &:hover path {
    d: path('M 800 300 Q 400 250 0 300 L 0 0 L 800 0 L 800 300 Z');
  }
}

body {
  background: #fff;
  color: #333;
  font-family: 'Ubuntu', sans-serif;
  position: relative;
}

h3 {
  font-weight: 400;
}

header {
  color: #fff;
  padding-top: 10vw;
  padding-bottom: 30vw;
  text-align: center;
}

main {
  background: linear-gradient(to bottom, #ffffff 0%, #dddee1 100%);
  border-bottom: 1px solid rgba(0, 0, 0, .2);
  padding: 10vh 0 80vh;
  position: relative;
  text-align: center;
  overflow: hidden;

  &::after {
    border-right: 2px dashed #eee;
    content: '';
    position: absolute;
    top: calc(10vh + 1.618em);
    bottom: 0;
    left: 50%;
    width: 2px;
    height: 100%;
  }
}

footer {
  background: #dddee1;
  padding: 5vh 0;
  text-align: center;
  position: relative;
}

small {
  opacity: .5;
  font-weight: 300;

  a {
    color: inherit;
  }
}
table, td, th {
  border: 1px solid black;
  background-color: green;
} 
</style>";
