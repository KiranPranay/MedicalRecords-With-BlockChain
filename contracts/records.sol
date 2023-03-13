pragma solidity ^0.8.19;
// SPDX-License-Identifier: UNLICENSED
contract PatientRecord {
    struct Record {
        string patientName;
        string hospitalName;
        string doctorName;
        uint256 year;
        uint256 date;
        string vitalStatistics;
        string symptoms;
        string treatment;
        uint256 nextCheckupDate;
        string extraNote;
    }
    
    mapping (uint256 => Record) records;
    
    function addRecord(
        uint256 recordId,
        string memory patientName,
        string memory hospitalName,
        string memory doctorName,
        uint256 year,
        uint256 date,
        string memory vitalStatistics,
        string memory symptoms,
        string memory treatment,
        uint256 nextCheckupDate,
        string memory extraNote
    ) public {
        Record memory newRecord = Record(
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
        );
        records[recordId] = newRecord;
    }
    
    function getRecord(uint256 recordId) public view returns (
        string memory,
        string memory,
        string memory,
        uint256,
        uint256,
        string memory,
        string memory,
        string memory,
        uint256,
        string memory
    ) {
        Record memory record = records[recordId];
        return (
            record.patientName,
            record.hospitalName,
            record.doctorName,
            record.year,
            record.date,
            record.vitalStatistics,
            record.symptoms,
            record.treatment,
            record.nextCheckupDate,
            record.extraNote
        );
    }
}
