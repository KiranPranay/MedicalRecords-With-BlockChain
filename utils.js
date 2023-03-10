const Web3 = require("web3");

const web3 = new Web3("http://localhost:7545");

// console.log(web3);
const privateKey =
  "0xfd1a1ac7613276cecd1e78104a7888e1464ed6162ba8fc8290efcc95985eee5c";
const myAccount = web3.eth.accounts.wallet.add(privateKey);

// console.log(myAccount);

module.exports = {
  web3: web3,
  myAccount: myAccount,
};
