const { web3, myAccount } = require("./utils");
const { abi, address } = require("./contractArtifacts");

let contract = new web3.eth.Contract(JSON.parse(abi), address);

// console.log(contract);

// async function addUser () {

// }

async function getUser(userId) {
  const users = await contract.methods.getUser(userId).call();
  console.log(users);
}

async function addUser(userId, username, password, description) {
  await contract.methods
    .addUser(userId, username, password, description)
    .send({ from: myAccount.address, gas: 800000 })
    .on("receipt", (receipt) => {
      console.log(receipt);
    });
}

// addUser("123456789", "tehghgffgst", "tfygbfhbghggest", "tefyhjhjst");
getUser("625");

// add event listener to button to call addUser function on click event

// window.addEventListener("load", () => {
//   document.getElementById("addUser").addEventListener("click", () => {
// const userId = document.getElementById("userId").value;
// generate random id
// const userId = Math.floor(Math.random() * 1000000000000000000);
// const username = document.getElementById("username").value;
// const password = document.getElementById("password").value;
// const description = document.getElementById("description").value;

// addUser(userId, username, password, description);
// on receipt, clear the form fields
//   document.getElementById("username").value = "";
//   document.getElementById("password").value = "";
//   document.getElementById("description").value = "";
//   alert("User added successfully with id: " + userId + "Success!");
// });
// document.getElementById("getUser").addEventListener("click", () => {
//   const userId = document.getElementById("userId").value;
// await getUser(userId);
// store result in a variable and display it in the html
//     result = getUser(userId);
//     alert("User found with id: " + userId + "Success!");
//     document.getElementById("result").innerHTML = result;
//   });
// });
