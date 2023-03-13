# Medical Records on Ethereum Blockchain

This project is a proof of concept for storing medical records on the Ganache blockchain. The frontend is built in JavaScript and the smart contract is written in Solidity.

## Getting Started

### Prerequisites

To run this project, you will need to have the following software installed on your system:

- Node.js
- Ganache GUI
- Truffle
- Solc

### Installation

1. Clone the repository to your local machine.
2. Start Ganache GUI and create a new workspace.
3. Open a terminal and navigate to the project directory.
4. Compile the smart contract by running the following command:

```
solc contracts/records.sol --bin --abi --optimize -o build/
```

5. Deploy the smart contract to Ganache by running the following command:

```
node deploy.js
```

Note: Before deploying the contract, make sure to update the private key in utils.js (const privateKey = "";) with the private key of your account in Ganache.

6. After successful deployment, copy the contract address displayed in the console (contractAddress: '0x...').

7. Update the contract address in contractArtifacts.js by replacing the empty address field (address: ``) with the copied contract address.

8. Install the required packages by running the following command:

```
npm install
```

9. Bundle the upload.js and fetch.js file using browserify by running the following command:

```
browserify upload.js -o uploadbundle.js
```

```
browserify fetch.js -o fetchbundle.js
```

10. If not already installed, install the http-server package by running the following command:

```
npm install -g http-server
```

### Usage

1. Start the http-server by running the following command in the project directory:

```
http-server
```

2. Open a web browser and go to http://localhost:8080/.
3. Double-click on index.html to launch the website.
4. Enter medical records and store them on the Ganache blockchain.

## Built With

- JavaScript - Frontend programming language
- Solidity - Smart contract programming language
- Ganache GUI - Blockchain emulator
- Truffle - Development framework for Ethereum

## Authors

- [kiranpranay](https://github.com/kiranpranay)

## License

This project is licensed under the [MIT License](https://github.com/KiranPranay/MedicalRecords-With-BlockChain/blob/main/LICENSE).
