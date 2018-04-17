String dbName = â"BuyMyApple";
String dbUser = â"root";
String dbPass =  "gojazz";

String executeCmd = â"";
 
executeCmd = "mysqldump -u "+dbUser+" -p "+dbPass+"  "+dbName+" -r backup.sql";

Process runtimeProcess =Runtime.getRuntime().exec(executeCmd);

int processComplete = runtimeProcess.waitFor();

if(processComplete == 0){
out.println("Backup taken successfully");
} else {
out.println("Could not take mysql backup");
}
