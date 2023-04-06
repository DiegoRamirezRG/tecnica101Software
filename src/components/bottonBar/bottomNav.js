function toggleIndicator(input) {
    const indicator = input.parentNode.nextElementSibling;
    if (input.checked) {
        const icon = document.querySelector('#'+input.id+'Icon');
        icon.style.color = '#dc3545';
        indicator.style.visibility = 'visible';
        localStorage.setItem('selectedRadioIndex', input.id);
    } else {
        indicator.style.visibility = 'hidden';
    }
}

const inputs = document.querySelectorAll('input[name="bottomNavOpt"]');
inputs.forEach(input => {
    input.addEventListener('click', () => {
        const indicators = document.querySelectorAll('.indicator');
        const icons = document.querySelectorAll('.icon');
        indicators.forEach(indicator => {
            indicator.style.visibility = 'hidden';
        });

        icons.forEach(icon => {
            icon.style.color = "#7F8D9F";
        })
        toggleIndicator(input);
    });
});


const selectedRadioIndex = localStorage.getItem('selectedRadioIndex');
if (selectedRadioIndex !== null) {
    const inputToClick = document.querySelector('#'+selectedRadioIndex+'Indicator');
    inputToClick.style.visibility = 'visible';

    const icon = document.querySelector('#'+selectedRadioIndex+'Icon');
    icon.style.color = '#dc3545';
}