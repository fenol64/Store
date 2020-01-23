var btnElement, totaltopayElement, topay, payElement, btnCard, btnMoney

btnElement = document.getElementById('btn-submit')
// div
payElement = document.getElementById('payed')
// total input 
totaltopayElement = document.getElementById('total')
//modals
btnCard = document.querySelector(' #card ')
btnMoney = document.querySelector(' #money ')
// first total
topay = parseFloat(totaltopayElement.value)

btnElement.setAttribute('disabled', 'true')

function render(data) {

    let amount = totaltopayElement.value

    console.log(data.method)

    if (data.method === 'debito') {
        data.method = 'Débito'
    }else if (data.method === 'credito') {
        data.method = 'Crédito'
    }else if(data.method === 'dinheiro'){
        data.method = 'Dinheiro'
    }

    let paid = amount - parseFloat(data.value)

    totaltopayElement.value = paid.toFixed(2)

    if (totaltopayElement.value > 0) {
        btnElement.setAttribute('disabled', 'true')
    }else{
        btnElement.removeAttribute('disabled')
    }

    
    let BoxElement =  document.createElement('div')
    BoxElement.setAttribute('class', 'p-3 pr-5 border m-3')
    BoxElement.style.width = '100%'
    let productText = document.createTextNode(data.method)

    let spanElement =  document.createElement('span')
    spanElement.setAttribute('class', 'text-right')
    spanElement.setAttribute('style', 'margin-left: 83.7%')
    let productvalue = document.createTextNode(data.value)


    BoxElement.appendChild(productText)
    payElement.appendChild(BoxElement);

    BoxElement.appendChild(spanElement)
    spanElement.appendChild(productvalue)

}


function addtomethods(method) {
    
    let data = {
        method,
        valuePaid: document.getElementById(method).value
    }

    $.post('paymentController.php', data, res => {
        render(JSON.parse(res))
    })

}