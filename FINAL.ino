#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include "DHT.h"
#include <Wire.h>

const char* ssid     = "Husein-kapetan Gradascevic";
const char* password = "ProbijGaSpicom";

const char* serverName = "http://192.168.0.41/post-data.php";

String apiKeyValue = "tPmAT5Ab3j7F9";

String sensorName = "DHT11";
String sensorLocation = "Room1";

#define DHTPIN 2     
#define DHTTYPE DHT11   // DHT 11
#define SEALEVELPRESSURE_HPA (1013.25)
DHT dht(DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(115200);
  
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());

  dht.begin();
  
}

void loop() {
  if(WiFi.status()== WL_CONNECTED){
    HTTPClient http;
    
    http.begin(serverName);
    
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    String httpRequestData = "api_key=" + apiKeyValue + "&sensor=" + sensorName
                          + "&location=" + sensorLocation + "&Temperature=" + String(dht.readTemperature())
                          + "&Humidity=" + String(dht.readHumidity()) + "&LightLevel=" + String(analogRead(A0)) + "";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData); 

    int httpResponseCode = http.POST(httpRequestData);
        
    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  delay(30000);  
}
