document.addEventListener('DOMContentLoaded', function() {
    const backgroundType = document.getElementById('backgroundType');
    const imageSection = document.getElementById('imageSection');
    const colorSection = document.getElementById('colorSection');
    const defaultBackgrounds = document.getElementById('defaultBackgrounds');

    if(backgroundType) {
        backgroundType.addEventListener('change', function() {
            if(this.value === 'image') {
                imageSection.style.display = 'block';
                defaultBackgrounds.style.display = 'block';
                colorSection.style.display = 'none';
            } else {
                imageSection.style.display = 'none';
                defaultBackgrounds.style.display = 'none';
                colorSection.style.display = 'block';
            }
        });
    }

    // Varsayılan arka plan seçildiğinde
    document.querySelectorAll('input[name="default_background"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if(this.checked) {
                document.querySelector('input[name="background_image"]').value = '';
            }
        });
    });
}); 