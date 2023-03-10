const { web3, myAccount } = require("./utils");
const { abi, address } = require("./contractArtifacts");

let contract = new web3.eth.Contract(JSON.parse(abi), address);

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
      //   generate random id
      const userId = Math.floor(Math.random() * 100000);
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;
      const description = document.getElementById("description").value;
      addUser(userId, username, password, description).then((r) => {
        const confirmtxt = "Data added successfully with id: " + userId;
        document.getElementById("confirmtxt").innerHTML = confirmtxt;
      });
    });
});
