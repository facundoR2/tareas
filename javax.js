//listener del div donde depositamos las tareas del servidor
var muestra_tarea = document.getElementById("TareasRecibidas");
var muestra_estado = document.getElementById("EstadosRecibidos");
var bton_borrar= document.getElementById("botonborrar");
function mostrartarea(){
    fetch("http://localhost/tareas/serviciobackend.php",{
        method: 'GET'
    })
    .then(function(respuesta){
        if(respuesta.ok){
            return respuesta.json();
        }
    })
    .then(function(data){
        console.log(data);
        muestra_tarea.innerHTML="";
        muestra_estado.innerHTML="";
        bton_borrar.innerHTML ="";
        let tabla = document.getElementById("tabla");
        let index =0;
        for (let i = 0; i < data.length *Object.keys(data[0]).length; i++) {
            let fila = document.createElement("tr");
            let celda =document.createElement("td");
                celda.textContent=data[Math.floor(index/Object.keys(data[0]).length)][Object.keys(data[0])[index % Object.keys(data[0]).length]];
                //agregar celda a la fila
                fila.appendChild(celda);
                //agregar fila a la tabla.
                tabla.appendChild(celda);
                index++;
            }
            
        }       
    );
}
// creamos los listeners

let formulario = document.getElementById("agenda");
formulario.addEventListener("submit",function(Event){
    Event.preventDefault();
    var texto = document.getElementById("texto").value;
    document.getElementById("texto").innerHTML = texto;
    var estado = document.getElementById("estado").value;
    document.getElementById("estado").innerHTML = estado;
    console.log(texto);
    console.log(estado);
    var formdata = new FormData();
    formdata.append("nombre",texto);
    formdata.append("estado",estado);

    fetch("http://localhost/tareas/serviciobackend.php",{
        method: "POST",
        body: formdata
    })
    .then(function(respuesta){
        if(respuesta.ok){
            return respuesta.json();
        }else{
            throw new Error("respuesta del servidor salio mal");
        }
    })
    .then(function(data){
        console.log(data);
    });
});


function modificartarea(){

}
function marcartareacompletada(){

}
function eliminartarea(){
    
}



