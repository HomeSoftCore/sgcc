<table id="advanced_table" class="table nowrap" data-paging="false" data-info="false" data-searching="true">
    <thead>
        <tr>
            <th>Item</th>
            <th>Ponderaci&oacute;n</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>                   
    <?php 
        foreach($calificacionesItems as $item) {
        ?>
        <tr>
            <td><?php echo $item['ITENOMBRE']; ?></td>
            <td><?php echo $item['CITPONDERACION']; ?></td>
            <td><?php echo $item['CITTIPO']; ?></td>
            <td>
                <button type="button" onclick="deleteItem(<?=$item['CITID']?>);" class="btn btn-success">Calificar</i></button>
            </td>
        </tr>

        <?php } ?>
    </tbody>
</table>