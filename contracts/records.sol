pragma solidity ^0.8.19;
// SPDX-License-Identifier: UNLICENSED
contract PatientRecord {
    struct Record {
        string patientId;
        string patientName;
        string hospitalName;
        string doctorName;
        string date;
        string vitalStatistics;
        string symptoms;
        string treatment;
        string nextCheckupDate;
        string extraNote;
    }
    
    mapping (uint256 => Record) records;
    
    function addRecord(
        uint256 recordId,
        string memory patientId,
        string memory patientName,
        string memory hospitalName,
        string memory doctorName,
        string memory date,
        string memory vitalStatistics,
        string memory symptoms,
        string memory treatment,
        string memory nextCheckupDate,
        string memory extraNote
    ) public {
        Record memory newRecord = Record(
            patientId,
            patientName,
            hospitalName,
            doctorName,
            date,
            vitalStatistics,
            symptoms,
            treatment,
            nextCheckupDate,
            extraNote
        );
        records[recordId] = newRecord;
    }
    
    function getRecord(uint256 recordId) public view returns (
        string memory,
        string memory,
        string memory,
        string memory,
        string memory,
        string memory,
        string memory,
        string memory,
        string memory,
        string memory
    ) {
        Record memory record = records[recordId];
        return (
            record.patientId,
            record.patientName,
            record.hospitalName,
            record.doctorName,
            record.date,
            record.vitalStatistics,
            record.symptoms,
            record.treatment,
            record.nextCheckupDate,
            record.extraNote
        );
    }
}
