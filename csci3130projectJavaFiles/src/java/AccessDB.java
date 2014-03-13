import java.util.HashMap;

public class AccessDB {
    
    /** empty constructor */
    public AccessDB(){
        
    }
    
    /** access Database and retrieve id and password */
    public HashMap<String, String> getIdAndPassword(String id, String password){
        //SELECT * from user table WHERE Name=id AND Password=pass;
        HashMap<String, String> result = new HashMap<String, String>();
        
        //test data start
        result.put("vick", "vickypassword");
        result.put("gilberto", "bbb123");
        result.put("richard", "abcdefg");
        result.put("tsubasa", "york");
        //test data end
        
        return result;
    }
    
} // end of class
