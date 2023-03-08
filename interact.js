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

// addUser("1", "test", "test", "test");
getUser("1");
