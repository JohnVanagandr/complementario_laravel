import Swal from "sweetalert2";

// Método para enviar el formulario eliminar en una tabla, el botón debe ser el hijo directo del formulario
export const eliminar = (event, element) => {
    event.preventDefault();
    const formulario = element.parentNode;

    Swal.fire({
        title: "¿Estas seguro?",
        text: "¡No podrás revertir esto.!",
        icon: "question",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Si, eliminar!",
        showClass: {
            popup: "animate__animated animate__fadeInDown",
        },
        hideClass: {
            popup: "animate__animated animate__fadeOutUp",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            formulario.submit();
        }
    });
};
