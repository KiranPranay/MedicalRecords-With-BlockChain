const { web3, myAccount } = require("./utils");
const { bytecode } = require("./contractArtifacts");

async function deploy() {
  await web3.eth
    .sendTransaction({
      from: myAccount.address,
      data: bytecode,
      gas: 800000,
    })
    .on("receipt", (receipt) => {
      console.log(receipt);
    });
}
deploy();
