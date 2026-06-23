<?php
// Página raiz do site no DigitalOcean App Platform.
//
// Duas funções:
//  1) A presença deste arquivo .php faz o App Platform detectar o runtime PHP
//     (necessário pra que api/bynet.php — o proxy do gateway — funcione).
//  2) Redireciona "/" para a landing do funil.
//
// >>> Se o ponto de entrada real for outro, troque "/b/" abaixo.
//     Ex.: "/type/chat/" para a landing de chat, ou "/pay/checkout.html".
header('Location: /b/', true, 302);
exit;
