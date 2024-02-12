let login = document.querySelector('.f-login');
let register = document.querySelector('.f-register');
let inicar = document.querySelector('.iniciar');
let ventana = document.querySelector('.r-ventana');
let datosDireccion = document.querySelectorAll('.r-v-v');
let inputRegistro = register.querySelectorAll('input');



inputRegistro.forEach(function(input){
    if(input.type == 'number'){
        console.log(input)
        input.addEventListener('input', function(){
            
            let numero = input.value;
            if(numero.includes('/^[a-zA-Z]+$/')){
                let nuevoNumero = numero.replace('e', '');
                input.value = nuevoNumero;
                alert("fdfdfdf")
            }
        })  
    }
});



let btnCambio = document.querySelectorAll('#r-btn-cambio');
btnCambio.forEach((boton)=>{
    boton.addEventListener('click', function(){
        login.classList.toggle('cambio');
        register.classList.toggle('cambio');
        inicar.classList.toggle('cambio');
    })
});



let direccion = document.querySelector('#direccion').addEventListener('click', function(){
    ventana.style.display = 'flex'
});

let cancelar = document.querySelector('#r-v-btn-cancelar').addEventListener('click', function(e){
    e.preventDefault();
    ventana.style.display = 'none';
});


let guardar = document.querySelector('#r-v-btn-guardar').addEventListener('click', function(e){
    e.preventDefault();
    let direCompleta = [];
    
    let direccion = document.querySelector('#direccion');
    datosDireccion.forEach(element => {
        const numInputs = 5
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
    direccion.value = formValor.trim();
    datosDireccion.forEach(function(element){
        element.value = '';
    })
});


