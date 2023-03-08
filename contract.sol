pragma solidity ^0.8.19;

contract User {
    struct UserDetail {
        string username;
        string password;
        string description;
    }
    
    mapping (uint256 => UserDetail) users;
    
    function addUser(uint256 userId, string memory username, string memory password, string memory description) public {
        UserDetail memory newUser = UserDetail(username, password, description);
        users[userId] = newUser;
    }
    
    function getUser(uint256 userId) public view returns (string memory, string memory, string memory) {
        UserDetail memory user = users[userId];
        return (user.username, user.password, user.description);
    }
}
