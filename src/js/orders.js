var totalElement, total, cart


totalElement = document.querySelector('#total')
total = 0.00
cart = document.querySelector('#cart')

function render (product) {
    //converting data
    let valorProduct = parseFloat(product[0]["value_product"])
    total += valorProduct
    //insert to HTML

    totalElement.value = total
    let BoxElement =  document.createElement('div')
    BoxElement.setAttribute('class', 'p-3 pr-5 border m-3')
    BoxElement.style.width = '100%'
    let productText = document.createTextNode(product[0]["name_product"])

    let spanElement =  document.createElement('span')
    spanElement.setAttribute('class', 'text-right')
    spanElement.setAttribute('style', 'margin-left: 83.7%')
    let productvalue = document.createTextNode(product[0]["value_product"])


    BoxElement.appendChild(productText)
    cart.appendChild(BoxElement);

    BoxElement.appendChild(spanElement)
    spanElement.appendChild(productvalue)

}

function addtocart(id, id_order){

    let data = {
        type: "insert",
        id,
        id_order
    }

     $.post( "./orderController.php", data , res => {  
        data = JSON.parse(res)
        render(data)
        updatetotal(data, id_order)
    });

}

function updatetotal (id_order) {

    let data = {
        type: "updatetotal",
        total: total,
        id_order
    }

     $.post( "./orderController.php", data);
}

function cancelorder(id_order) {
    
    let data = {
        type: "cancel",
        id_order
    }

    if (confirm('Realmente deseja cancelar?')) {
        $.post( "./orderController.php", data, res => {
            location.href = "../index/index.php"
        });       
    }
}


function submitorder(id_order) {
    
    let data = {
        type: "submited",
        id_order
    }

    $.post( "./orderController.php", data, () => {
        alert('Pedido feito com sucesso!')
        location.href = "../index/index.php"
    });       
    
}