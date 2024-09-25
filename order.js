document.getElementById('next-button').addEventListener('click', function() {
    document.getElementById('order-details').style.display = 'none';
    document.getElementById('personal-details').style.display = 'block';
});

document.getElementById('back-button').addEventListener('click', function() {
    document.getElementById('order-details').style.display = 'block';
    document.getElementById('personal-details').style.display = 'none';
});

var end_button = document.querySelector('#end-button');
end_button.addEventListener('click', endOrder);

function endOrder(event){

} 