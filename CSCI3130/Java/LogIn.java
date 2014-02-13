import java.util.HashMap;
public class LogIn {

	//empty constructor
	public LogIn()
	{	
	}

	//check LogIn info
	//0  "exist user id and user password"
	//-1 "does not exist user id or user password"
	public int checkLogin(String loginId, String loginPass)
	{
		int ret=-1;
		AccessDB adb = new AccessDB();
		
		//search for DB; key input loginId and loginPassword
		HashMap<String, String> dbinfo = adb.getIdAndPass(loginId, loginPass);
		if(dbinfo.containsValue(loginPass))
			ret=0;
		
		return ret;
	}
}
