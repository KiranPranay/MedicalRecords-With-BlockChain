const { web3, myAccount } = require("./utils");
const { abi, address } = require("./contractArtifacts");

let contract = new web3.eth.Contract(JSON.parse(abi), address);

async function getUser(userId) {
  const users = await contract.methods.getUser(userId).call();
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
  document.getElementById("fetchdata"),
    (onclick = () => {
      // generate random id
      const userId = document.getElementById("userId").value;
      getUser(userId).then((r) => {
        document.getElementById("pname").innerHTML = r["0"];
        document.getElementById("hname").innerHTML = r["1"];
        document.getElementById("hdes").innerHTML = r["2"];
      });
    });
});
