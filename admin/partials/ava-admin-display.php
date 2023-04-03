<div class="update-nag notice notice-warning inline">Actualiza ahora.</div>
<div class="wrap">
    <h1>Agregar valor a KPI de Dashboard</h1>

    <!-- -->
    <table class="form-table" role="presentation">
        <tbody>
            
            <!-- Lista desplegable para seleccionar el indicador -->
            <tr>
                <th scope="row"><label for="kpi">Seleccione el indicador</label></th>
                <td>
                    <select name="kpi" id="kpi">

                        <?php

                        $list_kpis = $this->get_list_kpis();

                        foreach ($list_kpis as $kpi){
                            ?>
                            <option value="<?php echo $kpi->id; ?>"><?php echo $kpi->name_kpi; ?></option>
                            <?php
                        }

                        ?>

                    </select>
                    <p class="description hide-kpi" id="tagline-description">Seleccione el indicador del que va a agregar el valor.</p>
                    <p class="description show-kpi" id="tagline-description">Seleccione</p>
                </td>
            </tr>

            <!-- ID del indicador -->
            <tr>
                <th scope="row"><label for="id">ID del indicador</label></th>
                <td>
                    <input name="id" type="text" id="id" value="" class="regular-text" readonly>
                    <p class="description" id="tagline-description">ID con el que se identifica este tipo de indicador en la base de datos.</p>
                </td>
            </tr>

            <!-- Clave del indicador -->
            <tr>
                <th scope="row"><label for="key-kpi">Clave del indicador</label></th>
                <td>
                    <input name="key-kpi" type="text" id="key-kpi" value="" class="regular-text" readonly>
                    <p class="description" id="tagline-description">Clave con el que se identifica este tipo de indicador en la base de datos.</p>
                </td>
            </tr>
        
        </tbody>
    </table>
    
</div>