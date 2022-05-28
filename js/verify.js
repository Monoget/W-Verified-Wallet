let walletConnected = false
let currentWallet = ''
let web3 = new Web3(window.ethereum)
const address = '0xc85ECe92db84eCeE699954DB8717AbA03d5fA904';
let abi = [
    {
        "anonymous": false,
        "inputs": [
            {
                "indexed": true,
                "internalType": "address",
                "name": "previousOwner",
                "type": "address"
            },
            {
                "indexed": true,
                "internalType": "address",
                "name": "newOwner",
                "type": "address"
            }
        ],
        "name": "OwnershipTransferred",
        "type": "event"
    },
    {
        "inputs": [],
        "name": "owner",
        "outputs": [
            {
                "internalType": "address",
                "name": "",
                "type": "address"
            }
        ],
        "stateMutability": "view",
        "type": "function"
    },
    {
        "inputs": [],
        "name": "renounceOwnership",
        "outputs": [],
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "inputs": [
            {
                "internalType": "address",
                "name": "newOwner",
                "type": "address"
            }
        ],
        "name": "transferOwnership",
        "outputs": [],
        "stateMutability": "nonpayable",
        "type": "function"
    }
]

let dynoverseClaim = ''

window.addEventListener('DOMContentLoaded', async () => {
    connect()
})

window.setInterval(async function () {

    let accounts = await ethereum.request({method: "eth_accounts"})
    let isConnected = !!accounts.length;
    networkId = await web3.eth.net.getId()

    if (!isConnected) {
        await window.ethereum.request({method: 'eth_requestAccounts'})
        await window.ethereum.request({
            method: 'wallet_addEthereumChain',
            params: [{
                chainId: '0x89',
                chainName: 'Polygon Network',
                nativeCurrency: {
                    name: 'Matic Mainnet',
                    symbol: 'MATIC',
                    decimals: 18
                },
                rpcUrls: ['https://polygon-rpc.com/'],
                blockExplorerUrls: ['https://polygonscan.com/']
            }]
        })
            .catch((error) => {
                console.log(error)
            })

        accounts = await web3.eth.getAccounts()
        currentWallet = accounts[0]

        console.log(currentWallet)
    } else if (networkId === 137 && isConnected) {
        currentWallet = accounts[0]
        walletConnected = true
    } else if (isConnected) {
        currentWallet = accounts[0]
        walletConnected = true
    }
}, 1000)

async function connect() {
    let networkId = await web3.eth.net.getId()
    console.log(networkId)

    dynoverseClaim = new web3.eth.Contract(abi, address)

    let accounts = await web3.eth.getAccounts()
    let isConnected = !!accounts.length

    accounts = await web3.eth.getAccounts()
    currentWallet = accounts[0]

    console.log(currentWallet)

    if (!isConnected) {
        await window.ethereum.request({method: 'eth_requestAccounts'})
        await window.ethereum.request({
            method: 'wallet_addEthereumChain',
            params: [{
                chainId: '0x89',
                chainName: 'Polygon Network',
                nativeCurrency: {
                    name: 'Matic Mainnet',
                    symbol: 'MATIC',
                    decimals: 18
                },
                rpcUrls: ['https://polygon-rpc.com/'],
                blockExplorerUrls: ['https://polygonscan.com/']
            }]
        })
            .catch((error) => {
                console.log(error)
            })

        accounts = await web3.eth.getAccounts()
        currentWallet = accounts[0]

        console.log(currentWallet)
    } else if (networkId === 137 && isConnected) {
        Swal.fire({
            title: 'Success',
            text: "Now You can claim NFT.",
            icon: 'success',
            confirmButtonText: 'Close'
        });
        walletConnected = true
    } else if (isConnected) {

        await window.ethereum.request({method: 'eth_requestAccounts'})
        await window.ethereum.request({
            method: 'wallet_addEthereumChain',
            params: [{
                chainId: '0x89',
                chainName: 'Polygon Network',
                nativeCurrency: {
                    name: 'Matic Mainnet',
                    symbol: 'MATIC',
                    decimals: 18
                },
                rpcUrls: ['https://polygon-rpc.com/'],
                blockExplorerUrls: ['https://polygonscan.com/']
            }]
        })
            .catch((error) => {
                console.log(error)
            })

        accounts = await web3.eth.getAccounts()
        currentWallet = accounts[0]

        console.log(currentWallet)

        networkId = await web3.eth.net.getId()
        console.log(networkId)
        walletConnected = true
    }
}

async function claim() {
    if (walletConnected) {

        let claim=''

        claim = 4

        let name = document.getElementById('Name').value

        let phone = document.getElementById('Phone').value

        let address = document.getElementById('Address').value
        if (claim != '') {
            $.ajax({
                type: 'post',
                url: 'Email',
                data: {
                    Name: name, Phone: phone, Address: address, submit:1
                },
                success: function (data) {
                    document.cookie = 'alert = 1;';
                    Swal.fire({
                        title: 'Connected',
                        text: 'Claim Was Successful.',
                        icon: 'success',
                        confirmButtonText: 'Close'
                    }).then(function () {
                        window.location.href = 'Home'
                    });
                }
            });
        }else{
            Swal.fire({
                title: 'Error',
                text: "Claim Unsuccessful",
                icon: 'error',
                confirmButtonText: 'Close'
            });
        }
    } else {
        Swal.fire({
            title: 'Error',
            text: "Your wallet not connected",
            icon: 'error',
            confirmButtonText: 'Close'
        });
    }
}
