var startElement =  document.getElementById('start-button')
var stopElement =  document.getElementById('stop-button')

startElement.addEventListener('click', () => {

    let data = {
        open: 'aberto'
    }


    $.post( "./../sells/SellsController.php", data , res => {
        console.log(res);
        startElement.classList.add('disabled')
        stopElement.classList.remove('disabled')
    });
})


stopElement.addEventListener('click', () => {

    let data = {
        open: 'fechado'
    }


    $.post( "./../sells/SellsController.php", data , res => {
        console.log(res);
        startElement.classList.remove('disabled')
        stopElement.classList.add('disabled')
    });
})

let data = {
    open: 'render'
}

$.post( "./../sells/SellsController.php", data , res => {
    data = JSON.parse(res);

    console.log(data['status'])

    if (data['status'] === 'aberto') {
        startElement.classList.add('disabled')
        stopElement.classList.remove('disabled')
    }else{
        startElement.classList.remove('disabled')
        stopElement.classList.add('disabled')
    }
});