const { web3, myAccount } = require("./utils");
const { abi, address } = require("./contractArtifacts");

let contract = new web3.eth.Contract(JSON.parse(abi), address);

// console.log(contract);

// async function addUser () {

// }

async function getUser(userId) {
  const users = await contract.methods.getUser(userId).call();
  // console.log(users);
  return users;
}

async function addUser(userId, username, password, description) {
  await contract.methods
    .addUser(userId, username, password, description)
    .send({ from: myAccount.address, gas: 800000 })
    .on("receipt", (receipt) => {
      console.log(receipt);
      return receipt;
    });
}

window.addEventListener("load", () => {
  document.getElementById("adddata"),
    (onclick = () => {
      // generate random id
      const userId = Math.floor(Math.random() * 100000);
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;
      const description = document.getElementById("description").value;
      addUser(userId, username, password, description).then((r) => {
        console.log(r);
      });
    });
  document.getElementById("fetchdata"),
    (onclick = () => {
      // generate random id
      const userId = document.getElementById("userId").value;
      getUser(userId).then((r) => {
        document.getElementById("result").innerHTML = r;
        console.log(r);
        // alert(r);
      });
    });
});

// function adddata() {
//   alert("hi");
//   const userId = document.getElementById("userId").value;
//   const username = document.getElementById("username").value;
//   const password = document.getElementById("password").value;
//   const description = document.getElementById("description").value;
//   addUser(userId, username, password, description);
//   alert("User added successfully with id: " + userId + "Success!");
// }

// alert(addUser("11112", "test", "test", "test"));
// getUser("11112");

// add event listener to button to call addUser function on click event

// window.addEventListener("load", () => {
//   document.getElementById("addUser").addEventListener("click", async () => {
//     // const userId = document.getElementById("userId").value;
//     // generate random id
//     const userId = Math.floor(Math.random() * 1000);
//     const username = document.getElementById("username").value;
//     const password = document.getElementById("password").value;
//     const description = document.getElementById("description").value;

//     // alert all the values to check if they are correct
//     alert(
//       "userId: " +
//         userId +
//         "username: " +
//         username +
//         "password: " +
//         password +
//         "description: " +
//         description
//     );

//     // alert(await addUser(userId, username, password, description));
//     // check if addUser() is working correctly by calling it here and passing in the values from the form  fields as arguments
//     if ((await addUser(userId, username, password, description)) == true) {
//       // on receipt, clear the form fields
//       document.getElementById("username").value = "";
//       document.getElementById("password").value = "";
//       document.getElementById("description").value = "";
//       alert("User added successfully with id: " + userId + "Success!");
//     } else {
//       alert("User not added successfully with id: " + userId + "Success!");
//     }
//   });

//   document.getElementById("getUser").addEventListener("click", () => {
//     const userId = document.getElementById("userId").value;
//     // await getUser(userId);
//     // store result in a variable and display it in the html
//     result = getUser(userId);
//     alert("User found with id: " + userId + "Success!");
//     document.getElementById("result").innerHTML = result;
//   });
// });
