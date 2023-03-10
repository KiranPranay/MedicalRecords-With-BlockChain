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
solc Contract.sol --bin --abi --optimize -o build/
```

5. Deploy the smart contract to Ganache by running the following command:

```
node deploy.js
```

6. Install the required packages by running the following command:

```
npm install
```

7. Bundle the interact.js file using browserify by running the following command:

```
browserify interact.js -o bundle.js
```

### Usage

Once the project is installed and running, you can access the website by visiting `http://localhost/` in your web browser. The website allows users to enter their medical records and store them on the Ganache blockchain.

To execute the functions in interact.js, make sure to include bundle.js in your frontend code.

## Built With

- JavaScript - Frontend programming language
- Solidity - Smart contract programming language
- Ganache GUI - Blockchain emulator
- Truffle - Development framework for Ethereum

## Authors

- [Your Name](https://github.com/kiranpranay)

## License

This project is licensed under the [MIT License](https://github.com/KiranPranay/MedicalRecords-With-BlockChain/blob/main/LICENSE).
