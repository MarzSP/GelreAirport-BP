<?php

function renderVluchtInformatieTabel($data)
{
    ?>
    <!-- Tabel in linker container met de actuele vlucht informatie uit de View -->
    <div class="vlucht-tabel-container">
    <table>
        <thead>
        <tr>
            <th>Tijd</th>
            <th>Vluchtnummer</th>
            <th>Bestemming</th>
            <th>Land</th>
            <th>Maatschappij</th>
            <th>Gate</th>
            <th>Incheck_balie</th>
        </tr>
        </thead>
        <tbody><?php
        foreach ($data as $row) { ?>
            <tr>
                <td><?= htmlspecialchars($row['vertrektijd'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['vluchtnummer'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['luchthaven_naam'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['land'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['maatschappij_naam'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['gatecode'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row['Incheck_balie'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <!-- zoeken op Vluchtnummer: -->
    </div> <!-- -->
    <?php
}