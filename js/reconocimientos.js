
const urlAdmins = "https://lucianogalusso.github.io/proyectoQuickShip/jason/admins.json";

var getJSONData = function(url){
    var result = {};
    return fetch(url)
    .then(response => {
      if (response.ok) {
        return response.json();
      }else{
        throw Error(response.statusText);
      }
    })
    .then(function(response) {
          result.status = 'ok';
          result.data = response;
          return result;
    })
    .catch(function(error) {
        result.status = 'error';
        result.data = error;
        return result;
    });
}

document.addEventListener("DOMContentLoaded", function (e) {
	
	getJSONData(urlAdmins).then(function(resultObj){
        if (resultObj.status === "ok")
        {
            categoriesArray = resultObj.data;
            //Muestro las categorías ordenadas
            showCategoriesList(categoriesArray);
        }
    });
});

function showCategoriesList(array){

    document.getElementById("admin").innerHTML = "";
    document.getElementById("trabajadores").innerHTML = "";

    fetch(urlAdmins)
        .then(respuesta => respuesta.json())

        .then(datos => {

            let htmlContentToAppendAdmin = "";
            let htmlContentToAppendTrabajadores = "";

            for(let i = 0; i < datos.length; i++){
                let elem = datos[i];

                if (elem.admin) {

                	htmlContentToAppendAdmin += `
	                <li>Nombre:`+ elem.nombre +` <img src="../images/demo/avatar.png" alt=""><br><br>
	                Email de contacto:`+ elem.email +`
	                </li><br>	             
			        `

                }else{

                	htmlContentToAppendTrabajadores += `
	                <li>Nombre:`+ elem.nombre +` <img src="../images/demo/avatar.png" alt=""><br><br>
	                Email de contacto:`+ elem.email +`
	                </li><br>	             
			        `

                }

                
                 

                document.getElementById("admin").innerHTML = htmlContentToAppendAdmin;
                document.getElementById("trabajadores").innerHTML = htmlContentToAppendTrabajadores;
            }

            

        })
        .catch(error => alert("Hubo un error: " + error));
}