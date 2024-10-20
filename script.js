function updateGradientColor(mood) {
    const colors = {
        "happy": "#f9d71c",     // Amarillo
        "sad": "#1e3a5f",       // Azul oscuro
        "energy": "#ff5733",    // Naranja
        "relax": "#00a8cc",     // Azul claro
        "motivation": "#ff8c00",// Naranja brillante
        "stress": "#9b59b6",    // Púrpura
        "default": "#18d860"    // Verde
    };

    const selectedColor = colors[mood] || colors['default'];
    
    document.querySelector('.background').style.background = 
        `radial-gradient(circle, ${selectedColor}, #131313)`; // Radial Gradient adaptado
}

function moodChanged(select) {
    const mood = select.value;
    updateGradientColor(mood);   // Cambiamos el gradiente basado en el estado de ánimo seleccionado
    document.getElementById('moodForm').submit();   // Enviamos el formulario
}
