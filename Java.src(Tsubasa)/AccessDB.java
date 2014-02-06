import java.util.HashMap;


public class AccessDB {

	//empty Constructor
	public AccessDB()
	{	
	}
	
	//access DB and get id & password 
	public HashMap<String, String> getIdAndPass(String id, String pass)
	{
		//SELECT * from User tbl. WHERE Name=id AND Password=pass;
		HashMap<String, String> result = new HashMap<String, String>();
		
		//test data start
		result.put("vichy", "aaa");
		result.put("vichy", "vvv");
		result.put("vichy", "bbb");
		result.put("gilberto", "bbb");
		result.put("richard", "abcdefg");
		result.put("vichy", "ccc");
		//test data end
		
		return result;
	}
	
	//access User tbl. 
	public UserTable getUserTable(int accountId)
	{
		//SELECT * from User tbl. WHERE Name=id AND Password=pass;
		UserTable result = new UserTable;
		//TODO
		return result;
	}

	//access Character tbl. 
	public CharacterTable getCharacter(int accountId)
	{
		//SELECT * from Character tbl. WHERE AccountId=id;
		CharacterTable result = new CharacterTable;
		//TODO
		return result;
	}

}
