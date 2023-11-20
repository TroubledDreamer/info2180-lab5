document.addEventListener("DOMContentLoaded", function() {




    const button = document.getElementById('lookup');
    const resultContainer = document.getElementById('result');

  

   

    button.addEventListener( 'click', function (){
        var countryName = document.getElementById('country').value;
        console.log(countryName);

        var urlParameter = '?country=' + countryName;



        fetch("world.php" + urlParameter)
            .then(response => response.text())
            .then(data => {
                resultContainer.innerHTML = data;
    

            }
            ) 
            .catch(error => console.error("Error", error));
    })







})