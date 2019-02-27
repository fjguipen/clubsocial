/* enviar datos del formulario - Nueva Reserva */
function submitForm(event){
    event.preventDefault();
        /* variable con todoslos datos del formulario */
        let data = new FormData(document.getElementById("#nueva-reserva"));

        /* enviar mensaje (header/body) al archivo y leer su respuesta */
        fetch('./api', {method: 'POST', body: data})
        
            .then(function(response){
                if (response.ok){
                    return response.text();
                }
                throw new Error(response.statusText);               
            })
            .then(function (response){
                alert(response)
            }).catch(function(err){

            })
}