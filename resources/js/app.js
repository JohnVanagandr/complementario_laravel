import "./bootstrap";
import { eliminar } from "./comunes";

// Delegación de eventos
document.addEventListener("click", (e) => {
    let element = "";
    // validamos cual elemento realizó el evento click
    if (e.target.matches(".delete") || e.target.matches(".delete *")) {
        element = e.target.matches(".delete") ? e.target : e.target.parentNode;
        // llamamos el método eliminar del modulo comunes
        eliminar(e, element);
    }
});
