<?php
    include 'Evento';

    $arrayShows = array();

    menu();
    
    function menu(){
        echo("\n            Crie seu evento");
        echo("\n \n");
        echo("      -----------Evento---------\n");
        echo("      |       1 - Show         |\n");
        echo("      |       2 - Palestras    |\n");
        echo("      |       3 - Teatro       |\n");
        echo("      --------------------------\n");
        
        $opcao = (int)readline("Qual sua opção?");
        
        switch ($opcao) {
            case 1:
                menuShow();
                break;
                
            case 2:
                CriaPalestra();
                break;
                
            case 3:
                CriaTeatro();
                break;
            
            default:
                echo("opção Invalida\n");
                menu();
            break;
        }
    }
    
    
    function validaData($date){
        //dd-mm-yyyy
        if(strlen($date)!=10){
            echo("Formato Incorreto\n");
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
            }
        }
        
    }
    
    function menuShow(){
        echo("\n                Seu Show        ");
        echo("\n \n");
        echo("      -------------Show---------\n");
        echo("      |      1 - Novo Show     |\n");
        echo("      |      2 - Todos Shows   |\n");
        echo("      |      3 - Buscar Show   |\n");
        echo("      --------------------------\n");
        
        $opcao = (int)readline("Qual sua opção? ");

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
                $dadoFiltroShow = readline("Palavra Chave: ");
                mostraExpecifica("Show", "local");

                menuShow();
                break;
            
            default:
                echo("opção Invalida\n");
                menu();
            break;
        }
    }


    //cria um obejto e mostra seus dados assim que cadastrados
    function criaShow(){
        // Leitura dos dados do evento
        $local = readline("Local do Evento: ");
        $dataShow = readline("Data do Evento: ");

        if( validaData($dataShow)=="Formato Incorreto"){$dataShow = readline("Data do Evento: ");}
    
        $hora = readline("Hora do Evento: ");
        $previsaoDePublico = (int)readline("Previsão de Público: ");
        $preco = (float)readline("Preço do Evento: ");
        $descricao = readline("Descrição do Evento: ");
        $cantor = readline("Nome do Cantor: ");
        $tipoDeMusica = readline("Tipo de Música: ");

        
        // Criar um objeto da classe Evento
        $show=new Show;
        $show->cadastraShow($local, $dataShow, $hora, $previsaoDePublico, $preco, $descricao, $cantor, $tipoDeMusica);

        /*$show->cadastraShow(
            "local",
            "2023-08-24",
            "20:00",
            1000,
            50.00,
            "Descrição do Evento",
            "Cantor do Show",
            "Tipo de Música"
        );*/

        //mostra dados que foram inscritos
        echo "\n      Evento Criado com sucesso       \n";
        echo "Local: " . $show->getLocal() . "\n";
        echo "Data: " . $show->getData() . "\n";
        echo "Hora: " . $show->getHora() . "\n";
        echo "Previsão de Público: " . $show->getPrevisaoDePublico() . "\n";
        echo "Preço: " . $show->getPreco() . "\n";
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
            "PrevisaoDePublico"=> $show->getPrevisaoDePublico(),
            "Preco"=> $show->getPreco(),
            "Descricao"=> $show->getDescricao(),
            "Cantor"=> $show->getCantor(),
            "TipoDeMusica"=>$show->getTipoDeMusica()
        ]);
    }

    //mostra todos os item cadastrados independete da classe
    function mostraTodos($tema){
        switch($tema){
            case "Show":
                global $arrayShows;
                $array=$arrayShows;  
            break;
            
            default:
                echo("erro ao mostrar todos\n");
            break;
        }

        if(count($array)>0){
            echo("--------------------Todos os Shows------------------");
            foreach($array as $key => $value) {
                //abri o arry e depois acesso o sub array
                foreach($value as $key1 => $value1) {
                    echo($key1.": ".$value1."\n");
                }       
            }
        }else{
            echo("\n\n--------------Ainda Não exitem eventos-----------------\n\n");
        }
        
    }

    //TO DO fazer melhorias
    function mostraExpecifica($tema){
        global $dadoFiltroShow;
        echo("--------------------Um especifico------------------\n");
        switch($tema){
            case "Show":
                global $arrayShows;
                $array=$arrayShows; 

                $key = array_search($dadoFiltroShow, array_column($array, "Local")); 
            break;
            
            default:
                echo("erro ao mostrar todos\n");
            break;
        }

        print_r($array[$key]);        
    }
?>