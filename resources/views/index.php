<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Calc Proj</title>
    <style>
		<?php
			include 'css/inic.css';
		?>
	</style>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
</head>
<body>
    <div id="container" class="container">
        <div class="title">
            <h1> Calc Proj </h1>
        </div>
        <div class="cont-din">
            <div id="form-dv">
                <label> Capital inicial (R$) <span> * </span> </label>
                </br>
                <input name="capital" v-model="capital" required="true"/>
                </br></br>

                <label> Valor dos juros (0-100%) <span> * </span></label>
                </br>
                <input name="juros" v-model="juros" required="true"/>
                </br></br>

                <label> Tempo de aplicação (meses) <span> * </span></label>
                </br>
                <input name="tempo" v-model="tempo" required="true"/>
                </br></br>

                <button v-on:click="calcularMontante()"> Calcular </button>
            </div>
                    
            <label id="resultado" name="montante">
                <h2> R$  {{ montante }} </h2>
            </label>	
        </div>        
    </div>

    <footer>
        <h3> Desenvolvido por Thiago Ferreira </h3>
    </footer>
     
    

    <script>
        let rooter= 
        new Vue({
            el: '#container',
            data: {
                capital: "",
                juros: "",
                tempo: "",
                montante: 0
            },
            methods: {

                calcularMontante(){
                    console.log(this.capital, this.juros, this.tempo);
                    fetch("http://localhost:8182/api/calcular", {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            "capital": this.capital,
                            "juros": this.juros,
                            "tempo": this.tempo
                        })
                    })
                    .then(function(aser){
                        return aser.json();
                        //console.log(aser);
                    })
                    .then(function(resDefin){
                        console.log(resDefin);
                        rooter.montante= parseFloat(resDefin.montante.toFixed(2));         
                    });
                }
            }
        })
    </script>
</body>
</html>
