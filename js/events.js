// script.js
document.querySelectorAll('.timeline-item').forEach(item => {
    item.addEventListener('click', () => {
        document.querySelectorAll('.timeline-item').forEach(el => el.classList.remove('highlight'));
        item.classList.add('highlight');
    });
});
