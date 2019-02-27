/* enviar datos del formulario - Nueva Reserva */
function submitForm(event){
    event.preventDefault();
        /* variable con todoslos datos del formulario */
        let data = new FormData(document.getElementById("nueva-reserva"));
        data.append("action", "reservar");

        /* enviar mensaje (header/body) al archivo y leer su respuesta */
        fetch('http://localhost/clubsocial/api/api.php ', {method: 'POST', body: data})
        
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