document.addEventListener('DOMContentLoaded', function() {
    var infGeneral = document.getElementById('info-general');
    var historia = document.getElementById('historia');
    var linaje = document.getElementById('linaje');
    
    var buttonInfoGeneral = document.getElementById('button-info-general');
    var buttonHistoria = document.getElementById('button-historia');
    var buttonLinaje = document.getElementById('button-linaje');
    
    if (buttonInfoGeneral) {
        buttonInfoGeneral.addEventListener('click', function() {
            infGeneral.classList.remove('show');
            historia.classList.remove('show');
            linaje.classList.remove('show');
            
            if (infGeneral.classList.contains('show')) {
                infGeneral.classList.remove('show');
                infGeneral.style.marginBottom='auto';
            } else {
                infGeneral.classList.add('show');
            }
        });
    }
    
    if (buttonHistoria) {
        buttonHistoria.addEventListener('click', function() {
            infGeneral.classList.remove('show');
            historia.classList.remove('show');
            linaje.classList.remove('show');
            
            if (historia.classList.contains('show')) {
                historia.classList.remove('show');
                historia.style.position='absolute';
                historia.style.top='0';
            } else {
                historia.classList.add('show');
            }
        });
    }
    
    if (buttonLinaje) {
        buttonLinaje.addEventListener('click', function() {
            infGeneral.classList.remove('show');
            historia.classList.remove('show');
            linaje.classList.remove('show');
            
            if (linaje.classList.contains('show')) {
                linaje.classList.remove('show');
                linaje.style.marginBottom='auto';
            } else {
                linaje.classList.add('show');
            }
        });
    }
});
