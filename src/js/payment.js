var btnElement, totaltopayElement, topay, payElement, btnCard, btnMoney, method

btnElement = document.getElementById('btn-submit')
payElement = document.getElementById('payed')
totaltopayElement = document.getElementById('total')
btnCard = document.querySelector(' #card ')
btnMoney = document.querySelector(' #money ')
topay = parseFloat(totaltopayElement.value)

function render() {
    
    total += valorProduct

    //insert to HTML
    totalElement.value = total
    pay.value = total
    let BoxElement =  document.createElement('div')
    BoxElement.setAttribute('class', 'p-3 pr-5 border m-3')
    BoxElement.style.width = '100%'
    let productText = document.createTextNode()

    let spanElement =  document.createElement('span')
    spanElement.setAttribute('class', 'text-right')
    spanElement.setAttribute('style', 'margin-left: 83.7%')
    let productvalue = document.createTextNode()


    BoxElement.appendChild(productText)
    cart.appendChild(BoxElement);

    BoxElement.appendChild(spanElement)
    spanElement.appendChild(productvalue)

}


function addtomethods(id, method) {
    
    if (method === 'cartao') {
        
    }

}