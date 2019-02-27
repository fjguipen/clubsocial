window.onload = () =>{
    try{
        let newSocio = document.getElementById("newSocio");
        let form1 = document.getElementById("form1")
        let form2 = document.getElementById("form2")
    } catch (err) {

    }
}

const alfalfa = () => {
    if (newSocio.checked){
        form1.classList.add("none")
    } else {
        form1.classList.remove("none")
    }
}

/* enviar datos del formulario - Nueva Reserva */
function submitForm(event){
    event.preventDefault();
        let action = newSocio.checked ? "registrar" : "reservar";
        /* variable con todoslos datos del formulario */
        let data = new FormData(document.getElementById("nueva-reserva"));
        data.append("action", action);

        /* enviar mensaje (header/body) al archivo y leer su respuesta */
        fetch('http://localhost/clubsocial/api/api.php', {method: 'POST', body: data})
        
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

function getFactura(event){
    //event.preventDefault();
        let data = new FormData(event.target);
        data.append("action", "factura");

        /* enviar mensaje (header/body) al archivo y leer su respuesta */
        fetch('http://localhost/clubsocial/api/api.php', {method: 'POST', body: data})
        
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