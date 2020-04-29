import { detectLanguaje } from "../components/detectLanguaje.js";

if ( detectLanguaje() === "es-ES" ) {
    location.href = "es/index.html";
} else {
    location.href = "en/index.html";
}
