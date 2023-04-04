jQuery(document).ready(function($){
    
    function mangeClientes(){
        
        console.log('first')

        $("select#kpi").change(function(event_){
            var currentVal = $(event_.currentTarget).find("option:selected").val();

            //console.log();

            var dataSend = {
                action: 'get_kpi',
                token: object_ajax.token,
                id_kpi: currentVal
            }

            $.ajax({
                url: object_ajax.url,
                method: 'post',
                dataType: 'json',
                data: dataSend,
                success: function(data){
                    console.log(data)
                },
                error: function(xhr, status) {
                    console.log(xhr)
                    console.log(status)
                }
            });
        });

    }

    mangeClientes();

})