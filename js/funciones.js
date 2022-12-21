const formulariop = document.querySelector('#form');



//definicion del evento Submit
formulariop.addEventListener('submit', (e) => {
    e.preventDefault();
    var tipo_doc = document.getElementById("tipo_doc").value;
    var documento = document.getElementById("documento").value;
    var fecha = document.getElementById("fecha").value;
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var sexo = document.getElementById("sexo").value;

    if (tipo_doc == '' || documento == '' || fecha == '' || nombre == '' || apellidos == '' || sexo == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Los campos no pueden ir vacios'
        })
        formulariop.reset();
    } else {
        const datos = new FormData(formulariop);
        var url = './modelo/llamarfuncion.php';

        fetch(url, {
                method: 'POST',
                body: datos
            }).then(data => data.json())
            .then(data => {

                for (let item of data) {
                    var cons = item.consecutivo;
                    var tipo = item.tipo_doc;
                    var doc = item.documento;
                    var fec = item.fecha;
                    var nom = item.nombre;
                    var ape = item.apellidos;
                    var sexo = item.sexo;

                }
                Swal.fire({
                    icon: 'success',
                    title: 'OK',
                    text: 'Registro Insertado',
                    html: `${cons}<br>${tipo}<br>${doc}<br>${fec}<br>${nom}<br>${ape}<br>${sexo}`
                })
                formulariop.reset();

            }).catch(function(error) {
                alert(error);

            });

    }



});