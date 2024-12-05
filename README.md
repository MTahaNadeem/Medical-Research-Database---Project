## Medical Research Database

A web-based system for managing clinical trial data, patient records, study results, and drug information. This project provides a secure, interactive platform for researchers to store and analyze data, track study metadata, and generate insights.

### Features
- **Manage Clinical Trials**: Add and store clinical trial details.
- **Patient Records**: Maintain a database of patient details, including age and medical conditions.
- **Statistics Dashboard**: Generate insights like total trials and patient counts.
- **Responsive Design**: Optimized user interface with clean, professional styling.
- **Database Integration**: Data is securely stored using MySQL.

### Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL (via XAMPP)

### Prerequisites
Before running this project, ensure you have the following installed:
- [XAMPP](https://www.apachefriends.org/index.html)
- A modern web browser

### Setup Instructions
1. Clone this repository:
   ```bash
   git clone https://github.com/yourusername/medical-research-database.git
   cd medical-research-database
   ```

2. Start **Apache** and **MySQL** from the XAMPP Control Panel.

3. Open `phpMyAdmin`:
   - Go to [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/).
   - Create a database named `MedicalResearchDB`.

4. Import the provided SQL script:
   - Locate and import the `medical-research-database.sql` file in the project folder to set up the necessary tables.

5. Place the project files in the XAMPP `htdocs` folder:
   ```bash
   mv medical-research-database /path-to-xampp/htdocs/
   ```

6. Access the project in your browser:
   - Navigate to [http://localhost/medical-research-database/](http://localhost/medical-research-database/).

7. Use the forms to add trial and patient data. View stored data in `phpMyAdmin`.

### Project Structure
```plaintext
medical-research-database/
├── index.html           # Main webpage
├── styles.css           # Styling for the interface
├── script.js            # Frontend functionality
├── database.php         # Backend for database connection and data handling
├── medical-research-database.sql # SQL script to set up database and tables
└── README.md            # Project description
```

### Screenshots
#### Homepage
![Homepage](https://via.placeholder.com/600x400?text=Homepage)

#### Trials Form
![Trials Form](https://via.placeholder.com/600x400?text=Trials+Form)

#### Patient Form
![Patient Form](https://via.placeholder.com/600x400?text=Patient+Form)

### Future Enhancements
- **Machine Learning Integration**: Predictive analysis for clinical trial outcomes.
- **Data Cleaning**: Automated system for archiving outdated data.
- **Real-Time Updates**: Dynamic updates for ongoing trials.

### Contributing
Contributions are welcome! Please fork this repository and submit a pull request for review.

### License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

Replace `yourusername` with your GitHub username, and optionally update the placeholder images with real screenshots of your project.
