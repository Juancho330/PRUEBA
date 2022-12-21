const editar = (cons) => {

    var url = "./modelo/llamarfuncion.php";
    var formData = new FormData();
    formData.append('tipo_operacion', 'editar');
    formData.append('cons', cons);
    fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(data => data.json())
        .then(data => {
            console.log('ok', data);
            for (let item of data) {
                var cons = item.consecutivo;
                var tipo = item.tipo_doc;
                var doc = item.documento;
                var fec = item.fecha;
                var nom = item.nombre;
                var ape = item.apellidos;
                var sexo = item.sexo;

                if (sexo == 'Masculino') {
                    var sex = `
                        <select name="sexou" class="form-control">
                            <option value="Masculino" selected>Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    `;
                } else if (sexo == 'Femenino') {
                    var sex = `
                    <select name="sexou" class="form-control">
                        <option value="Masculino" >Masculino</option>
                        <option value="Femenino" selected>Femenino</option>
                    </select>`;
                }

            } //VENTANA MODAL DE SWEET ALERT
            Swal.fire({
                title: 'Actualizar Informacion',
                html: `<form id="actualizar_form">
                            <input type="text" value="update" name="tipo_operacion" hidden="true">
                            <input value="${cons}" name="consac" hidden="true" type="text" class="form-control" placeholder="Nro documento"><br>
                            <select name="tipoac" class="form-control">
                                <option value="${tipo}">${tipo}</option>
                                <option value="CC">Cedula de ciudadania</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="CE">Cedula de extranjeria</option>
                                <option value="RC">Registro Civil</option>
                                <option value="NIT">Nit</option> 
                            </select><br>
                            <input value="${doc}" type="text" name="docac" class="form-control" placeholder="Digite su numero de identidad"><br>
                            <input value="${fec}" type="text" name="fecac" class="form-control" placeholder="Digite la fecha"><br>
                            <input value="${nom}" type="text" name="nomac" class="form-control" placeholder="Digite su nombres"><br>
                            <input value="${ape}" type="text" name="apeac" class="form-control" placeholder="Digite su apellidos"><br>
                                ${sex}
                        </form>`,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Actualizar'
            }).then((result) => {
                if (result.isConfirmed) {
                    const datos = document.querySelector("#actualizar_form");
                    const datos_actualizar = new FormData(datos);
                    var url = "./modelo/llamarfuncion.php";
                    fetch(url, {
                            method: 'POST',
                            body: datos_actualizar
                        })
                        .then(data => data.json())
                        .then(data => {
                            console.log('exito', data);
                            pintar_tabla_resultados(data);
                            Swal.fire(
                                'Actualizado',
                                'El registro ha sido Actualizado',
                                'success'
                            )
                        })
                        .catch(function(error) {
                            console.log('error', error);

                        });


                }

            }).catch(function(e) {
                console.log(e);
            });


        })
        .catch(function(e) {
            console.log(e);
        });
}




const pintar_tabla_resultados = (data) => {
    let tab_datos = document.querySelector("#tabla_persona");
    tab_datos.innerHTML = "";
    for (let item of data) {
        tab_datos.innerHTML += `
            <tr>
                <td>${item.consecutivo}</td>
                <td>${item.tipo_doc}</td>
                <td>${item.documento}</td>
                <td>${item.fecha}</td>
                <td>${item.nombre}</td>
                <td>${item.apellidos}</td>
                <td>${item.sexo}</td>
                <td>
                    <button onClick='' class='btn btn-primary btn-sm'>Editar</button>
                    <button onClick='' class='btn btn-primary btn-sm'>Eliminar</button>
                </td>
            </tr>`;


    }


}

const eliminar = (cons) => {
    Swal.fire({
        title: 'Esta seguro de eliminar el registro?',
        text: "Esta operacion no es reversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "./modelo/llamarfuncion.php";
            var formData = new FormData();
            formData.append('tipo_operacion', 'eliminar');
            formData.append('cons', cons);
            fetch(url, {
                    method: 'post',
                    body: formData
                }).then(data => data.json())
                .then(data => {
                    Swal.fire(
                        'Eliminado',
                        'El registro se ha eliminado correctamente.',
                        'sucess'
                    )
                })
                .catch(error => console.error('Error', error));
        }
    })


}