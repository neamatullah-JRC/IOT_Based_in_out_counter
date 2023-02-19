
#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid     = "JRC222";
const char* password = "juniourroboticsclub@222";

const char* SERVER_NAME = "http://jrc.captainelectronicsbd.com/projects/inoutcounter/main/data.php";
String did = "jrc00001";

unsigned long previousMillis = 0;
long interval = 1000;



const int insens1 = 12;
const int insens2 = 14;
const int outsens1 = 18;
const int outsens2 = 19;

int instep1 = 0;
int instep2 = 0;

int outstep1 = 0;
int outstep2 = 0;



int incount;
int outcount;


 
void setup() {
 Serial.begin(9600);
 
  pinMode(insens1, INPUT_PULLUP); 
  pinMode(insens2, INPUT_PULLUP); 
  pinMode(outsens1, INPUT_PULLUP);
  pinMode(outsens2, INPUT_PULLUP);

  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());

}
 
void loop() {

     int in1 = digitalRead(insens1);
     int in2 = digitalRead(insens2);
     int out1 = digitalRead(outsens1);
     int out2 = digitalRead(outsens2);


  if(in1 == 0)
  {
      instep1 = 1;
  }
  if(in2 == 0)
  {
      instep2 = 1;
  }
    
  if(out1 == 0)
  {
      outstep1 = 1;
  }
  if(out2 == 0)
  {
      outstep2 = 1;
  }

  if(instep1 == 1 && instep2 == 1)
  {
    incount = 1;
    instep1 = 0;
    instep2 = 0;
    senddata();
  }
  
  if(outstep1 == 1 && outstep2 == 1)
  {
    outcount = 1;
    outstep1 = 0;
    outstep2 = 0;
    senddata();
  }

  Serial.print(incount);
  Serial.println(outcount);
  delay(10);  
}
void senddata()
{
    if(WiFi.status()== WL_CONNECTED){
 
    HTTPClient http;

  
     
    http.begin(SERVER_NAME);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  String total, increment, decrement;
     did = String(did);
     increment = String(incount);
     decrement = String(outcount);
     
     
     
    String data;
    data = "did="+did;
    data += "&increment="+increment;
    data += "&decrement="+decrement;
   
    
    Serial.print("data: ");
   Serial.println(data);
    int httpResponseCode = http.POST(data);
    String httpResponseString = http.getString();
  
    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
      Serial.println(httpResponseString);
    }

    else {
      Serial.print("Error on HTTP request - Error code: ");
      Serial.println(httpResponseCode);
      Serial.println(httpResponseString);
    }
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
        outcount = 0;
        incount = 0;

}
