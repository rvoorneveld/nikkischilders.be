import Vue from 'vue';
import axios from "axios";

// document.addEventListener('DOMContentLoaded', function() {
//     let classHidden = 'hidden',
//         classToggle = 'script-toggle',
//         idToggleButton = 'script-toggle-button';
//     document.getElementById(idToggleButton).addEventListener('click', function() {
//         document.querySelectorAll(`.${classToggle}`).forEach(function(item) {
//             item.classList.toggle(classHidden);
//         });
//     });
// });
//
let app = new Vue({
    el: '#vue-calendar',
    data: {
        message: 'Hello Calendar!'
    },
    mounted() {
        axios.get('calendar').then(r => (test) => {
            console.log(r);
            console.log(test);
        });
    }
});

console.log(app);
