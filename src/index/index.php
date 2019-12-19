<!doctype html>
<html lang="pt-br">
  <head>
  <link rel="stylesheet" href="./index.css">
    <?php
      include_once '../includes/nav.php';
    ?>
    
    <div class="centers">
      <h1 class="h1 text-center">Escolha uma ação acima</h1>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
      // kypress functions
      var options = {
        N: () => {
          location.href = "../Sell/Sell.php"
        },

        R: () => {
          $('#exampleModal').modal('toggle')
        },
      
        P: () => {
          location.href = "../Products/Products.php"
        }
      }
      //keypress inputs
      document.addEventListener('keydown', event => {
        let keypressed = event.key.toUpperCase()
        const location = options[keypressed]
        if (location) {
          location()  
        }
      })
    </script>
  </body>
</html>