<!DOCTYPE html>
<html>
<head>
	<title>ERROR</title>
	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Icones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body class="#212121 grey darken-4">

	<div class="container center-align" style="background-color: white;">
			<div class="z-depth-4" style="top: 100px;margin-top: 25%; height: 200px">
				<br><h3>ERROR 404</h3>
				<p>Página não encontrada!</p>
				<a class="btn yellow accent-3 black-text" href="{{ url()->previous() }}">Voltar</a>
			</div>
	</div>
</body>
</html>