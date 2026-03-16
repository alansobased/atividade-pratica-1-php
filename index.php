<?php

function questao01(){
    $nome = readline("Digite o nome do aluno: ");
    $notas = [];
    for($i=0;$i<3;$i++){
        $notas[$i] = readline("Digite a nota " . ($i+1) . ": ");
    }
    
    $media = ($notas[0] + $notas[1] + $notas[2])/3;
    
    if($media >= 7){
        echo "Aprovado\n\n";
    } else if($media >=5){
        echo "Recuperação\n\n";
    } else {
        echo "Reprovado\n\n";
    }
}

function questao02(){
    $alunos = [];
    
    for($i=0;$i<3;$i++){
        
        $nome = readline("Digite o nome do aluno " . ($i+1) . ": ");
        
        $soma = 0;
        for($j=0;$j<3;$j++){
            $nota = readline("Digite a nota " . ($j+1) . " de $nome: ");
            $soma+=$nota;
        }
        
        $alunos[$nome] = ($soma/3);
    }
     $maiorMedia = -1;
        $menorMedia = 11;
        $alunoMaior = "";
        $alunoMenor = "";

        foreach($alunos as $nome => $media){
        
            if($media > $maiorMedia){
                $maiorMedia = $media;
                $alunoMaior = $nome;
            }

            if($media < $menorMedia){
                $menorMedia = $media;
                $alunoMenor = $nome;
            }
        }

        echo "\nAluno com MAIOR média: $alunoMaior ($maiorMedia)\n";
        echo "Aluno com MENOR média: $alunoMenor ($menorMedia)\n";
        
}

function questao03(){
	$cardapio = [
		1 => ["produto" => "X-Burguer", "preco" => 18.00],
		2 => ["produto" => "X-salada", "preco" => 20.00],
		3 => ["produto" => "Batata Frita", "preco" => 15.00],
		4 => ["produto" => "Refrigerante", "preco" => 8.00],
		5 => ["produto" => "Suco Natural", "preco" => 10.00]
	];

	$cliente = readline("Informe o nome do cliente: ");

	echo "\n\n====CARDÁPIO====\n";
	foreach($cardapio as $codigo => $item){
		echo "$codigo - {$item['produto']} - R$ " . $item['preco'] . "\n";
	}
	echo "====        ====\n";

	$pedidos = [];
	$total = 0;
	$continuar = "s";

	while($continuar == "s"){
		$pedido = readline("\nDigite o código do produto: ");
		if($codigo < 1 || $codigo > 5){
			echo "Código inválido\n";
			continue;
		}

		$quantidade = readline("Digite a quantidade: ");

		if($quantidade <= 0){
			echo "Quantidade inválida\n";
			continue;
		}

		$produto = $cardapio[$pedido]["produto"];
		$preco = $cardapio[$pedido]["preco"];

		$subtotal = $preco * $quantidade;
		$total = $total + $subtotal;

		$pedidos[] = [
			"produto" => $produto,
			"quantidade" => $quantidade
		];

		$continuar = readline("Deseja adicionar outro produto? (s/n) ");
	}
	
	do {
		echo "\nTotal a pagar: R$ $total\n";
		$pagamento = readline("Informe o valor pago: ");

		if($pagamento < $total){
			echo "Valor insuficiente\n";
		}

	} while($pagamento < $total);

	$troco = $pagamento - $total;

	echo "\n=== RESUMO DO PEDIDO ===\n";
	echo "Cliente: $cliente\n";

	echo "--- PRODUTOS ---\n";
	foreach($pedidos as $p){
		echo "Produto: " . $p["produto"] . "\n";
		echo "Quantidade: " . $p["quantidade"] . "\n";
	}
	echo " ---        ---\n";
	
	echo "Total: R$ " . $total . "\n";
	echo "Valor pago: R$ " . $pagamento . "\n";
	echo "Troco: R$ " . $troco . "\n";
	echo "===                 ===\n";
}


questao01();
questao02();
questao03();

?>
