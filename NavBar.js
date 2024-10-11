const toggleSwitch = document.getElementById('theme-toggle');
const body = document.body;
const searchIcon = document.querySelector('.search-icon i'); // Select the search icon

toggleSwitch.addEventListener('change', () => {
    if (toggleSwitch.checked) {
        body.style.backgroundColor = '#333';
        body.style.color = '#fff';
        searchIcon.style.color = '000'; 
    } else {
        body.style.backgroundColor = '#f5f5f5';
        body.style.color = '#000';
        searchIcon.style.color = '#000';
    }
});
