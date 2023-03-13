const { web3, myAccount } = require("./utils");
const { abi, address } = require("./contractArtifacts");

let contract = new web3.eth.Contract(JSON.parse(abi), address);

async function getRecord(recordId) {
  const record = await contract.methods.getRecord(recordId).call();
  return record;
}

window.addEventListener("load", () => {
  document.getElementById("fetchdata"),
    (onclick = () => {
      const recordId = document.getElementById("recordId").value;
      getRecord(recordId).then((r) => {
        document.getElementById("patientName").innerHTML = r["0"];
        document.getElementById("hospitalName").innerHTML = r["1"];
        document.getElementById("doctorName").innerHTML = r["2"];
        document.getElementById("year").innerHTML = r["3"];
        document.getElementById("date").innerHTML = r["4"];
        document.getElementById("vitalStatistics").innerHTML = r["5"];
        document.getElementById("symptoms").innerHTML = r["6"];
        document.getElementById("treatment").innerHTML = r["7"];
        document.getElementById("nextCheckupDate").innerHTML = r["8"];
        document.getElementById("extraNote").innerHTML = r["9"];
      });
    });
});
