import './bootstrap';
import '~resources/scss/app.scss';

// Permette a vite di processare le immagini
import.meta.glob([
    '../img/**'
]);

// Importiamo parte js di bootstrap 

import * as bootstrap from 'bootstrap';