const Web3 = require("web3");

const web3 = new Web3("http://localhost:7545");

// console.log(web3);
const privateKey =
  "0x44af9ffffccd3380541873ac6f9ca175bd0ebfd6c6ede879c7a278efcb8da56a";
const myAccount = web3.eth.accounts.wallet.add(privateKey);

// console.log(myAccount);

module.exports = {
  web3: web3,
  myAccount: myAccount,
};
