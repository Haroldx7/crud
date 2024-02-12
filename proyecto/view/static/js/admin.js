let btnEditar = document.querySelectorAll('#btn-editar');
let main = document.querySelector('main');
let iniciar = document.querySelector('.iniciar');
let datosDireccion = document.querySelectorAll('.r-v-v');
let iniciarCrear = document.querySelector('.iniciar-crear');
let barraBusqueda = document.querySelector('.barra-busqueda');
let cancelar = document.querySelectorAll('#r-v-btn-cancelar');
let guardar = document.querySelectorAll('#r-v-btn-guardar');
let datos = document.querySelectorAll('.datos');
let busqueda = document.querySelector('#busqueda');
let direccion = document.querySelectorAll('#direccion');
let botones = document.querySelector('.botones');
let btnCrear = document.querySelector('#btn-crear');
let btnCancelarCrear = document.querySelector('#r-btn-cambio');
let btnConsultar = document.querySelector('#btn-consultar');
let consultaDatos = document.querySelector('.consulta-datos');
let ConsutlaContenedor = document.querySelector('.consulta');
let btnCancelarConsulta = document.querySelector('#btn-cancelar-c');
let btnConsultaDatos = document.querySelector('#btn-consulta-c');
const numInputs = 5;

direccion.forEach(function(btndireccion){
   btndireccion.addEventListener('click', function(){
      let ventana = document.querySelector('.r-ventana');
      ventana.style.display = 'flex'
   });
});
   


cancelar.forEach(function(btncancelar){
   
   btncancelar.addEventListener('click', function(e){

      e.preventDefault();
      let ventana = document.querySelector('.r-ventana');
      ventana.style.display = 'none';
      datosDireccion.forEach(function(element){
         if(element.type === 'number'){
            element.value = '';
            for(let i = 1; i <= numInputs; i++){    
               if(element.dataset.id = i){
                   console.log("Id del elemento", element.dataset.id);
                   console.log(element.value);
                   document.querySelector(`#a-input-${i}`).innerHTML = "";
                   element.style.background = "white";
               }
           }
   
         }
      });
   });
});



guardar.forEach(function(btnguardar){
   btnguardar.addEventListener('click', function(e){
      e.preventDefault();
      let ventana = document.querySelector('.r-ventana');
      let direCompleta = [];
      
      let direccion = document.querySelectorAll('#direccion');
      datosDireccion.forEach(element => {
          
          if(element.type  === 'number'){
              if(validator.isNumeric(element.value) && validator.isLength(element.value, {min: 1, max: 100})){
                  direCompleta.push(element.value);
                  for(let i = 1; i <= numInputs; i++){    
                      if(element.dataset.id = i){
                          console.log("Id del elemento", element.dataset.id);
                          console.log(element.value);
                          document.querySelector(`#a-input-${i}`).innerHTML = "Esta bien";
                          element.style.background = "blue";
                      }
                  }
              }else{
                  for(let i = 1 ; i <= numInputs; i++){
                      if(element.dataset.id == i){
                          console.log("dsdsdsdds", i)
                          document.querySelector(`#a-input-${i}`).innerHTML = "Esta mal";
                          element.style.background = "red";
                      }
                  }
                  element.value = "";
              }
          }else{
              direCompleta.push(element.value);
          }
          
      });
      let formValor = direCompleta.join(" ");
      direccion.forEach(function(textodireccion){
         textodireccion.value = formValor.trim();
      });
      
      ventana.style.display = 'none';
      datosDireccion.forEach(function(element){
         if(element.type === 'number'){
            element.value = '';
            for(let i = 1; i <= numInputs; i++){    
               if(element.dataset.id = i){
                   console.log("Id del elemento", element.dataset.id);
                   console.log(element.value);
                   document.querySelector(`#a-input-${i}`).innerHTML = "";
                   element.style.background = "white";
               }
           }
   
         }
      });
   });
});


let btnCancelar = document.querySelector('#r-btn-cancelar').addEventListener('click', function(){
   main.classList.toggle('cambio');
   iniciar.classList.toggle('cambio');
   botones.classList.toggle('cambio');
   barraBusqueda.style.display = 'flex';
});


function click(boton){
   return function(){
      editar(boton);
   }
}


btnEditar.forEach(function(boton){
   boton.addEventListener('click', click(boton));
});


function editar(boton){
   let idUsuario = boton.parentElement.parentElement.querySelector('#idUsuario').value;
   let campo = document.querySelectorAll('.f-campo');
   barraBusqueda.style.display = 'none';
   let id = {
      idU: idUsuario
   };
   main.classList.toggle('cambio');
   iniciar.classList.toggle('cambio');
   botones.classList.toggle('cambio');
   
   fetch('./../controller/controllerQuerys/mostrarDatosUsuario.php', {
      method: 'POST',
      headers:{
         'Content-Type': 'application/json'
      },
      body: JSON.stringify(id)
   }).then((response)=>{
      if(response.ok){
         return response.json();
      }else{
         console.log("Mal");
      }
   }).then((data)=>{
      let idusuario = data.id;
      let nombres = data.nombres;
      let apellidos = data.apellidos;
      let tipodocumento = data.tipodocumento;
      let documento = data.documento;
      let direccion = data.direccion;
      let telefono = data.telefono;
      let ciudad = data.ciudad;
      let barrio = data.barrio;
      let tipologia = data.tipologia;
      let observacion = data.observacion;
      let correo = data.correo;
      let contrasena = data.contrasena;
      let rol = data.rol;
      let estado = data.estado;
      let destipdoc = data.destipdoc;
      let nomciu = data.nomciu;
      let nombar = data.nombar;
      let nomtip = data.nomtip;
      let nomrol = data.nomrol;
      campo.forEach(function(input){
         if(input.name == 'id'){
            input.value = idusuario;
         }else if(input.name == 'nomrol'){
            input.value = nomrol;
         }else if(input.name == 'nombres'){
            input.value = nombres;
         }else if(input.name == 'apellidos'){
            input.value = apellidos;
         }else if(input.name == 'tipodoc'){
            let tipoInput = document.querySelectorAll('.tipodoc');
            tipoInput.forEach(function(tipo){
               if(tipo.value == tipodocumento){
                  tipo.setAttribute('selected', 'secleted');
               }
            })
         }else if(input.name == 'numerodoc'){
            input.value = documento;
         }else if(input.name == 'direccion'){
            input.value = direccion;
         }else if(input.name == 'telefono'){
            input.value = telefono;
         }else if(input.name == 'ciudad'){
            let tipoInput = document.querySelectorAll('.ciudad');
            tipoInput.forEach(function(tipo){
               if(tipo.value == ciudad){
                  tipo.setAttribute('selected', 'secleted');
               }
            })
         }else if(input.name == 'barrio'){
            let tipoInput = document.querySelectorAll('.barrio');
            tipoInput.forEach(function(tipo){
               if(tipo.value == barrio){
                  tipo.setAttribute('selected', 'secleted');
               }
            })
         }else if(input.name == 'tipologia'){
            let tipoInput = document.querySelectorAll('.tipologia');
            tipoInput.forEach(function(tipo){
               if(tipo.value == tipologia){
                  tipo.setAttribute('selected', 'secleted');
               }
            })
         }else if(input.name == 'correo'){
            input.value = correo;
         }else if(input.name == 'contrasena'){
            input.value = contrasena;
         }else if(input.name == 'observacion'){
            input.value = observacion;
         }else if(input.name == 'rol'){
            input.value = rol;
         }else if(input.name = 'estado'){
            let tipoInput = document.querySelectorAll('.estado');
            tipoInput.forEach(function(tipo){
               if(tipo.value == estado){
                  tipo.setAttribute('selected', 'secleted');
               }
            })
         }else if(input.name = 'id'){
            input.value = idusuario;
         }
      });
      
   }).catch((e)=>{
      console.log(e)
   })

}


busqueda.addEventListener('input', function(){
   const textoBusqueda = busqueda.value.toLowerCase().trim();
   datos.forEach(function(element){
      
      let spans = element.querySelectorAll('span');
      let encontrado = false;
      spans.forEach(function(span) {
         let texto = span.textContent.toLowerCase().trim();
         if (texto.includes(textoBusqueda)) {
            encontrado = true;
         }
      });
      element.style.display = encontrado ? 'grid' : 'none';
   });
});




btnCancelarConsulta.addEventListener('click', function(){
   main.classList.toggle('cambio');
   botones.classList.toggle('cambio');
   consultaDatos.classList.toggle('cambio');
   ConsutlaContenedor.classList.toggle('cambio');
   barraBusqueda.style.display = 'flex';
});

function mostarOcularCrear(){
   main.classList.toggle('cambio');
   botones.classList.toggle('cambio');
   iniciarCrear.classList.toggle('cambio');
   barraBusqueda.style.display = 'none';
}

function mostarOcularCrearM(){
   main.classList.toggle('cambio');
   botones.classList.toggle('cambio');
   iniciarCrear.classList.toggle('cambio');
   barraBusqueda.style.display = 'flex';
}

function mostarOculatarConsultar(){
   main.classList.toggle('cambio');
   botones.classList.toggle('cambio');
   consultaDatos.classList.toggle('cambio');
   ConsutlaContenedor.classList.toggle('cambio');
   barraBusqueda.style.display = 'none';
}

btnConsultar.addEventListener('click', function(){
   mostarOculatarConsultar();
})

btnCrear.addEventListener('click', function(){
   mostarOcularCrear();
})
btnCancelarCrear.addEventListener('click', function(){
   mostarOcularCrearM();
})


btnConsultaDatos.addEventListener('click', function(){
   let cajaConsulta  = document.querySelector('.caja-consulta');
   let inputConsulta = cajaConsulta.querySelectorAll('input');
   let datos = {};
   inputConsulta.forEach(function(input){
      datos[input.name] = input.value;
   });
   let estadoConsulta = cajaConsulta.querySelector('#estado-con');
   datos[estadoConsulta.name] = estadoConsulta.value;

   fetch('./../controller/controllerQuerys/mostrarDatosConsulta.php',{
      method: 'POST',
      headers:{
         'Content-Type': 'application/json'
      },
      body: JSON.stringify(datos)

   }).then(response=>{
      if(response.ok){
         return response.json();
      }
      
   }).then(datos=>{
      let datosConsulta = datos;
      let cuerpoConsulta = document.querySelector('.cuerpo-consulta');
      let html = '';
      datosConsulta.forEach(function(dato){
         html +=`
         <div class='datos'>
         <span class='span1'>${dato.id}</span>
         <span class='span2'>${dato.nombres +" "+ dato.apellidos}</span>
         <span class='span3'>${dato.telefono}</span>
         <span class='span4'>${dato.tipologia}</span>
         <span class='span5'>${dato.documento}</span>
         <span class='span6'>${dato.direccion}</span>
         <span class='span7'>${dato.estado}</span>
         <input type='hidden' id='idUsuario' value='${dato.id}'>
         <span><button class='btn-editar cambio-barra' id='btn-editar'>editar</button></span>
         </div>
         `;
      });
      
      cuerpoConsulta.innerHTML = html;
      btnEditar = document.querySelectorAll('#btn-editar');
      btnEditarEsconder = document.querySelectorAll('.btn-editar');


      btnEditarEsconder.forEach(function(boton){
         boton.addEventListener('click', function(){
            consultaDatos.classList.toggle('cambio');
            ConsutlaContenedor.classList.toggle('cambio');
            main.classList.toggle('cambio');
            botones.classList.toggle('cambio');
         })
      });

      btnEditar.forEach(function(boton){
         boton.addEventListener('click', click(boton));
      });
      
      let cambioBarra = document.querySelectorAll('.cambio-barra');
      cambioBarra.forEach(function(boton){
         boton.addEventListener('click', function(){
            
         })
      })
   });   
});
