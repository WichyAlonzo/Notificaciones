<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Datos</title>
</head>
<body>
    <h2>Ingresa tus datos:</h2>
    <form id="data-form" method="post" action="procesar_notify.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" required><br><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
