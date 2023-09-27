<?php

    require 'vendor/autoload.php';
    
    $dados = "<html>";
    $dados .= "<head>";
    $dados .= "<link rel='stylesheet' href='http://localhost/dompdf/css/custom.css'>";
    $dados .= "<title>Gerando pdf </title>";
    $dados .= "</head>";
    $dados .= "<body>";
    $dados .= "<h1>Como gerar pdf com php</h1>";
    $dados .= "<br>";
    
    include_once './conexao.php';
    $query = "SELECT login, senha FROM usuarios";
    $result = $conn->prepare($query);
    $result->execute();
    
    //vamos ler os registros
    while ($row_usuario = $result->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_usuario);
        extract($row_usuario);
        $dados .=  "LOGIN: $login<br>";
        $dados .=  "SENHA: $senha<br>";
        $dados .=  "<hr>";
    }
   
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    $dompdf = new Dompdf(['enable_remote' => TRUE]);
    
    
    
    //aqui o css é inline
    //$dados .= "<img src='http://localhost/dompdf/images/img.jpg' style='width: 150px; height: 150px'>";
    
    //vamos criar um css externo
    $dados .= "<img src='http://localhost/dompdf/images/img.jpg'>";
    //$dados .= "<a href='gerar_pdf.php'>Clique aqui para gerar pdf</a>";
    $dados .= "<br>";
    
    $dados .= "teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste teste php teste ";
    $dados .= "</body>";
    $dados .= "</html>";
    

//$dados .= "<h1>Teste de geração de pdf</h1>";
    //
    
    $dompdf->loadHtml($dados);
    $dompdf->setPaper('A4');
    $dompdf->render();
    $dompdf->stream();
    
?>