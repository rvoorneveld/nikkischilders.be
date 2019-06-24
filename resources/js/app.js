document.addEventListener('DOMContentLoaded', function() {
    let classHidden = 'hidden',
        classToggle = 'script-toggle',
        idToggleButton = 'script-toggle-button';
    document.getElementById(idToggleButton).addEventListener('click', function() {
        document.querySelectorAll(`.${classToggle}`).forEach(function(item) {
            item.classList.toggle(classHidden);
        });
    });
});
