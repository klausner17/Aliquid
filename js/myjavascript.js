
//função antiga para verificar se a data a valida, porem nao eh usada 
/*function verificarDia(){
	var combo = document.getElementsByTagName("select")[0];
	var mes = document.getElementsByTagName("select")[1].value;
	console.log(mes);
	if (mes == 1)
	{
		var ano = document.getElementsByTagName("select")[2].value;
		if (ano % 4 == 0)
		{
			if(ano % 100 != 0)
			{
				console.log("ano bissexto");
				for (i = 1; i <= 29; i++)
				{
					var dia = document.createElement("OPTION");
					dia.value = i;
					dia.innerHTML = i;
					document.getElementsByTagName("select")[0].appendChild(dia);
				}
			}
			else
			{
				for (i = 1; i <= 28; i++)
				{
					console.log("ano nao bissexto");
					var dia = document.createElement("OPTION");
					dia.value = i;
					dia.innerHTML = i;
					document.getElementsByTagName("select")[0].appendChild(dia);
				}
			}
		}
		else
		{
			for (i = 1; i <= 28; i++)
			{
				console.log("ano nao bissexto");
				var dia = document.createElement("OPTION");
				dia.value = i;
				dia.innerHTML = i;
				document.getElementsByTagName("select")[0].appendChild(dia);
			}
		}
	}
	else
	{
		if (mes <= 5)
		{
			if(mes % 2 == 0)
			{
				for (i = 1; i <= 31; i++)
				{
					var dia = document.createElement("OPTION");
					dia.value = i;
					dia.innerHTML = i;
					document.getElementsByTagName("select")[0].appendChild(dia);
				}
			}
			else
			{
				if(mes % 2 == 0)
				{
					for (i = 1; i <= 30; i++)
					{
						var dia = document.createElement("OPTION");
						dia.value = i;
						dia.innerHTML = i;
						document.getElementsByTagName("select")[0].appendChild(dia);
					}
				}
			}
		}
		else
		{
			if (mes > 5)
			{
				if(mes % 2 == 0)
				{
					for (i = 1; i <= 30; i++)
					{
						var dia = document.createElement("OPTION");
						dia.value = i;
						dia.innerHTML = i;
						document.getElementsByTagName("select")[0].appendChild(dia);
					}
				}
			}
			else
			{
				if(mes % 2 == 0)
				{
					for (i = 1; i <= 31; i++)
					{
						var dia = document.createElement("OPTION");
						dia.value = i;
						dia.innerHTML = i;
						document.getElementsByTagName("select")[0].appendChild(dia);
					}
				}
			}
		}
	}
}

function verificaAno(){
	var ano = new Date().getFullYear();
	console.log(ano);
	//preenche o combobox com os ultimos 100 anos
	var combo = document.getElementsByTagName("select")[2];
	for (i = ano; i > ano - 100; i--){
		var option = document.createElement("option");
		option.innerHTML = i;
		option.value = i;
		combo.appendChild(option);
	}
}

function inicializa(){
	verificaAno();
	verificarDia();
}*/

function inserirPost(){
	//coletando string do post
	var postText = document.getElementById("areaPost").value;
	var postLabel = document.createElement("p");
	postLabel.innerHTML = postText;
	//criando a caixa para a inserção
	var div = document.createElement("div");
	div.className="post-area";
	div.appendChild(postLabel);
	document.getElementById("posts").insertBefore(div,document.getElementById("posts").childNodes[0]);
}