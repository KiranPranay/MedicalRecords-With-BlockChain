const { web3, myAccount } = require("./utils");
const { abi, address } = require("./contractArtifacts");

let contract = new web3.eth.Contract(JSON.parse(abi), address);

// console.log(contract);

// async function addUser () {

// }

async function getRecord(recordId) {
  const record = await contract.methods.getRecord(recordId).call();
  console.log(record);
  return record;
}

async function addRecord(
  recordId,
  patientName,
  hospitalName,
  doctorName,
  year,
  date,
  vitalStatistics,
  symptoms,
  treatment,
  nextCheckupDate,
  extraNote
) {
  await contract.methods
    .addRecord(
      recordId,
      patientName,
      hospitalName,
      doctorName,
      year,
      date,
      vitalStatistics,
      symptoms,
      treatment,
      nextCheckupDate,
      extraNote
    )
    .send({ from: myAccount.address, gas: 800000 })
    .on("receipt", (receipt) => {
      console.log(receipt);
      return receipt;
    });
}

addRecord("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11");
// getRecord("1");
