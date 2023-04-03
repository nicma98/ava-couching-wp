<div class="wrap">
    <h1 class="wp-heading-inline">Contacto clientes</h1>
    
    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
                <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Seleccionar todos</label><input id="cb-select-all-1" type="checkbox"></td>
                <th scope="col" id="id-kpi" class="manage-column column-id-kpi column-primary sortable desc"><a href="#"><span>ID</span><span class="sorting-indicator"></span></a></th>
                <th scope="col" id="key-kpi" class="manage-column column-key-kpi sortable desc"><a href="#"><span>Clave Indicador</span><span class="sorting-indicator"></span></a></th>
                <th scope="col" id="name-kpi" class="manage-column column-name-kpi sortable desc"><a href="#"><span>Nombre</span><span class="sorting-indicator"></span></a></th>
                <th scope="col" id="comment-kpi" class="manage-column column-comment-kpi sortable desc"><a href="#"><span>Comnetario</span><span class="sorting-indicator"></span></a></th>
            </tr>
        </thead>

        <tbody id="the-list">

            <?php

            $list_kpis = $this->get_list_kpis();

            foreach ($list_kpis as $kpi) {
                ?>
                <tr id="post-<?php echo $kpi->id; ?>" class="post-<?php echo $kpi->id; ?>hentry">

                    <!-- Check -->
                    <th scope="row" class="check-column">
                        <input id="cl-select-<?php echo $kpi->id; ?>" type="checkbox" name="" value="<?php echo $kpi->id; ?>">
                    </th>

                    <!-- ID indicador -->
                    <td class="title column-id-kpi column-primary" data-colname="ID indicador">
                        <strong><?php echo $kpi->id; ?></strong>
                    </td>

                    <!-- Clave del indicador -->
                    <td class="title column-key-kpi column-primary" data-colname="Clave del indicador">
                        <strong><?php echo $kpi->key_kpi; ?></strong>
                    </td>

                    <!-- Nombre del indicador -->
                    <td class="title column-name-kpi column-primary" data-colname="Nombre del indicador">
                        <strong><?php echo $kpi->name_kpi; ?></strong>
                    </td>

                    <!-- Comentario del indicador -->
                    <td class="title column-comment-kpi column-primary" data-colname="Comentario del indicador">
                        <strong><?php echo $kpi->comment_kpi; ?></strong>
                    </td>

                    </tr>
                <?php
            }

            ?>

            
        </tbody>

        <tfoot>
            <tr>
                <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Seleccionar todos</label><input id="cb-select-all-1" type="checkbox"></td>
                <th scope="col" id="id-kpi" class="manage-column column-id-kpi column-primary sortable desc"><a href="#"><span>ID</span><span class="sorting-indicator"></span></a></th>
                <th scope="col" id="key-kpi" class="manage-column column-key-kpi sortable desc"><a href="#"><span>Clave Indicador</span><span class="sorting-indicator"></span></a></th>
                <th scope="col" id="name-kpi" class="manage-column column-name-kpi sortable desc"><a href="#"><span>Nombre</span><span class="sorting-indicator"></span></a></th>
                <th scope="col" id="comment-kpi" class="manage-column column-comment-kpi sortable desc"><a href="#"><span>Comnetario</span><span class="sorting-indicator"></span></a></th>
            </tr>
        </tfoot>

    </table>
</div>