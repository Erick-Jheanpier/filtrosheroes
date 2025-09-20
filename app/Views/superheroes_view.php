<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Superhéroes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="container mt-4">

    <h2 class="mb-3">Filtro de Superhéroes por Publisher</h2>

    <!-- Dropdown de Publisher -->
    <form id="filterForm" method="post" action="<?= site_url('superheroes/getByPublisher') ?>">
        <div class="row mb-3">
            <div class="col-md-4">
                <select class="form-select" name="publisher_id">
                    <option value="">Todos</option>
                    <?php foreach($publishers as $pub): ?>
                        <option value="<?= $pub['id'] ?>" <?= (isset($publisher_id) && $publisher_id == $pub['id']) ? 'selected' : '' ?>>
                            <?= $pub['publisher_name'] !== '' ? $pub['publisher_name'] : 'Otros' ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary">OK</button>

                <?php if (isset($heroes)): ?>
                    <a href="<?= site_url('superheroes/exportPdf/'.($publisher_id ?? 0)) ?>" target="_blank" class="btn btn-danger">
                        Exportar PDF
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <!-- Tabla de resultados -->
    <div id="resultTable">
        <?php if(isset($heroes)): ?>
            <table class="table table-bordered">
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
                            <td><?= esc($h['SuperHeroe']) ?></td>
                            <td><?= esc($h['NombreReal']) ?></td>
                            <td><?= esc($h['Genero']) ?></td>
                            <td><?= esc($h['Raza']) ?></td>
                            <td><?= esc($h['Editorial']) ?></td>
                            <td><?= esc($h['ColorOjos']) ?></td>
                            <td><?= esc($h['AlturaCM']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</body>
</html>


