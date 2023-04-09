<div class="wrap ava-dashboard">
    
    <div class="sect-notices-ava">
        <!-- Sección para notificaciones dinamicas -->
    </div>

    <h1>Agregar valor a KPI de Dashboard</h1>

    <!-- Formulario para agregar valor al indicador -->
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

            <!-- Año para el valor del indicador -->
            <tr>
                <th scope="row"><label for="year-kpi">Seleccione el año</label></th>
                <td>
                    <select name="year-kpi" id="year-kpi" disabled>

                        <?php

                        for ($i = 0; $i <= 2; $i++){
                            ?>
                            <option value="<?php echo intval(date("Y"))+$i; ?>"><?php echo intval(date("Y"))+$i; ?></option>
                            <?php
                        }

                        ?>

                    </select>
                    <p class="description" id="tagline-description">Año para el valor que vas a agregar.</p>
                </td>
            </tr>

            <!-- Mes para el valor del indicador -->
            <tr>
                <th scope="row"><label for="month-kpi">Seleccione el mes</label></th>
                <td>
                    <select name="month-kpi" id="month-kpi" disabled>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                    <p class="description" id="tagline-description">Mes para el valor que vas a agregar.</p>
                </td>
            </tr>

            <!-- valor del indicador -->
            <tr>
                <th scope="row"><label for="value-kpi">Valor del indicador</label></th>
                <td>
                    <input name="value-kpi" type="number" id="value-kpi" value="" disabled>
                    <p class="description" id="tagline-description">Valor del indicador que debe ser un numero con dos decimales separado por un punto.</p>
                </td>
            </tr>
        
        </tbody>
    </table>

    <!-- boton para guardar -->
    <p class="submit"><input type="submit" name="submit" id="submit-kpi" class="button button-primary" value="Guardar cambios"></p>

    <!-- Tabla con valores de los indicadores -->
    <div class="list-values">
        <table class="wp-list-table widefat fixed striped table-view-list values-kpis">
            <thead>
                <tr>
                <th scope="col" id="id-kpi-value" class="manage-column column-id-kpi-value column-primary"><span>ID</span></th>
                    
                    <th scope="col" id="id-kpi" class="manage-column column-id-kpi"><span>ID Indicador</span></th>
                    
                    <th scope="col" id="year-kpi" class="manage-column column-year-kpi"><span>Año</span></th>
                    
                    <th scope="col" id="month-kpi" class="manage-column column-month-kpi"><span>Mes</span></th>

                    <th scope="col" id="value-kpi" class="manage-column column-value-kpi"><span>Valor</span></th>

                    <th scope="col" id="button-kpi" class="manage-column column-button-kpi"><span>Eliminar</span></th>
                </tr>
            </thead>

            <tbody id="the-list"></tbody>

            <tfoot>
                <tr>
                    <th scope="col" id="id-kpi-value" class="manage-column column-id-kpi-value column-primary"><span>ID</span></th>
                    
                    <th scope="col" id="id-kpi" class="manage-column column-id-kpi"><span>ID Indicador</span></th>
                    
                    <th scope="col" id="year-kpi" class="manage-column column-year-kpi"><span>Año</span></th>
                    
                    <th scope="col" id="month-kpi" class="manage-column column-month-kpi"><span>Mes</span></th>

                    <th scope="col" id="value-kpi" class="manage-column column-value-kpi"><span>Valor</span></th>

                    <th scope="col" id="button-kpi" class="manage-column column-button-kpi"><span>Eliminar</span></th>
                </tr>
            </tfoot>

        </table>
    </div>
    
</div>