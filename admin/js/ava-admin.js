jQuery(document).ready(function($){

    /**
     * Funcion para botones de eliminar valor
     */
    const btn_delete = function (){

        $("input.button-delete").each(function(index, e){

            $(e).on("click", function(event){

                var id_kpi_delete = $($(event.currentTarget).parents()[1]).find(".column-id-kpi-value").text();
                
                var data_kpi = {
                    action: 'delete_kpi_value',
                    token: object_ajax.token,
                    id_kpi: id_kpi_delete
                };
                $.ajax({
                    url: object_ajax.url,
                    method: 'post',
                    dataType: 'json',
                    data: data_kpi,
                    success: function(res){
                        $($(event.currentTarget).parents()[1]).css("background-color","#ff8f8f")
                
                        setTimeout(function(){
                            $($(event.currentTarget).parents()[1]).remove();
                        }, 1500);                       
                    },
                    error: function(xhr, status) {
                        $( ".sect-notices-ava" ).html('<div class="update-nag notice notice-warning inline">Problemas de conexión con el servidor.</div>');
                    }
                });
            }) 

        });

    }

    /**
     * Funcion para establecer listado de valores.
     */
    const value_kpis = function(kpi_list, callback){

        var string_val = '';

        for (let i = 0; i < kpi_list.length; i++) {
            const element = kpi_list[i];

            string_val += '<tr id="kpi-'+element.id+'" class="kpi-'+element.id+'-hentry">';

            string_val += '<!-- ID valor -->';
            string_val += '<td class="title column-id-kpi-value column-primary" data-colname="ID valor del indicador">';
            string_val += element.id;
            string_val += '</td>';

            string_val += '<!-- ID indicador -->';
            string_val += '<td class="title column-id-kpi column-primary" data-colname="ID indicador">';
            string_val += '<strong>'+element.id_kpi+'</strong>';
            string_val += '</td>';

            string_val += '<!-- Año del indicador -->';
            string_val += '<td class="title column-year-kpi column-primary" data-colname="Año del indicador">';
            string_val += '<strong>'+element.year_value+'</strong>';
            string_val += '</td>';

            string_val += '<!-- Mes del indicador -->';
            string_val += '<td class="title column-month-kpi column-primary" data-colname="Mes del indicador">';
            string_val += '<strong>'+element.per_value+'</strong>';
            string_val += '</td>';

            string_val += '<!-- Valor del indicador -->';
            string_val += '<td class="title column-value-kpi column-primary" data-colname="Valor del indicador">';
            string_val += '<strong>'+element.value+'</strong>';
            string_val += '</td>';

            string_val += '<!-- Boton del indicador -->';
            string_val += '<td class="title column-delete-kpi column-primary" data-colname="Boton del indicador">';
            string_val += '<input type="submit" name="submit" id="delete-kpi-'+element.id+'" class="button button-delete" value="Eliminar">';
            string_val += '</td>';
            
            string_val += '</tr>';
            string_val += '';

        }

        $( "tbody#the-list" ).html( string_val );

        btn_delete();

    }

    /**
     * Funcion para actualizar listado de valores.
     */
    const update_list_values = function(id){
        var data_kpi = {
            action: 'get_kpi_values',
            token: object_ajax.token,
            id_kpi: id
        };
        $.ajax({
            url: object_ajax.url,
            method: 'post',
            dataType: 'json',
            data: data_kpi,
            success: function(res){
                var kpi_values = res.data;
                value_kpis(kpi_values);
            },
            error: function(xhr, status) {
                $( ".sect-notices-ava" ).html('<div class="update-nag notice notice-warning inline">Problemas de conexión con el servidor.</div>');
            }
        });
    }

    /**
     * Funcion cuando se cambia la seleccion del indicador
     */
    $("select#kpi").change(function(event_){
        var currentVal = $(event_.currentTarget).find("option:selected").val();

        update_list_values(currentVal);

        /**
         * Funcion cuando se tienen datos OK.
         */
        const success_kpi = function(kpi_){
            // Ocultar y agregar comentario
            $(".hide-kpi").hide("slow");
            $(".show-kpi").show("slow");
            
            // Notificacion de conexion exitosa
            $( ".sect-notices-ava" ).html('<div class="updated notice is-dismissible"><p>Conexión exitosa.</p><button type="button" class="notice-dismiss"></button></div>');
            
            // Establecer valor de id, clave y comentario
            $(".show-kpi").text(kpi_.comment_kpi);
            $("input#id").val(kpi_.id);
            $("input#key-kpi").val(kpi_.key_kpi);
            
            // Habilitar campos de año y mes
            $("select#year-kpi").prop( "disabled", false );
            $("select#month-kpi").prop( "disabled", false );
            $("input#value-kpi").prop( "disabled", false );
        }

        /**
         * Funcion para obtener un indicador
         */
        var dataSend = {
            action: 'get_kpi',
            token: object_ajax.token,
            id_kpi: currentVal
        };
        $.ajax({
            url: object_ajax.url,
            method: 'post',
            dataType: 'json',
            data: dataSend,
            success: function(res){
                var kpi_ = res.data[0];
                
                success_kpi(kpi_);
            },
            error: function(xhr, status) {
                $( ".sect-notices-ava" ).html('<div class="update-nag notice notice-warning inline">Problemas de conexión con el servidor.</div>');
            }
        });

    });

    /**
     * Function cuando se agrega un valor al indicador
     */
    $("#submit-kpi").on("click", function(e){
        
        // Valor de los campos
        var id_kpi = $("select#kpi").find("option:selected").val();
        var year_value = $("select#year-kpi").val();
        var per_value = $("select#month-kpi").val();
        var value = $("input#value-kpi").val();

        var set_kpi = {
            action: 'set_kpi_value',
            token: object_ajax.token,
            id_kpi: id_kpi,
            year_value: year_value,
            per_value: per_value,
            value: value
        };
        $.ajax({
            url: object_ajax.url,
            method: 'post',
            dataType: 'json',
            data: set_kpi,
            success: function(res){
                update_list_values(id_kpi);
            },
            error: function(xhr, status) {
                $( ".sect-notices-ava" ).html('<div class="update-nag notice notice-warning inline">Problemas de conexión con el servidor.</div>');
            }
        });

    });

})