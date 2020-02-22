const canvas = document.getElementById('myChart')
const ctx = canvas.getContext('2d')
const elementcancel = document.getElementById('cancelorder')
const elementdone = document.getElementById('doneorders')
const totalelement = document.getElementById('total')


const request = (day) => {
    
    let data = {
        type: "products",
        day
    }
    
    $.post('./reportsController.php', data, res => {
        loadData(JSON.parse(res))
    });
}

request(day)

function loadData(data) {

    let state = {
        prod: [],
        totalvet: [],
        colors: []
    }


    for (const key in data) {
        let number = parseInt(data[key][0]['count(name_product)'])
        if (Number.isInteger(number)) {
            state.totalvet.push(number)
        }else{
            state.totalvet.push(0)
        }

        if (key == data.length - 1) {
            for (let index = 0; index < data[key].length; index++) {
                state.prod.push(data[key][index]["name_product"])
                state.colors.push('#'+Math.floor(Math.random() * 999999))        
            }
        }
    }

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: state.prod,
            datasets: [{
                label: 'Número de vendas',
                data: state.totalvet,
                backgroundColor: state.colors
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}

// Gráfico de produtos

const getorders = () => {
    let data = {
        type: "getorders",
        day
    }
    
    $.post('./reportsController.php', data, res => {
        loadorders(JSON.parse(res))
    });  
}

function loadorders(data) {
    console.log(data)

    elementcancel.innerHTML = data[0]["cancelado"];
    elementdone.innerHTML = data[0]["feito"]
    totalelement.innerHTML = "Total vendido: R$" + data[0][2]
}

getorders()