<h2>Listado de Superhéroes</h2>
<table border="1" cellspacing="0" cellpadding="4" width="100%">
    <thead>
        <tr>
            <th>Superhéroe</th>
            <th>Nombre Real</th>
            <th>Género</th>
            <th>Raza</th>
            <th>Editorial</th>
            <th>Color Ojos</th>
            <th>Altura (cm)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($heroes as $h): ?>
            <tr>
                <td><?= $h['SuperHeroe'] ?></td>
                <td><?= $h['NombreReal'] ?></td>
                <td><?= $h['Genero'] ?></td>
                <td><?= $h['Raza'] ?></td>
                <td><?= $h['Editorial'] ?></td>
                <td><?= $h['ColorOjos'] ?></td>
                <td><?= $h['AlturaCM'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

