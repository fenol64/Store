var totalElement, total, cart

totalElement = document.querySelector('#total')
total = 0.00
cart = document.querySelector('#cart')
pay = document.getElementById('totalordertopay');

function cancelProduct(idOrderProduct, id_order) {

    var admin = prompt('Digite a senha do Administrador')

    if (admin != 'admin') {
        alert('Senha incorreta')
        return
    }

    let str = idOrderProduct + "item"
    let btn = document.getElementById(str)
    btn.setAttribute('disabled', "true")
    btn.innerHTML = "cancelado"

    data = {
        type: 'cancelProduct',
        id: idOrderProduct
    }

    $.post('./orderController.php', data, res => {
        data = JSON.parse(res)
        total -= parseFloat(data["value_product"])
        updatetotal(total, id_order)
        //insert to HTML
        totalElement.value = total
        pay.value = total

        let Element = document.getElementById(idOrderProduct)
        Element.classList.add('border-danger')
    })
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
    BoxElement.setAttribute('id', product[1][0][0])
    BoxElement.style.width = '100%'
    let productText = document.createTextNode(product[0]["name_product"])

    let spanElement =  document.createElement('span')
    spanElement.setAttribute('class', 'text-right')
    spanElement.setAttribute('style', 'margin-left: 83.7%')
    let productvalue = document.createTextNode(product[0]["value_product"])

    let cancelElement = document.createElement('button')
    cancelElement.setAttribute('class', 'text-right btn-sm btn-danger')
    cancelElement.setAttribute('id', product[1][0][0] + 'item')
    cancelElement.setAttribute('onclick', 'cancelProduct('+product[1][0][0]+','+ id_order +')')
    
    let textcencel = document.createTextNode('Cencelar')
    
    BoxElement.appendChild(productText)
    cart.appendChild(BoxElement);

    BoxElement.appendChild(spanElement)
    spanElement.appendChild(productvalue)

    BoxElement.appendChild(cancelElement)
    cancelElement.appendChild(textcencel)
}

function addtocart(id, id_order){
    
    let data = {
        type: "insert",
        id,
        id_order
    }

    $.post( "./orderController.php", data , res => {  
        render(JSON.parse(res), id_order)
    });
}

function updatetotal (total, id_order) {

    let data = {
        type: "updatetotal",
        total,
        id_order
    }

     $.post( "./orderController.php", data);
}

function cancelorder(id_order) {

    var admins = prompt('Digite a senha do Administrador')

    if (admins != 'admin') {
        alert('Senha errada')
        return
    }

    
    let data = {
        type: "cancel",
        id_order
    }

    if (confirm('Realmente deseja cancelar?')) {

        $.post( "./orderController.php", data, () => {
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
