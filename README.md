# Smart Recycle Bin - Waste Management Solution

Welcome to the Smart Recycle Bin - Waste Management Solution project! This comprehensive waste management solution includes three components: the ESP32 microcontroller code for bin monitoring, the data receiver script for storing data in a database, and the data visualization script to display real-time charts. This project aims to create an efficient bin monitoring system that allows users to accurately track the status of recycling bins and trash bins. By utilizing a combination of distance and weight sensors, an ESP32 device, and Highcharts for data visualization, the system provides valuable insights for optimized waste management and a greener future.

## ESP32 Microcontroller Code - Bin Monitoring
The ESP32 code is responsible for monitoring the fill state of recycling bins and trash bins in real-time. The ESP32 interacts with distance and weight sensors (HC-SR04 and Load Cell Sensor with HX711) to measure the bin's fill level accurately. The data is then sent to a database through an HTTP POST request to the data receiver script.

## Data Receiver Script - Data Storage
The data receiver script is a PHP-based server-side script that receives data from the ESP32 and stores it in a MySQL database. The script validates the API key for secure data transmission and inserts the distance, weight, bin state, and reading time into the "BinSensor" database table.

## Data Visualization Script - Real-time Charts
The data visualization script retrieves data from the MySQL database and displays it in real-time using Highcharts library. It provides three interactive charts for monitoring the distance, weight, and bin state readings from the bin sensors. The charts automatically refresh every 5 seconds, allowing users to monitor the bin status conveniently.

## Requirements
- ESP32 microcontroller with HC-SR04 and Load Cell Sensor with HX711
- MySQL database server
- PHP environment for the data receiver script
- Highcharts library for data visualization

## Setup and Installation
1. Connect the distance and weight sensors to the ESP32 microcontroller as per the specified wiring.
2. In the ESP32 code, fill in your WiFi details, set `host` to your server's `post-esp-data.php` URL, and set `apiKeyValue` to your own secret key. Then upload it to the microcontroller using the Arduino IDE.
3. Set up a MySQL database on your server and update the data receiver script's database credentials accordingly.
4. Set the `$api_key_value` variable in the data receiver script to the same secret key you used in the ESP32 code. Never commit real keys or passwords to a public repo.
5. Include the Highcharts library in your HTML file to use the data visualization script.
6. Configure your HTML file to send HTTP GET requests to the data visualization script's URL.

## Usage
1. Power on the Smart Recycle Bin system.
2. The ESP32 microcontroller will start monitoring the bin's fill state using distance and weight sensors.
3. The ESP32 sends the collected data to the data receiver script, which stores it in the MySQL database.
4. The data visualization script retrieves data from the database and displays real-time charts for distance, weight, and bin state readings.
5. Users can access the synchronized website to monitor the bin status conveniently.

## Important Notes
- Ensure that your server has PHP installed and properly configured to handle HTTP POST and GET requests.
- Implement proper security measures to prevent unauthorized access to the data receiver script and database.

## Contributing
Contributions to the Smart Recycle Bin project are welcome! If you have ideas for improvements or new features, feel free to open an issue or submit a pull request.

## License


## Contact
- portfolio website: https://jeanemmanuelk.github.io/website/
- Email: emmanuelkj5@gmail.com


Thank you for using the Smart Recycle Bin - Waste Management Solution! Together, we can create smarter and more sustainable waste management practices.
