const modal = document.querySelector('.modal-content');
const form = document.querySelector('form');
const inputs = document.querySelectorAll('input[type="text"] , input[type="email"], input[type="number"]');
const btn = document.getElementById('save');
const contacts = document.getElementById('listcontact');
const btnlog = document.getElementById('logout');
console.log(btnlog);
let cname, email, mobile, adress, data, editData;


inputs.forEach((input)=>{
    input.addEventListener('input', (e)=>{
        switch (e.target.id){
           case "cname":
               cname = e.target.value;
               break;
            case "email":
                email = e.target.value;
                break;
            case "mobile":
                mobile = e.target.value;
                break;
            case "adress":
                adress = e.target.value;
                break; 
            default: null;
        }
    });  
}); 


form.addEventListener('submit', (e)=>{
    e.preventDefault();
  
    fetch('connect.php', {
        method: 'POST',
        headers: {
            'Content-Type' : 'application.json'
        },
        body: JSON.stringify(  data = {
            cname,
            email,
            mobile,
            adress,
        })
    })
    .then((inputs.forEach((input) => {input.value = ""}),console.log(data),getdata()))
        data = "";       
})

//GET
  async function getdata(){
    await fetch('get.php', {
       method: 'GET',
       headers: {
        'Accept': 'application/json'
       }
   })
   .then(res => res.text())
   .then(data => JSON.parse(data))
   .then((result) => {
    let number = 1;
      const html = result.reverse().map( (contact)=>{
        
        return `
            <tr data-id=${contact.id}>
               <td scope="row">${number++}</td>
               <td id='name'>${contact.name}</td>
               <td id='email'>${contact.email}</td>
               <td id='mobile'>${contact.mobile}</td>
               <td id='adress'>${contact.adress}</td>
               <td>
                  <button type="button"  id="edit-contact" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#completeModal">Edit</button>
                  <button type="button" id="delete-contact" class="btn btn-outline-danger">Delete</button>
               </td>
            </tr>
        `
      }).join('')
      contacts.innerHTML = html;
      contacts.scrollTop = contacts.scrollHeight;
   }) 
   result = "";
}
getdata();

contacts.addEventListener('click', (e)=>{
     e.preventDefault();

     let editButtonPress = e.target.id == 'edit-contact';
     let deleteButtonPress = e.target.id == 'delete-contact';
     let id = e.target.parentElement.parentElement.dataset.id ;
    
    if(deleteButtonPress){
        var result = confirm("Want to delete?");
        if (result) {
             //Logic to delete the item
                fetch(`delete.php?id=${id}`, {
                  method: 'DELETE',
                })
                .then((getdata()))
        }
           
    }
     if(editButtonPress){
        const parent = e.target.parentElement.parentElement;
        let nameContent = parent.querySelector('#name').textContent;
        let emailContent = parent.querySelector('#email').textContent;
        let mobileContent = parent.querySelector('#mobile').textContent;
        let adressContent = parent.querySelector('#adress').textContent;
        inputs.forEach((input)=>{
            switch (input.id){
                case "cname":
                    input.value = nameContent;
                    cname = input.value;
                    break;
                 case "email":
                    input.value = emailContent;
                    email = input.value;
                     break;
                 case "mobile":
                    input.value = mobileContent;
                    mobile = input.value;
                     break;
                 case "adress":
                    input.value = adressContent;
                    adress = input.value;
                     break; 
                 default: null;
             } 
        })

        btn.addEventListener('click', async (e)=>{
            e.preventDefault();
            await fetch(`update.php?id=${id}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type' : 'application.json'
                },
                body: JSON.stringify( data = {
                    cname,
                    email,
                    mobile,
                    adress,
                })
           })
           .then((inputs.forEach((input) => {input.value = ""}),getdata()))
            id = "";
        })
  }

})

btnlog.addEventListener('click', ()=>{
    window.location.replace('logout.php');
})

 window.setInterval(getdata, 3000);


