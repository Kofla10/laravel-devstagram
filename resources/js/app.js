import Dropzone from "dropzone";


Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu image",
    acceptedFiles     : ".pgn, .jpg, jpeg, .gif",
    addRemoveLinks    : true,
    dictRemoveFile    : "Borrar Archivo",
    maxFiles          : 1,
    uploadMultiple    : false
})