## Medical Research Database

A web-based system for managing clinical trial data, patient records, study results, and drug information. This project provides a secure, interactive platform for researchers to store and analyze data, track study metadata, and generate insights.

### Features
- **Manage Clinical Trials**: Add and store clinical trial details.
- **Patient Records**: Maintain a database of patient details, including age and medical conditions.
- **Statistics Dashboard**: Generate insights like total trials and patient counts.
- **Responsive Design**: Optimized user interface with clean, professional styling.
- **Database Integration**: Data is securely stored using MySQL.

### Project Development Stages (SDLC Phases):
#### 1.	Planning:
-	Identified project objectives: 
-	Enable efficient management of clinical trial data.
-	Provide secure storage for patient records and study metadata.
-	Defined scope based on user requirements provided by research professionals.

#### 2.	Analysis:
-	Conducted requirements analysis to understand data relationships, such as between patients, trials, and study results.
-	Identified necessary tables: trials, patients, studies, results, drugs, and metadata.

#### 3.	Design:
-	Created an Entity-Relationship Diagram (ERD) for visualizing the database schema.
-	Applied normalization techniques to minimize redundancy and optimize storage.
-	Designed security features to protect sensitive data.

#### 4.	Implementation:
-	Used [specific DBMS, e.g., MySQL] to develop the database schema and implement the tables.
-	Inserted sample data for testing purposes.
-	Implemented core features: 
-	Managing clinical trial data and results.
-	Storing patient records securely.
-	Analyzing data trends.

#### 5.	Testing:
-	Performed functionality testing to ensure accurate data retrieval and updates.
-	Tested edge cases for data integrity and security (e.g., invalid inputs).

#### 6.	Deployment:
-	Prepared a demonstration for presenting the working database system to academic supervisors.
- Provided clear documentation, including database schema and user instructions.

#### 7.	Maintenance:
-	Proposed future maintenance strategies: 
-	Regular cleaning of outdated or non-relevant data.
-	Enhancing features like auto-spelling correction and real-time updates for ongoing trials.
-	Integrating dashboards for statistical analysis.


### Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL (via XAMPP)

Below is a structured README file section for the **Design and Development Lifecycle (DDLC): Medical Research Database**:

---

# Design and Development Lifecycle (DDLC): Medical Research Database

## Part 1: Conceptual and Logical Design

### 1. Description of Entities, Attributes, and Relationships

#### Entities and Attributes
1. **Patients**: Stores information about individuals participating in clinical trials.
   - **Attributes**: 
     - `Patient_ID` (Primary Key)
     - `Name`
     - `Age`
     - `Gender`
     - `Medical_History`
     - `Contact_Info`

2. **Clinical Trials**: Captures details of clinical trials.
   - **Attributes**: 
     - `Trial_ID` (Primary Key)
     - `Title`
     - `Start_Date`
     - `End_Date`
     - `Status`
     - `Result`

3. **Studies**: Contains metadata about specific studies conducted within trials.
   - **Attributes**: 
     - `Study_ID` (Primary Key)
     - `Name`
     - `Purpose`
     - `Protocol`
     - `Start_Date`
     - `End_Date`

4. **Results**: Stores findings and outcomes of studies.
   - **Attributes**: 
     - `Result_ID` (Primary Key)
     - `Study_ID` (Foreign Key)
     - `Patient_ID` (Foreign Key)
     - `Observation`
     - `Measurement`
     - `Timestamp`

5. **Drugs**: Holds information about drugs used or tested during trials.
   - **Attributes**: 
     - `Drug_ID` (Primary Key)
     - `Name`
     - `Manufacturer`
     - `Dosage`
     - `Side_Effect`

6. **Metadata**: Captures additional details relevant to studies and trials.
   - **Attributes**: 
     - `Metadata_ID` (Primary Key)
     - `Trial_ID` (Foreign Key)

#### Relationships
- **Patients** participate in one or more **Studies**.
- **Trials** encompass multiple **Studies**.
- **Studies** produce multiple **Results**.
- **Trials** may involve one or more **Drugs**.
- **Metadata** is associated with **Trials**.

---

### 2. Challenges and Considerations

- **Data Security**: Ensure patient confidentiality through encryption and controlled access.
- **Normalization**: Avoid redundancy by carefully structuring relationships between tables.
- **Data Integrity**: Define clear primary and foreign keys to maintain consistency.
- **Future Scalability**: Design the schema to accommodate additional attributes or tables.

---

### 3. Tables, Fields, and Data Types

| **Table Name** | **Field Name**      | **Data Type**   |
|-----------------|---------------------|-----------------|
| Patients        | `Patient_ID`        | INT (Primary Key) |
|                 | `Name`              | VARCHAR(255)    |
|                 | `Age`               | INT             |
|                 | `Gender`            | CHAR(1)         |
|                 | `Medical_History`   | VARCHAR(255)    |
|                 | `Contact_Info`      | VARCHAR(255)    |
| Trials          | `Trial_ID`          | INT (Primary Key) |
|                 | `Title`             | VARCHAR(255)    |
|                 | `Start_Date`        | DATE            |
|                 | `End_Date`          | DATE            |
|                 | `Status`            | VARCHAR(255)    |
|                 | `Result`            | VARCHAR(100)    |
| Studies         | `Study_ID`          | INT (Primary Key) |
|                 | `Name`              | VARCHAR(255)    |
|                 | `Purpose`           | VARCHAR(255)    |
|                 | `Protocol`          | VARCHAR(255)    |
|                 | `Start_Date`        | DATE            |
|                 | `End_Date`          | DATE            |
| Results         | `Result_ID`         | INT (Primary Key) |
|                 | `Study_ID`          | INT (Foreign Key) |
|                 | `Trial_ID`          | INT (Foreign Key) |
|                 | `Outcome`           | VARCHAR(255)    |
|                 | `Summary`           | VARCHAR(255)    |
|                 | `Date_Recorded`     | DATE            |
| Drugs           | `Drug_ID`           | INT (Primary Key) |
|                 | `Name`              | VARCHAR(255)    |
|                 | `Dosage`            | VARCHAR(255)    |
|                 | `Side_Effect`       | VARCHAR(255)    |
|                 | `Manufacturer`      | VARCHAR(255)    |
| Metadata        | `Metadata_ID`       | INT (Primary Key) |
|                 | `Trial_ID`          | INT (Foreign Key) |

---

### 4. Relationships Between Tables

- **Patients (`Patient_ID`) → Results (`Patient_ID`)**
- **Trials (`Trial_ID`) → Studies (`Trial_ID`)**
- **Studies (`Study_ID`) → Results (`Study_ID`)**
- **Trials (`Trial_ID`) → Metadata (`Trial_ID`)**
- **Trials (`Trial_ID`) → Drugs (`Drug_ID`)**

---

### 5. ERD to Relational Data Model (RDM)

![ERD Diagram](dbpicture/er.png)

![RDM Diagram](dbpicture/rdm.png)

---

### 6. Brief Report

#### Design Decisions
- **Entity Selection**: Focused on entities essential for managing clinical trial data.
- **Normalization**: Designed to third normal form (3NF) to minimize redundancy.
- **Data Security**: Included encryption considerations for sensitive fields (e.g., `Contact_Info`, `Medical_History`).
- **Data Types**: Used appropriate data types for each attribute (e.g., `DATE`, `VARCHAR`).
- **Scalability**: The schema accommodates future growth and modifications.

#### Challenges
- Balancing normalization with performance (e.g., adding indexes on frequently queried fields).
- Incorporating future-proof features like support for machine learning tools.
- Ensuring compliance with data privacy regulations.

---
