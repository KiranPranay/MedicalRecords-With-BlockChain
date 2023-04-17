const { web3, myAccount } = require("./utils");
const { abi, address } = require("./contractArtifacts");

let contract = new web3.eth.Contract(JSON.parse(abi), address);

async function getRecord(recordidval) {
  const record = await contract.methods.getRecord(recordidval).call();
  return record;
}

window.addEventListener("load", () => {
  const recordidval = document.getElementById("recordidval").value;
  getRecord(recordidval).then((r) => {
    document.getElementById("patientName").innerHTML = r["0"];
    document.getElementById("hospitalName").innerHTML = r["1"];
    document.getElementById("doctorName").innerHTML = r["2"];
    // document.getElementById("year").innerHTML = r["3"];
    document.getElementById("date").innerHTML = r["3"];
    document.getElementById("vitalStatistics").innerHTML = r["4"];
    document.getElementById("symptoms").innerHTML = r["5"];
    document.getElementById("treatment").innerHTML = r["6"];
    document.getElementById("nextCheckupDate").innerHTML = r["7"];
    document.getElementById("extraNote").innerHTML = r["8"];
  });
});
