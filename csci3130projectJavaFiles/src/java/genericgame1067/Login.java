package genericgame1067;

import java.util.HashMap;

public class Login {
    
    /** empty constructor */
    public Login(){
        
    }
    
    /*
     * Methods checkLogin
     * Paratemeters: loginId, loginPassword
     * Return: ret
     */
    public int checkLogin(String loginId, String loginPassword){
        int ret = -1;
        AccessDB adb = new AccessDB();
        
        //search for DB; key input loginId and loginPassword
        HashMap<String, String> dbinfo = adb.getIdAndPassword(loginId.trim(), 
                loginPassword.trim());
        
        if(dbinfo == null || dbinfo.isEmpty()) {
            return ret;
        }
        if(dbinfo.containsValue(loginPassword.trim()) && dbinfo.containsValue(loginPassword.trim())){
            ret = 0;
        }
        return ret;
    }
    
    //TODO
	/*
	//access User tbl. 
	public User getUserTable(int accountId)
	{
		//SELECT * from User tbl. WHERE Name=id AND Password=pass;
		User result = new User();
		//TODO
		return result;
	}

	//access Character tbl. 
	public Character getCharacter(int accountId)
	{
		//SELECT * from Character tbl. WHERE AccountId=id;
		Character result = new Character();
		//TODO
		return result;
	}
	*/
    
} // end of class

