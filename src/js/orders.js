var totalElement, total, cart

totalElement = document.querySelector('#total')
total = 0.00
cart = document.querySelector('#cart')
pay = document.getElementById('totalordertopay');

function cancelProduct(idOrderProduct) {
    console.log(idOrderProduct)

    




}

function render (product, id_order) {
    //converting data
    let valorProduct = parseFloat(product[0]["value_product"])
    total += valorProduct
    updatetotal(total, id_order)
    //insert to HTML
    totalElement.value = total
    pay.value = total
    let BoxElement =  document.createElement('div')
    BoxElement.setAttribute('class', 'p-3 pr-5 border m-3')
    BoxElement.style.width = '100%'
    let productText = document.createTextNode(product[0]["name_product"])

    let spanElement =  document.createElement('span')
    spanElement.setAttribute('class', 'text-right')
    spanElement.setAttribute('style', 'margin-left: 83.7%')
    let productvalue = document.createTextNode(product[0]["value_product"])

    let cancelElement = document.createElement('button')
    cancelElement.setAttribute('class', 'text-right btn-sm   btn-danger')
    cancelElement.setAttribute('onclick', 'cancelProduct('+product[1][0][0]+')')
    cancelElement.setAttribute('id', product[1][0][0])
    let textcencel = document.createTextNode('Cencelar')
    
    cancelElement.onclick()

    BoxElement.appendChild(productText)
    cart.appendChild(BoxElement);

    BoxElement.appendChild(spanElement)
    spanElement.appendChild(productvalue)

    BoxElement.appendChild(cancelElement)
    cancelElement.appendChild(textcencel)
}

async function addtocart(id, id_order){
    
    let data = {
        type: "insert",
        id,
        id_order
    }

     await $.post( "./orderController.php", data , res => {  
        data = JSON.parse(res)
        console.log(data)
        render(data, id_order)
    });
}

function updatetotal (total, id_order) {

    let data = {
        type: "updatetotal",
        total,
        id_order
    }

     $.post( "./orderController.php", data, res => {
        console.log(res)
     });
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

    $.post( "./orderController.php", data, res => {
        alert('Pedido feito com sucesso!')
        location.href = "../index/index.php"
    });       
    
}