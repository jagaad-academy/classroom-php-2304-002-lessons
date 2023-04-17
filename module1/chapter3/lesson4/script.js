function hello(e) {
    e.preventDefault()

    let name = document.getElementsByName("user_email")[0].value

    //console.log(document.getElementsByName("user_email"))

    document.getElementById("mail").value = 'test@test.dev'

    alert('Hello World! ' + name)
}

fetch('https://fakestoreapi.com/products')
  .then((response) => response.json())
  .then(function (data) {
    data.forEach(element => {
        let productTag = "<li> <img width='20' src='" + element.image + "'/> " + element.title + "</li>"


        document.getElementById("list-data").innerHTML += productTag

        console.log(element)
    })
  })
