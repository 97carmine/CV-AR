import { detectLanguaje } from "../components/detect_languaje.js";

if ( detectLanguaje() === "es-ES" ) {
    location.href = "es/index.html";
} else {
    location.href = "en/index.html";
}
