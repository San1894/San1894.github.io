
const form = document.querySelector('form');
const inputs = document.querySelectorAll(
    'input[type="text"] , input[type="password"]');

const progressBar = document.getElementById('progress-bar');

let pseudo, email, pass, confirmPass, data;

const errorDisplay = (tag, message, valid) => {
    const container = document.querySelector("." + tag + "-container")
    const span = document.querySelector("." + tag + "-container > span")

    if (!valid) {
        container.classList.add('error')
        span.textContent = message
    } else {
        container.classList.remove('error')
        span.textContent = ""
    }
}

const pseudoChecker = (value) => {
    if (value.length > 0 & (value.length < 3 || value.length > 20)) {
        errorDisplay("pseudo",
            "le pseudo doit contenir entre 3 et 20 caracteres")

        pseudo = null;

    } else if (!value.match(/^[A-Z]?(_|[a-z])+$/)) {
        errorDisplay("pseudo",
            "le pseudo ne doit pas contenir de caractere speciaux")

        pseudo = null;

    } else {
        errorDisplay("pseudo", "", true)
        pseudo = value;
    }

}

// const emailChecker = (value) => {
//     if (!value.match(/^[\w_-]+@[\w-]+\.[a-z]{2,4}$/i)) {
//         errorDisplay('email', "le mail n'est pas valide");

//         email = null;

//     } else {
//         errorDisplay('email', "", true);
//         email = value;
//     }
// }

const passwordChecker = (value) => {
    progressBar.classList = "";
    if (!value.match(/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\w]){1,})(?!.*\s).{8,}$/)) {
        errorDisplay(
            "password",
            'Minimum 8 caracteres, une majuscule, un chiffre et un caractere special');
        progressBar.classList.add('progressRed');
        pass = null;

    } else if (value.length < 12) {

        progressBar.classList.add("progressBlue");
        errorDisplay("password", "", true);
        pass = value;
    } else {
        progressBar.classList.add("progressGreen");
        errorDisplay("password", "", true);
        pass = value;
    }
    //    if(confirmPass) confirmChecker(confirmPass);
};

// const confirmChecker = (value) => {
//     if (value !== pass) {
//         errorDisplay('confirm', "les mots de passe ne correspondent pas");
//         confirmPass = false;
//     }else{
//         errorDisplay('confirm', "", true);
//         confirmPass = true;
//     }
// }

inputs.forEach((input) => {
    input.addEventListener('input', (e) => {
        switch (e.target.id) {
            case "pseudo":
                pseudoChecker(e.target.value);
                break;
            // case "email":
            //     emailChecker(e.target.value);
            //     break;
            case "password":
                passwordChecker(e.target.value);
                break;
            // case "confirm":
            //     confirmChecker(e.target.value);
            //     break; 
            default: null;
        }
    });
});




//  if((pseudoChecker(value) && emailChecker(value) && passwordChecker(value)) !== 1){


    form.addEventListener('submit', async (e) => {
    e.preventDefault();
     
    // .then(res2 => (res2) ? window.location.replace('aziz.php'): "")
    // async ()=>{(res) ? window.location = 'aziz.php': "";}
    // console.log(data);
    // const data = new FormData(form);
     await fetch('connexion.php', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data = {
            pseudo,
            pass,
        })
    })
    .then(res => res.text())
    .then(res2 => (res2 == '{"status":"success"}') ? window.location.replace('contact.php'): alert('donnees incorrect !!!')) //(res) ? window.location = 'aziz.php' : ""
    .then((inputs.forEach((input) => {input.value = ""}),progressBar.classList = "",console.log(data),getdata()));
        data = "";
        console.log(data)
     //(res.statusText == ok) ? window.location.replace('aziz.php') : '' )
    // .catch((err) => {
    //      console.error(err);
    // });
    // if(res) redirect(res);
   

  

  

    // .then(function(res){
    //     if(res.ok){
    //         console.log(res);
    //     }

    // })
});

//  function redirect(){
//      window.location = 'aziz.php';
// }


// });

// (res2) ? window.location = 'aziz.php': "";
 //    .then((res2)=>{
    //     if(res2.status == 200) {
    //         window.location = 'aziz.php';
    //     }
    //     })

// } else
// {
//     alert('champs mal remplis !!!');
// }



