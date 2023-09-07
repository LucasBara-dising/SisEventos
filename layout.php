<?php
    include 'Evento.php';
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
        
        $opcao = (int)readline("Qual sua opção?");
        
        switch ($opcao) {
            case 1:
                CriaShow();
                break;
                
            case 2:
                $show=new Show;
                $show->ExibeTodosShow();
                break;
                
            case 3:
                //TO DO não acessa o a função 
                $dadoFiltroShow = readline("Palavra Chave");
                ExibeUmShow($dadoFiltroShow);
                break;
            
            default:
                echo("opção Invalida\n");
                menu();
            break;
        }
    }


    function CriaShow(){
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
        $evento = new Show($local, $data, $hora, $previsaoDePublico, $preco, $descricao, $cantor, $tipoDeMusica);

    }
    
?>