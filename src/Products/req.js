var idproduct; 

function render(){

    data = {
        type: "select"
    }

    $.post( "./ProductController.php", data , res => {
        document.getElementById('resultado').innerHTML = res;
        feather.replace()        
    });

}

function add() {
    data = {
        type: "add",
        name: document.getElementById('name').value,
        value: document.getElementById('value').value
    }

    $.post( "./ProductController.php", data , res => {
        alert(res)
        $('#exampleModal2').modal('toggle')
        render()      
    });

}

function getid(id){
    return idproduct = id
}

function update() {

    let id = idproduct 

    console.log(id);

    data = {
        type: "update",
        name: document.getElementById('upname').value,
        value: document.getElementById('upvalue').value,
        id
    }

    $.post( "./ProductController.php", data , res => {
        alert(res)
        document.getElementById('upname').value = '',
        document.getElementById('upvalue').value = '',
        $('#update').modal('toggle')
        render()      
    });
}

function del(id) {
    data = {
        type: "delete",
        id
    }

    $.post( "./ProductController.php", data , res => {
        alert(res)
        render()      
    });

}

render()