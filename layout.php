<?php
#
    include 'Evento';

    //iniciado o array
    $arrayShows = array();
    $arrayPalestra = array();

    menu();
    
    function menu(){
        //limpa da tela quando entrar no menu principal
        LimparTela();
        echo("\n            Crie seu evento");
        echo("\n \n");
        echo("      -----------Evento---------\n");
        echo("      |       1 - Show         |\n");
        echo("      |       2 - Palestras    |\n");
        echo("      |       0 - Sair         |\n");
        echo("      --------------------------\n");
        
        $opcao = (int)readline("Qual sua opção?");
        
        switch ($opcao) {
            case 1:
                menuShow();
                break;
                
            case 2:
                menuPalestra();
                break;
                        
            case 0:
                echo("Saindo...");
                exit();
                break;
            
            default:
                echo("opção Invalida\n");
                menu();
            break;
        }
    }
    
    
    function menuShow(){
        echo("\n");
        echo("\n                Seu Show        ");
        echo("\n \n");
        echo("      ---------------Show----------\n");
        echo("      |      1 - Novo Show        |\n");
        echo("      |      2 - Todos Shows      |\n");
        echo("      |      3 - Numero de Show   |\n");
        echo("      |      0 - Voltar           |\n");
        echo("      -----------------------------\n");
        
        $opcao = (int)readline("Qual sua opção? \n\n");

        switch ($opcao) {
            case 1:
                criaShow();
                menuShow();
                break;
                
            case 2:
                mostraTodos("Show");
                menuShow();
                break;
                
            case 3:
                global $arrayShows;
                if(count($arrayShows)!=0){
                    echo "Existem " . count($arrayShows). " Shows\n";
                }else{
                    echo "Ainda não Existem Shows\n";
                }
                
                menuShow();
                break;
                
            case 0:
                menu();
                break;
            
            default:
                echo("opção Invalida\n");
                menuShow();
            break;
        }
    }

    function menuPalestra(){
        echo("\n");
        echo("\n                Sua Palestra        ");
        echo("\n \n");
        echo("      ---------------Palestra----------\n");
        echo("      |      1 - Novo Palestra        |\n");
        echo("      |      2 - Todos Palestra       |\n");
        echo("      |      3 - Num de Palestra      |\n");
        echo("      |      0 - Voltar               |\n");
        echo("      ---------------------------------\n");
        
        $opcao = (int)readline("Qual sua opção? \n\n");

        switch ($opcao) {
            case 1:
                criaPalestra();
                menuPalestra();
                break;
                
            case 2:
                mostraTodos("Palestra");
                menuPalestra();
                break;
                
            case 3:
                global $arrayPalestra;
                if(count($arrayPalestra)!=0){
                    echo "Existem " . count($arrayPalestra). " Palestra\n";
                }else{
                    echo "Ainda não Existem Palestras\n";
                }

                menuPalestra();
                break;
                
            case 0:
                menu();
                break;
            
            default:
                echo("opção Invalida\n");
                menuPalestra();
            break;
        }
    }


    //cria um obejto de show
    function criaShow(){
        $local = readline("Local do Evento: ");
        
        $dataShow = readline("Data do Evento (dd/mm/aaaa): ");
        if( validaData($dataShow)=="Formato Incorreto"){
            $dataShow = readline("Data do Evento (dd/mm/aaaa): ");
        }
        
        $hora = readline("Hora do Evento: ");
        if(strlen($hora)>5){
            //ex 9h ou 09:00
            $hora = readline("Hora do Evento: ");
        }
        
        $preco = (float)readline("Preço do Evento: ");
        $descricao = readline("Descrição do Evento: ");
        $cantor = readline("Nome do Cantor: ");
        $tipoDeMusica = readline("Tipo de Música: ");

        
        // Criar um objeto da classe Evento
        $show=new Show;
        $show->cadastraShow($local, $dataShow, $hora, $preco, $descricao, $cantor, $tipoDeMusica);

        //mostra dados que foram inscritos
        echo "\n      Evento Criado com sucesso       \n";     
        echo "Local: " . $show->getLocal() . "\n";
        echo "Data: " . $show->getData() . "\n";
        echo "Hora: " . $show->getHora() . "\n";
        echo "Preço: R$" . $show->getPreco() . "\n";
        echo "Descrição: " . $show->getDescricao()  . "\n";
        echo "Cantor: " . $show->getCantor()  . "\n";
        echo "Tipo de Música: " .$show->getTipoDeMusica() . "\n";
        echo "-------------------------------------------\n";

        //adiciona ao array
        global $arrayShows;
        array_push($arrayShows,[
            "Local"=> $show->getLocal(),
            "Data"=> $show->getData(),
            "Hora"=> $show->getHora(),
            "Preco"=> $show->getPreco(),
            "Descricao"=> $show->getDescricao(),
            "Cantor"=> $show->getCantor(),
            "Tipo De Musica"=>$show->getTipoDeMusica()
        ]);
    }


    //cria um obejto de palestra
    function criaPalestra(){
        $local = readline("Local do Evento: ");

        $dataShow = readline("Data do Evento (dd/mm/aaaa): ");
        if( validaData($dataShow)=="Formato Incorreto"){
            $dataShow = readline("Data do Evento (dd/mm/aaaa): ");
        }
        
        //ex 9h ou 09:00
        $hora = readline("Hora do Evento: ");
        if(strlen($hora)>5){
            echo "Formato Incorreto \n";
            $hora = readline("Hora do Evento: ");
        }
    
        $preco = readline("Preço do Evento: ");
        $descricao = readline("Descrição do Evento: ");
        $palestrante = readline("Palestrante do Evento: ");
        $tema = readline("Tema da Palestra: ");
        
        // Criar um objeto da classe Evento
        $palestra=new Palestra;
        $palestra->CadastrarPalestra($local, $dataShow, $hora, $preco, $descricao, $palestrante, $tema);

        //mostra dados que foram inscritos
        echo "\n      Palestra Criada com sucesso       \n";
        echo "Local: " . $palestra->getLocal() . "\n";
        echo "Data: " . $palestra->getData() . "\n";
        echo "Hora: " . $palestra->getHora() . "\n";
        echo "Preço: R$" . $palestra->getPreco() . "\n";
        echo "Descrição: " . $palestra->getDescricao()  . "\n";
        echo "Palestrante do Evento: " . $palestra->getPalestrante()  . "\n";
        echo "Tema do Evento: " .$palestra->getTema() . "\n";
        echo "-------------------------------------------\n";

        //adiciona ao array
        global $arrayPalestra;
        array_push($arrayPalestra,[
            "Local"=> $palestra->getLocal(),
            "Data"=> $palestra->getData(),
            "Hora"=> $palestra->getHora(),
            "Preco"=> $palestra->getPreco(),
            "Descricao"=> $palestra->getDescricao(),
            "Palestrante"=> $palestra->getPalestrante(),
            "Tema"=>$palestra->getTema()
        ]);
    }

    //mostra todos os item cadastrados em cada classe
    function mostraTodos($tema){
        echo("\n");
        switch($tema){
            case "Show":
                global $arrayShows;
                $array=$arrayShows;  
            break;

            case "Palestra":
                global $arrayPalestra;
                $array=$arrayPalestra;  
            break;
            
            default:
                echo("erro ao mostrar todos\n");
            break;
        }

        if(count($array)>0){
            echo("=================Todos os Shows=================\n");
            foreach($array as $key => $value) {
                //abri o arry e depois acesso o sub array
                foreach($value as $key1 => $value1) {
                    echo($key1.": ".$value1."\n");
                }  
            echo("----------------------------------------------\n");     
            }
        }else{
            echo("====================================\n");
            echo("       Ainda não existem eventos    \n");
            echo("====================================\n");
        }
        
    }
    
    function LimparTela(){
        $i=0;
        while($i<=20){
            echo("\n");
            $i++;
        }
    }

    //valida data
    function validaData($date){
        //dd-mm-yyyy
        if(strlen($date)!=10){
            echo("Formato Incorreto\n");
            return "Formato Incorreto";
        }
        else{
            if(strpos($date, "/")){
                $date=str_replace("/","-",$date);
            }
            
            $tempDate = explode('-', $date);
            // checkdate(month, day, year)
            $valid= checkdate($tempDate[1], $tempDate[0], $tempDate[2]);
            
            if($valid!=1){
                echo("Formato Incorreto\n");
                return "Formato Incorreto";
            }
        }
        
    }
?>