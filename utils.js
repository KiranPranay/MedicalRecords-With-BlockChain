const Web3 = require("web3");

const web3 = new Web3("http://localhost:7545");

// console.log(web3);
const privateKey =
  "0xbd187f0ffdb0e95370cc18e4ecf6f1a9440827827ec9fad6c042e7859f11cb4e";
const myAccount = web3.eth.accounts.wallet.add(privateKey);

// console.log(myAccount);

module.exports = {
  web3: web3,
  myAccount: myAccount,
};
