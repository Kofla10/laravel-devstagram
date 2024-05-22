import Dropzone from "dropzone";
var img = document.querySelector('#imagen');


Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu image",
    acceptedFiles     : ".pgn, .jpg, jpeg, .gif",
    addRemoveLinks    : true,
    dictRemoveFile    : "Borrar Archivo",
    maxFiles          : 1,
    uploadMultiple    : false,

    init:function(){
        if(img.value.trim()){
            const imgPublicada = {};
            imgPublicada.size = 1234;
            imgPublicada.name = img.value;

            console.log(imgPublicada.name)
            this.options.addedfile.call(this, imgPublicada);
            this.options.thumbnail.call(this, imgPublicada, `/uploads/${imgPublicada.name}`);

            imgPublicada.previewElement.classList.add('dz-succes', 'dz-complete')
        }
    }
})

// eventos del dropzone

//cuando el carghe del archivo sea exitoso
dropzone.on("success", function(file, response){
    document.querySelector('#imagen').value = response.imagen;
    // imagen.value = response['imagen'];
})

//para eliminar un archivo
dropzone.on("removedfile", function(){
    img.value = '';
    console.log('El archivo se elimino')
})

//sending: para ver la información cuando se sube la imagen
// dropzone.on("sending", function(file, xhr, formData){
//     console.log(file)
// })

//para imprimir el error
// dropzone.on("error", function(file, message){
//     console.log(message)
// })
