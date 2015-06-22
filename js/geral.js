function seleciona(caixa){
	var index = document.getElementById(caixa).selectedIndex;
	var idProduto = document.getElementById(caixa)[index];
	document.getElementById(caixa).value = idProduto.value;	
}