
const back = document.getElementById('btnBack');
const forward = document.getElementById('btnForward');
back.addEventListener('click', (e) => {
    history.back();
    return false;
});
forward.addEventListener('click', (e) => {
    history.forward();
    return false;
});